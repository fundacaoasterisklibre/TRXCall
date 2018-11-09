<?php
/**
 * Created by IntelliJ IDEA.
 * User: victo
 * Date: 26/01/2018
 * Time: 00:26
 */

namespace App\Controller\Impl;

use App\Entity\Auth\AccessToken;
use App\Entity\Auth\Client;
use App\Entity\Auth\RefreshToken;
use App\Entity\User;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;
use Symfony\Component\Security\Core\Exception\UsernameNotFoundException;

class AuthController extends AbstractRestController
{
    private $em;

    public function authAction(Request $request)
    {
        $this->em = $this->get('doctrine.orm.default_entity_manager');
        $username = $request->get('username', null);
        $secret = $request->get('secret', null);
        $clientId = $request->get('clientId', null);
        $secretId = $request->get('secretId', null);
        $token = $request->get('token', null);


        if ($token !== null) {
            list($username, $secret) = explode($token);
        }

        if ($username === null) {
            throw new BadRequestHttpException("Username not found!");
        }

        if ($secret === null) {
            throw new BadRequestHttpException("Secret not found!");
        }

        if ($clientId === null) {
            throw new BadRequestHttpException("Client ID not found!");
        }

        if ($secretId === null) {
            throw new BadRequestHttpException("Secret ID not found!");
        }

        $client = $this->em->getRepository('App:Auth\Client')
            ->findOneBy(['clientId' => $clientId, 'secretId' => $secretId]);

        if (!$client instanceof Client) {
            throw new \Exception('Client not found!', 401);
        }

        $user = $this->em
            ->getRepository('App:User')
            ->findOneBy(['username' => $username]);

        if (!$user instanceof User) {
            throw new UsernameNotFoundException('Username not found', 401);
        }

        $encoder = $this->get('security.password_encoder');

        if (!$encoder->isPasswordValid($user, $secret)) {
            throw new UsernameNotFoundException('Username not found', 401);
        }
        $token = $encoder->encodePassword($user, date_timestamp_get(new \DateTime()));

        $accessToken = new AccessToken();
        $accessToken->setClient($client);
        $accessToken->setUser($user);
        $accessToken->setToken($token);
        $accessToken->setExpiresAt(time() + 3600);
        $this->em->persist($accessToken);

        $token = $encoder->encodePassword($user, date_timestamp_get(new \DateTime()) * date_timestamp_get(new \DateTime()));

        $refreshToken = new RefreshToken();
        $refreshToken->setClient($client);
        $refreshToken->setUser($user);
        $refreshToken->setToken($token);
        $refreshToken->setExpiresAt(time() + (86400));
        $this->em->persist($refreshToken);

        $this->em->flush();

        $return = [
            'accessToken' => $accessToken->getToken(),
            'refreshToken' => $refreshToken->getToken()
        ];

        return $this->jsonParseView($return);
    }

    public function refreshAction(Request $request)
    {
        $this->em = $this->get('doctrine.orm.default_entity_manager');
        $clientId = $request->get('clientId', null);
        $secretId = $request->get('secretId', null);
        $refreshToken = $request->get('refreshToken', null);

        $client = $this->em->getRepository('App:Auth\Client')
            ->findOneBy(['clientId' => $clientId, 'secretId' => $secretId]);

        if (!$client instanceof Client) {
            throw new \Exception('Client not found!', 401);
        }

        $refreshToken = $this->em->getRepository(RefreshToken::class)
            ->findOneBy(['token' => $refreshToken]);

        if (!$refreshToken instanceof RefreshToken) {
            throw new \Exception('Refresh token not found!', 401);
        }
        $encoder = $this->get('security.password_encoder');

        $user = $refreshToken->getUser();
        $token = $encoder->encodePassword($user, date_timestamp_get(new \DateTime()));

        $accessToken = new AccessToken();
        $accessToken->setClient($client);
        $accessToken->setUser($user);
        $accessToken->setToken($token);
        $accessToken->setExpiresAt(time() + (3600));
        $this->em->persist($accessToken);

        $token = $encoder->encodePassword($user, date_timestamp_get(new \DateTime()) * date_timestamp_get(new \DateTime()));

        $refreshToken = new RefreshToken();
        $refreshToken->setClient($client);
        $refreshToken->setUser($user);
        $refreshToken->setToken($token);
        $refreshToken->setExpiresAt(time() + (86400));
        $this->em->persist($refreshToken);

        $this->em->flush();

        $return = [
            'accessToken' => $accessToken->getToken(),
            'refreshToken' => $refreshToken->getToken()
        ];

        return $this->jsonParseView($return);
    }

    public function logoutAction(Request $request) {

        $em = $this->get('doctrine.orm.default_entity_manager');

        $token = $this->getToken();

        $accessToken = $em->getRepository(AccessToken::class)
            ->findOneBy(['token'=> $token]);

        $accessToken->setExpiresAt(time());

        $em->flush();

        $this->get('security.token_storage')->setToken(null);
        $request->getSession()->invalidate();

        return $this->jsonParseView([]);
    }

}