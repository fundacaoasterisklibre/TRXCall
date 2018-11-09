<?php
/**
 * Created by IntelliJ IDEA.
 * User: victo
 * Date: 01/02/2018
 * Time: 23:01
 */

namespace App\Entity\Auth;

use App\Entity\User;
use Doctrine\ORM\Mapping as ORM;

/**
 * Class AbstractToken
 *
 * @ORM\MappedSuperclass()
 *
 * @package App\Entity\Auth
 */
class AbstractToken
{
    /**
     * @var string
     *
     * @ORM\Column(type="string")
     */
    protected $token;

    /**
     * @var int
     *
     * @ORM\Column(type="bigint", nullable=true)
     */
    protected $expiresAt;

    /**
     * @var Client
     *
     * @ORM\ManyToOne(targetEntity="App\Entity\Auth\Client")
     */
    protected $client;

    /**
     * @var User
     *
     * @ORM\ManyToOne(targetEntity="App\Entity\User")
     */
    protected $user;

    /**
     * @return string
     */
    public function getToken()
    {
        return $this->token;
    }

    /**
     * @param string $token
     * @return AbstractToken
     */
    public function setToken($token)
    {
        $this->token = $token;
        return $this;
    }

    /**
     * @return Client
     */
    public function getClient()
    {
        return $this->client;
    }

    /**
     * @param Client $client
     * @return AbstractToken
     */
    public function setClient($client)
    {
        $this->client = $client;
        return $this;
    }

    /**
     * @return User
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @param User $user
     * @return AbstractToken
     */
    public function setUser($user)
    {
        $this->user = $user;
        return $this;
    }

    /**
     * @return int
     */
    public function getExpiresAt()
    {
        return $this->expiresAt;
    }

    /**
     * @param int $expiresAt
     * @return AbstractToken
     */
    public function setExpiresAt($expiresAt)
    {
        $this->expiresAt = $expiresAt;
        return $this;
    }

    public function getExpiresIn()
    {
        if ($this->expiresAt) {
            return $this->expiresAt - time();
        }
        return PHP_INT_MAX;
    }

    /**
     * {@inheritdoc}
     */
    public function hasExpired()
    {
        if ($this->expiresAt) {
            return time() > $this->expiresAt;
        }
        return true;
    }



}