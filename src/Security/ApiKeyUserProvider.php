<?php
/**
 * Created by IntelliJ IDEA.
 * User: victo
 * Date: 31/01/2018
 * Time: 22:07
 */

namespace App\Security;

use App\Entity\Auth\AccessToken;
use App\Entity\User;
use Doctrine\ORM\EntityManager;
use Symfony\Component\Security\Core\Exception\CredentialsExpiredException;
use Symfony\Component\Security\Core\Exception\UnsupportedUserException;
use Symfony\Component\Security\Core\Exception\UsernameNotFoundException;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\User\UserProviderInterface;


class ApiKeyUserProvider  implements UserProviderInterface
{

    /**
     * @var EntityManager
     */
    private $em;

    public function __construct(EntityManager $em)
    {
        $this->em = $em;
    }


    public function getUsernameForApiKey($apiKey)
    {
        // Look up the username based on the token in the database, via
        // an API call, or do something entirely different


        $accessToken = $this->em->getRepository(AccessToken::class)
            ->findOneBy(['token' => $apiKey]);

        if (!$accessToken instanceof AccessToken) {
            return null;
        }

        if ($accessToken->hasExpired()) {
            throw new CredentialsExpiredException('Access token expired!', 401);
        }

        return $accessToken->getUser()->getUsername();
    }


    /**
     * Loads the user for the given username.
     *
     * This method must throw UsernameNotFoundException if the user is not
     * found.
     *
     * @param string $username The username
     *
     * @return UserInterface
     *
     * @throws UsernameNotFoundException if the user is not found
     */
    public function loadUserByUsername($username)
    {
       $user =  $this->em->getRepository(User::class)->findOneBy(['username'=> $username]);

       return $user;
    }

    /**
     * Refreshes the user.
     *
     * It is up to the implementation to decide if the user data should be
     * totally reloaded (e.g. from the database), or if the UserInterface
     * object can just be merged into some internal array of users / identity
     * map.
     *
     * @return UserInterface
     *
     * @throws UnsupportedUserException if the user is not supported
     */
    public function refreshUser(UserInterface $user)
    {
        return $user;
    }

    /**
     * Whether this provider supports the given user class.
     *
     * @param string $class
     *
     * @return bool
     */
    public function supportsClass($class)
    {
        return User::class === $class;
    }
}