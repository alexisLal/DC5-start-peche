<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

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
