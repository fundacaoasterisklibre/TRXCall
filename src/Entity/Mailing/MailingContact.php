<?php
/**
 * Created by IntelliJ IDEA.
 * User: victo
 * Date: 14/01/2018
 * Time: 13:04
 */

namespace App\Entity\Mailing;


use Doctrine\ORM\Mapping as ORM;
use TRIX\CampaignBundle\Entity\Campaign\Mailing;


/**
 * Class MailingContact
 * @package  App\Entity\Mailing
 *
 * @ORM\Table("mailing_contact")
 * @ORM\Entity(repositoryClass="App\Repository\GenericRepository")
 */
class MailingContact
{
    /**
     * @var int
     * @ORM\Column(type="integer")
     * @ORM\Id()
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\SequenceGenerator(sequenceName="mailing_contact_seq", initialValue=1, allocationSize=100)
     */
    private $id;

    /**
     * @var Mailing
     *
     * @ORM\ManyToOne(targetEntity="App\Entity\Mailing\Mailing")
     */
    private $mailing;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(type="json_array")
     */
    private $info;

    /**
     * @ORM\Column(type="json_array")
     */
    private $phone;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     * @return MailingContact
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCampaign()
    {
        return $this->campaign;
    }

    /**
     * @param mixed $campaign
     * @return MailingContact
     */
    public function setCampaign($campaign)
    {
        $this->campaign = $campaign;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     * @return MailingContact
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getInfo()
    {
        return $this->info;
    }

    /**
     * @param mixed $info
     * @return MailingContact
     */
    public function setInfo($info)
    {
        $this->info = $info;
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
     * @return MailingContact
     */
    public function setMailing($mailing)
    {
        $this->mailing = $mailing;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * @param mixed $phone
     * @return MailingContact
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;
        return $this;
    }


}