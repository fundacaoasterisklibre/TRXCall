<?php
/**
 * Created by IntelliJ IDEA.
 * User: victo
 * Date: 14/01/2018
 * Time: 13:03
 */

namespace App\Entity\Mailing;

use Doctrine\ORM\Mapping as ORM;

/**
 * Class Mailing
 * @package  App\Entity\MailingImport
 *
 * @ORM\Table("mailing_import")
 * @ORM\Entity(repositoryClass="App\Repository\GenericRepository")
 */

class MailingImport
{
    /**
     * @var int
     * @ORM\Column(type="integer")
     * @ORM\Id()
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\SequenceGenerator(sequenceName="mailing_import_seq", initialValue=1, allocationSize=100)
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(type="string")
     */
    private $filename;

    /**
     *
     * @var Mailing
     *
     * @ORM\ManyToOne(targetEntity="App\Entity\Mailing\Mailing")
     * @ORM\JoinColumn(name="mailing_id", referencedColumnName="id")
     */
    private $mailing;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     * @return Mailing
     */
    public function setId($id)
    {
        $this->id = $id;
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
     * @return Mailing
     */
    public function setDescription($description)
    {
        $this->description = $description;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getForward()
    {
        return $this->forward;
    }

    /**
     * @param mixed $forward
     * @return Mailing
     */
    public function setForward($forward)
    {
        $this->forward = $forward;
        return $this;
    }

    /**
     * @return string
     */
    public function getFilename()
    {
        return $this->filename;
    }

    /**
     * @param string $filename
     * @return MailingImport
     */
    public function setFilename($filename)
    {
        $this->filename = $filename;
        return $this;
    }

    /**
     * @return Mailing
     */
    public function getMailing()
    {
        return $this->mailing;
    }

    /**
     * @param Mailing $mailing
     * @return MailingImport
     */
    public function setMailing($mailing)
    {
        $this->mailing = $mailing;
        return $this;
    }


}