<?php
// src/Controller/MapController.php

namespace App\Controller;

use App\Entity\MapPoint;
use App\Repository\MapPointRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/api/map')]
class MapController extends AbstractController
{
    #[Route('/points', name: 'api_map_points', methods: ['GET'])]
    public function getPoints(MapPointRepository $repo): JsonResponse
    {
        $points = $repo->findAll();
        $data = array_map(fn(MapPoint $p) => [
            'id'        => $p->getId(),
            'latitude'  => $p->getLatitude(),
            'longitude' => $p->getLongitude(),
            'label'     => $p->getLabel(),
        ], $points);

        return $this->json($data);
    }

    #[Route('/points', name: 'api_map_points_add', methods: ['POST'])]
    public function addPoint(Request $request, EntityManagerInterface $em): JsonResponse
    {
        $body = json_decode($request->getContent(), true);

        if (!isset($body['latitude'], $body['longitude'], $body['label'])) {
            return $this->json(['error' => 'Données manquantes'], 400);
        }

        $point = new MapPoint();
        $point->setLatitude($body['latitude']);
        $point->setLongitude($body['longitude']);
        $point->setLabel($body['label']);

        $em->persist($point);
        $em->flush();

        return $this->json(['id' => $point->getId()], 201);
    }

    #[Route('/points/{id}', name: 'api_map_points_delete', methods: ['DELETE'])]
    public function deletePoint(MapPoint $point, EntityManagerInterface $em): JsonResponse
    {
        $em->remove($point);
        $em->flush();

        return $this->json(['success' => true]);
    }
}
