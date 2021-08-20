<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/api/messages")
 */
class APIController extends AbstractController
{
    /**
     * @Route("/public", name="public")
     */
    public function publicAction()
    : JsonResponse
    {
        return $this->json(["message" => "The API doesn't require an access token to share this message."], 200);
    }

    /**
     * @Route("/protected", name="protected")
     */
    public function privateAction()
    : JsonResponse
    {
        return $this->json(["message" => "The API successfully validated your access token."], 200);
    }

    /**
     * @Route("/admin", name="admin")
     */
    public function adminAction(): JsonResponse
    {
        return $this->json(["message" => "The API successfully recognized you as an admin."], 200);
    }
}
