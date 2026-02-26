<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Attribute\Route;
use App\Entity\User;

final class ApiLoginController extends AbstractController
{
    // #[Route('/api/login', name: 'app_api_login', methods: ['POST'])]
    // public function index(#[CurrentUser] ?User $user): JsonResponse
    // {
    //     if (null === $user) {
    //         return $this->json([
    //             'message' => 'missing credentials',
    //         ], Response::HTTP_UNAUTHORIZED);
    //     }

    //     // $token = ...;

    //     return $this->json([
    //         'user'  => $user->getUserIdentifier(),
    //         // 'token' => $token,
    //     ]);
    // }
}
