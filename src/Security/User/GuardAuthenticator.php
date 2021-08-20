<?php


namespace App\Security\User;


use Auth0\JWTAuthBundle\Security\Guard\JwtGuardAuthenticator;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Exception\AuthenticationException;

class GuardAuthenticator extends JwtGuardAuthenticator
{
    public function start(Request $request, AuthenticationException $authException = null)
    {
        $responseBody = [
            'message' => 'No authorization token was found',
        ];

        return new JsonResponse($responseBody, JsonResponse::HTTP_UNAUTHORIZED);
    }
}