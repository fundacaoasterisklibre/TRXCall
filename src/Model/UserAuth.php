<?php
/**
 * Created by IntelliJ IDEA.
 * User: victo
 * Date: 01/02/2018
 * Time: 00:18
 */

namespace App\Model;


class UserAuth
{
    private $username;
    private $secret;
    private $clientId;
    private $secretId;

    /**
     * @return mixed
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @param mixed $username
     * @return UserAuth
     */
    public function setUsername($username)
    {
        $this->username = $username;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getSecret()
    {
        return $this->secret;
    }

    /**
     * @param mixed $secret
     * @return UserAuth
     */
    public function setSecret($secret)
    {
        $this->secret = $secret;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getClientId()
    {
        return $this->clientId;
    }

    /**
     * @param mixed $clientId
     * @return UserAuth
     */
    public function setClientId($clientId)
    {
        $this->clientId = $clientId;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getSecretId()
    {
        return $this->secretId;
    }

    /**
     * @param mixed $secretId
     * @return UserAuth
     */
    public function setSecretId($secretId)
    {
        $this->secretId = $secretId;
        return $this;
    }


}