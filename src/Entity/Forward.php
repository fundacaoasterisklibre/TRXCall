<?php
/**
 * Created by IntelliJ IDEA.
 * User: vmuniz
 * Date: 14/06/17
 * Time: 22:41
 */

namespace App\Entity;

use App\Listener\InterfaceConstraint;
use Doctrine\DBAL\Exception\ConstraintViolationException;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Mapping as ORM;

/**
 * Class Forward
 *
 * @package  App\Entity
 *
 * @ORM\Table("forward")
 * @ORM\Entity(repositoryClass="App\Repository\GenericRepository")
 */
class Forward implements InterfaceConstraint
{

    /**
     * @ORM\Id
     * @ORM\Column(name="classname", type="string", length=64, nullable=false)
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $classname;

    /**
     * @ORM\Id
     * @ORM\Column(name="reference", type="string", length=64, nullable=false)
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $reference;

    /**
     * @ORM\Column(name="description", type="string", length=255, nullable=true)
     */
    private $description;

    /**
     * @ORM\Column(name="custom", type="string", length=255, nullable=true)
     */
    private $custom;

    /**
     * @ORM\Column(name="context", type="string", length=255, nullable=true)
     */
    private $context;

    /**
     * @return mixed
     */
    public function getClassname()
    {
        return $this->classname;
    }

    /**
     * @param mixed $classname
     * @return Forward
     */
    public function setClassname($classname)
    {
        $this->classname = $classname;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getReference()
    {
        return $this->reference;
    }

    /**
     * @param mixed $reference
     * @return Forward
     */
    public function setReference($reference)
    {
        $this->reference = $reference;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     * @return Forward
     */
    public function setDescription($description)
    {
        $this->description = $description;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCustom()
    {
        return $this->custom;
    }

    /**
     * @param mixed $custom
     * @return Forward
     */
    public function setCustom($custom)
    {
        $this->custom = $custom;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getContext()
    {
        return $this->context;
    }

    /**
     * @param mixed $context
     * @return Forward
     */
    public function setContext($context)
    {
        $this->context = $context;
        return $this;
    }


    public function constraint(EntityManager $em, ConstraintViolationException $ex)
    {

        if (preg_match('/table "ivr_option"/', $ex->getMessage())) {

            $list = $em->getRepository(IvrOption::class)->findBy(['goto' => $this]);

            $listId = [];

            foreach ($list as $obj) {
                $listId[] = $obj->getIvr()->getId();
            }

            throw new \Exception('Registro está associado a(s) URA (' . implode(", ", $listId) . ')', 400);
        }

        if (preg_match('/table "incoming"/', $ex->getMessage())) {

            $list = $em->getRepository(Incoming::class)->findBy(['to' => $this]);

            $listId = [];

            foreach ($list as $obj) {
                $listId[] = $obj->getId();
            }

            throw new \Exception('Registro está associado a(s) Entrada(s) de ligação (' . implode(", ", $listId) . ')', 400);
        }


        if (preg_match('/table "branch"/', $ex->getMessage())) {

            $listId = [];

            $list = $em->getRepository(Branch::class)->findBy(['alwaysIn' => $this]);
            $list = array_merge($list, $em->getRepository(Branch::class)->findBy(['busyIn' => $this]));

            foreach ($list as $obj) {
                $listId[$obj->getId()] = $obj->getId();
            }

            throw new \Exception('Registro está associado ao(s) Ramal(is) (' . implode(", ", $listId) . ')', 400);
        }
    }
}