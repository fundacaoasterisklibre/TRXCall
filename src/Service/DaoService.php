<?php
/**
 * Created by IntelliJ IDEA.
 * User: vmuniz
 * Date: 23/01/18
 * Time: 12:07
 */

namespace App\Service;

use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Mapping\ClassMetadataInfo;
use Symfony\Component\Config\Tests\Util\Validator;
use Symfony\Component\HttpFoundation\Request;

class DaoService
{

    /**
     * @var Validator|\XMLElement
     */
    protected $validator;

    /**
     * @var EntityManager
     */
    protected $em;

    protected $autoFlush = true;

    /**
     * DaoService constructor.
     *
     * @param \XMLElement $validator
     * @param             $em
     */
    public function __construct(EntityManager $em, $validator)
    {
        $this->validator = $validator;
        $this->em = $em;
    }

    public function validate($class)
    {
        $errors = $this->validator->validate($class);
        /** @var ConstraintViolationList $errors */
        if (count($errors) === 0) {
            return;
        }

        $attribute = new AttributeRequiredException();

        for ($i = 0; $i < $errors->count(); $i++) {
            $attribute->addAttributeRequired($errors->get($i)->getPropertyPath());
        }

        throw $attribute;
    }

    /**
     * @param $entity
     * @param $request
     */
    public function create(&$entity, $request = null)
    {
        if ($request != null) {
            $request = $request instanceof Request ? $request->request->all() : $request;
            $this->saveRequest($entity, $request);
        } else {
            $this->validate($entity);
        }

        $this->em->persist($entity);

        if ($this->autoFlush) {
            $this->flush();
        }

        return $entity;
    }

    public function update(&$entity, $request)
    {

        if ($request != null) {
            $request = $request instanceof Request ? $request->request->all() : $request;
            $this->saveRequest($entity, $request);
        } else {
            $this->validate($entity);
        }

        if ($this->autoFlush) {
            $this->flush();
        }

    }

    public function delete($entity)
    {

        $this->em->remove($entity);
        if ($this->autoFlush) {
            $this->flush();
        }

    }

    private function saveRequest(&$entity, $request, $reference = null)
    {
        $class = $this->em->getClassMetadata(get_class($entity));

        if (method_exists($entity, 'getRequestDefault')) {
            $requestDefault = $entity->getRequestDefault();
            $request = array_replace_recursive($requestDefault, $request);
        }

        $discriminator = $this->getDescriminator($class->name);
        $parentIdentifier = $class->getIdentifier()[0];
        $id = $entity->{'get' . ucfirst($parentIdentifier)}();

        foreach ($request as $key => $item) {

            $getMethod = 'get' . ucfirst($key);
            $setMethod = 'set' . ucfirst($key);
            $isMethod = 'is' . ucfirst($key);
            if ($class->hasField($key)) {
                $oldValue = null;
                $newValue = $item;
                if (method_exists($entity, $getMethod)) {
                    $oldValue = $entity->{$getMethod}();
                } elseif (method_exists($entity, $isMethod)) {
                    $oldValue = $entity->{$isMethod}();
                }

                if ($key == 'created' && $oldValue != null) {
                    continue;
                }

                if ($key == 'created' || $key == 'modified') {
                    $entity->{$setMethod}(new \DateTime());
                    continue;
                }

                if ($key == $class->getIdentifier()[0] && $oldValue != null) {
                    continue;
                }

                if ($oldValue !== $newValue && method_exists($entity, $setMethod) && !is_array($newValue)) {
                    $entity->{$setMethod}($newValue);
                }
            }


            if ($class->hasAssociation($key)) {
                $assoc = $class->getAssociationMapping($key);


                switch ($assoc['type']) {
                    case ClassMetadataInfo::MANY_TO_ONE:

                        if (!method_exists($entity, $getMethod)) {
                            break;
                        }
                        $oldValue = $newValue = $entity->{$getMethod}();

                        if ($item === null) {
                            $newValue = null;
                        } else if ($assoc['joinColumns']) {

                            $identifiers = [];

                            $isCreating = true;

                            foreach ($assoc['joinColumns'] as $value) {

                                if (is_array($item)) {
                                    $identifiers[$value['referencedColumnName']] = $item[$value['referencedColumnName']];
                                } else {
                                    $identifiers[$value['referencedColumnName']] = $item;
                                }

                                if ($identifiers[$value['referencedColumnName']] === null) {
                                    $isCreating = false;
                                }
                            }

                            $newValue = $this->em->getRepository($assoc['targetEntity'])
                                ->findOneBy($identifiers);

                            //TODO: Checar essa funcao pois esta duplicada abaixo
                            if ($newValue == null && $assoc['isCascadePersist']) {
                                if ($isCreating) {
                                    if (isset($item['descr'])) {
                                        $cName = $this->em->getRepository($item['descr'])->getClassName();
                                        $newValue = new  $cName;
                                    } else {
                                        $newValue = new $assoc['targetEntity'];
                                    }

                                    $this->saveRequest($newValue, $item);
                                    $this->em->persist($newValue);
                                }
                                $entity->{$setMethod}($newValue);
                            } else {
                                if ($assoc['isCascadeMerge'] && $newValue != null) {
                                    $this->saveRequest($newValue, $item);
                                }
                            }
                        } else if ($assoc['isCascadePersist']) {
                            if (isset($item['descr'])) {
                                $cName = $this->em->getRepository($item['descr'])->getClassName();
                                $newValue = new  $cName;
                            } else {
                                $newValue = new $assoc['targetEntity'];
                            }
                            $this->saveRequest($newValue, $item);
                            $this->em->persist($newValue);
                            $entity->{$setMethod}($newValue);
                        }
                        if ($oldValue != $newValue && method_exists($entity, $setMethod)) {
                            $entity->{$setMethod}($newValue);

                        }
                        break;
                    case ClassMetadataInfo::ONE_TO_MANY:

                        $notDeleteId = [];
                        $oldValue = $entity->{'get' . ucfirst($assoc['fieldName'])}();
                        foreach ($item as $keyItem => $valueItem) {
                            if ($valueItem == null) {
                                continue;
                            }

                            $itemAssoc = $this->em->getClassMetadata($assoc['targetEntity']);
                            $identifiers = $itemAssoc->getIdentifier();

                            $find = [];
                            $identifier = '';


                            foreach ($identifiers as $value) {

                                if ($itemAssoc->hasAssociation($value) &&  get_class($entity) === $itemAssoc->getAssociationMapping($value)['targetEntity']) {
                                    $find[$value] = $entity;
                                } else {
                                    $find[$value] = $valueItem[$value] ?? null;
                                    $identifier = $value;
                                }

                            }
                            $objectValue = $find ? $this->em->getRepository($assoc['targetEntity'])
                                ->findOneBy($find) : null;

                            if ($objectValue !== null) {
                                if ($assoc['isCascadeMerge']) {
                                    $this->saveRequest($objectValue, $valueItem);
                                    $objectValue->{'set' . ucfirst($assoc['mappedBy'])}($entity);
                                }
                                $notDeleteId[] = $valueItem[$identifier];
                                continue;
                            }
                            if (!$assoc['isCascadePersist']) {
                                continue;
                            }
                            if (isset($valueItem['descr'])) {
                                $cName = $this->em->getRepository($valueItem['descr'])->getClassName();
                                $objectValue = new  $cName;
                            } else {
                                $objectValue = new $assoc['targetEntity'];
                            }
                            $objectValue->{'set' . ucfirst($assoc['mappedBy'])}($entity);
                            $this->saveRequest($objectValue, $valueItem);
                            $this->em->persist($objectValue);
                        }
                        if ($oldValue && $assoc['isCascadeRemove']) {

                            $listOld = $oldValue->getValues();

                            foreach ($listOld as $delete) {

                                if (in_array($delete->getId(), $notDeleteId)) {
                                    continue;
                                }
                                $this->em->remove($delete);
                            }
                        }
                        break;
                    case ClassMetadataInfo::MANY_TO_MANY:
                        $notDeleteId = [];
                        $oldValue = $entity->{'get' . ucfirst($assoc['fieldName'])}();
                        $checkObjectValue = $entity->{'get' . ucfirst($assoc['fieldName'])}();
                        foreach ($item as $keyItem => $valueItem) {
                            $itemAssoc = $this->em->getClassMetadata($assoc['targetEntity']);
                            $identifier = $itemAssoc->getIdentifier()[0];
                            $objectValue = null;
                            if (isset($valueItem[$identifier])) {
                                foreach ($checkObjectValue as $k => $v) {
                                    if ($v->getId() === $valueItem[$identifier]) {
                                        if ($assoc['isCascadeMerge']) {
                                            $this->saveRequest($v, $valueItem);
                                        }
                                        $notDeleteId[] = $valueItem[$identifier];
                                        continue 2;
                                    }
                                }
                            }
                            $objectValue = isset($valueItem[$identifier]) ? $this->em->getRepository($assoc['targetEntity'])
                                ->findOneBy([$identifier => $valueItem[$identifier]]) : null;
                            if ($assoc['isCascadePersist']) {
                                if (isset($valueItem['descr'])) {
                                    $cName = $this->em->getRepository($valueItem['descr'])->getClassName();
                                    $objectValue = new  $cName;
                                } else {
                                    $objectValue = new $assoc['targetEntity'];
                                }
                                $this->saveRequest($objectValue, $valueItem);
                                $this->em->persist($objectValue);
                            }
                            if ($objectValue != null) {
                                if (isset($valueItem[$identifier])) {
                                    $notDeleteId[] = $valueItem[$identifier];
                                }
                                $entity->{'get' . ucfirst($assoc['fieldName'])}()->add($objectValue);
                            }
                        }
                        if ($oldValue) {
                            foreach ($oldValue as $delete) {
                                if (in_array($delete->getId(), $notDeleteId)) {
                                    continue;
                                }
                                if ($delete->getId() == null) {
                                    continue;
                                }
                                $entity->{'get' . ucfirst($assoc['fieldName'])}()->removeElement($delete);
                            }
                        }
                        break;
                    case ClassMetadataInfo::ONE_TO_ONE:

                        if (!method_exists($entity, $getMethod)) {
                            break;
                        }

                        $oldValue = $newValue = $entity->{$getMethod}();
                        $identifier = $assoc['mappedBy'] ? $assoc['mappedBy'] : $assoc['joinColumns'][0]['referencedColumnName'];
                        if ($item === null) {
                            $newValue = null;
                        } else if (isset($item[$identifier])) {
                            $newValue = $reference === null ? $this->em->getRepository($assoc['targetEntity'])
                                ->findOneBy([$identifier => $item[$identifier]]) : $reference;

                            //TODO: Checar essa funcao pois esta duplicada abaixo
                            if ($newValue == null && $assoc['isCascadePersist']) {
                                if (isset($item['descr'])) {
                                    $cName = $this->em->getRepository($item['descr'])->getClassName();
                                    $newValue = new  $cName;
                                } else {
                                    $newValue = new $assoc['targetEntity'];
                                }
                                $newValue->{'set' . ucfirst($identifier)}($id);
                                $this->saveRequest($newValue, $item, $entity);
                                $this->em->persist($newValue);

                            } else {
                                if ($newValue == null) {
                                    $newValue = $oldValue;
                                }
                                if ($assoc['isCascadeMerge'] && $newValue != null) {
                                    $this->saveRequest($newValue, $item);
                                }
                            }
                        } else if ($assoc['isCascadePersist']) {
                            if (isset($item['descr'])) {
                                $cName = $this->em->getRepository($item['descr'])->getClassName();
                                $newValue = new  $cName;
                            } else {
                                $newValue = new $assoc['targetEntity'];
                            }
                            $newValue->{'set' . ucfirst($identifier)}($id);
                            $this->saveRequest($newValue, $item);
                            $this->em->persist($newValue);
                        }
                        if ($oldValue != $newValue && method_exists($entity, $setMethod)) {
                            $entity->{$setMethod}($newValue);
                        }
                        break;
                }
            }
        }

        $this->validate($entity);
    }

    private function getDescriminator($value)
    {
        $aux = explode('\\', $value);

        return lcfirst($aux[count($aux) - 1]);
    }

    public function flush()
    {

        $this->em->flush();
    }

    public function refresh($entity)
    {
        $this->em->refresh($entity);
    }

    /**
     * @param bool $autoFlush
     */
    public function setAutoFlush($autoFlush = false)
    {
        $this->autoFlush = $autoFlush;
    }

    /**
     * @return bool
     */
    public function isAutoFlush()
    {
        return $this->autoFlush;
    }

    /**
     * @return ObjectManager
     */
    public function getManager()
    {
        return $this->em;
    }

}