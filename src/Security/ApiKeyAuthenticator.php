<?php
/**
 * Created by IntelliJ IDEA.
 * User: victo
 * Date: 31/01/2018
 * Time: 21:48
 */

namespace App\Security;


use PHPUnit\Runner\Exception;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Security\Core\Authentication\Token\PreAuthenticatedToken;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\Exception\AuthenticationException;
use Symfony\Component\Security\Core\Exception\BadCredentialsException;
use Symfony\Component\Security\Core\Exception\CustomUserMessageAuthenticationException;
use Symfony\Component\Security\Core\User\UserProviderInterface;
use Symfony\Component\Security\Http\Authentication\AuthenticationFailureHandlerInterface;
use Symfony\Component\Security\Http\Authentication\SimplePreAuthenticatorInterface;

class ApiKeyAuthenticator implements SimplePreAuthenticatorInterface, AuthenticationFailureHandlerInterface
{
    public function authenticateToken(TokenInterface $token, UserProviderInterface $userProvider, $providerKey)
    {
        if (!$userProvider instanceof ApiKeyUserProvider) {
            throw new \InvalidArgumentException(
                sprintf(
                    'The user provider must be an instance of ApiKeyUserProvider (%s was given).',
                    get_class($userProvider)
                )
            );
        }

        $apiKey = $token->getCredentials();
        $username = $userProvider->getUsernameForApiKey($apiKey);

        if (!$username) {
            throw new CustomUserMessageAuthenticationException(
                sprintf('API Key "%s" does not exist.', $apiKey)
                ,[]
                ,401
            );
        }

        $user = $userProvider->loadUserByUsername($username);

        return new PreAuthenticatedToken(
            $user,
            $apiKey,
            $providerKey,
            $user->getRoles()
        );
    }

    public function supportsToken(TokenInterface $token, $providerKey)
    {
        if (!$token instanceof PreAuthenticatedToken) {
            return false;
        }

        return $token->getProviderKey() === $providerKey;
    }

    public function createToken(Request $request, $providerKey)
    {
        $authentication = $request->headers->get('Authorization');

        if (!$authentication) {
            throw new BadCredentialsException("Authorization Bearer not found!", 401);
        }

        $isBearer =  preg_match("/^([Bb][Ee][Aa][Rr][Ee][Rr]) (.*)/", $authentication, $output);

        if (!$isBearer) {
            throw new BadCredentialsException('Authorization Bearer not found!', 401);
        }

        $bearer = $output[2];

        return new PreAuthenticatedToken(
            'anon.',
            $bearer,
            $providerKey
        );
    }

    /**
     * This is called when an interactive authentication attempt fails. This is
     * called by authentication listeners inheriting from
     * AbstractAuthenticationListener.
     *
     * @return Response The response to return, never null
     */
    public function onAuthenticationFailure(Request $request, AuthenticationException $exception)
    {
        throw $exception;
    }
}