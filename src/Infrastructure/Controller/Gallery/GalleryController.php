<?php

namespace App\Infrastructure\Controller\Gallery;

use App\Application\Gallery\GalleryAdapter;
use App\Infrastructure\Api\API;
use OpenApi\Attributes as OA;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

#[OA\Tag('Gallery')]
class GalleryController extends AbstractController
{
    public function __construct(
        private readonly API $api,
        private readonly GalleryAdapter $adapter,
    ) {
    }

    #[Route(path: '/gallery/{id}', methods: ['GET'])]
    #[OA\Response(
        response: 200,
        description: 'Returns gallery by id',
    )]
    public function gallery(string $id): JsonResponse
    {
        try {
            $dto = $this->adapter->findGalleryById($id);

            return $this->api->json($dto);
        } catch (\Exception $exception) {
            return $this->api->throwException($exception);
        }
    }

    #[Route(path: '/gallery/{id}/images', methods: ['GET'])]
    #[OA\Response(
        response: 200,
        description: 'Returns gallery images',
    )]
    public function galleryImages(string $id): JsonResponse
    {
        try {
            $dto = $this->adapter->findGalleryImages($id);

            return $this->api->json($dto);
        } catch (\Exception $exception) {
            return $this->api->throwException($exception);
        }
    }
}
