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
 * Class RefreshToken
 * @package  App\Entity
 *
 * @ORM\Table("oauth_refresh_token")
 * @ORM\Entity()
 */
class RefreshToken extends AbstractToken
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\SequenceGenerator(sequenceName="auth_client_sequence", initialValue=1, allocationSize=100)
     */
    private $id;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     * @return RefreshToken
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

}