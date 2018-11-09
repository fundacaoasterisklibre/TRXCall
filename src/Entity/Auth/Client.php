<?php
/**
 * Created by IntelliJ IDEA.
 * User: victo
 * Date: 01/02/2018
 * Time: 00:29
 */

namespace App\Entity\Auth;

use Doctrine\ORM\Mapping as ORM;

/**
 * Class Client
 * @package  App\Entity
 *
 * @ORM\Table("oauth_client")
 * @ORM\Entity()
 */
class Client
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\SequenceGenerator(sequenceName="auth_client_sequence", initialValue=1, allocationSize=100)
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(type="string")
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(type="string")
     */
    private $clientId;

    /**
     * @var string
     *
     * @ORM\Column(type="string")
     */
    private $secretId;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     * @return Client
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return Client
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return string
     */
    public function getClientId()
    {
        return $this->clientId;
    }

    /**
     * @param string $clientId
     * @return Client
     */
    public function setClientId($clientId)
    {
        $this->clientId = $clientId;
        return $this;
    }

    /**
     * @return string
     */
    public function getSecretId()
    {
        return $this->secretId;
    }

    /**
     * @param string $secretId
     * @return Client
     */
    public function setSecretId($secretId)
    {
        $this->secretId = $secretId;
        return $this;
    }

}