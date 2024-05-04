<?php

namespace App\Infrastructure\Controller\Page;

use App\Application\Page\PageAdapter;
use App\Infrastructure\Api\API;
use App\Infrastructure\Exception\Page\PageGalleryNotFoundException;
use App\Infrastructure\Exception\Page\PageNotFoundException;
use App\Infrastructure\Exception\Page\PageProjectNotFoundException;
use App\Infrastructure\Exception\Page\PageStylesNotFoundException;
use OpenApi\Attributes as OA;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[OA\Tag('Page')]
class PageController extends AbstractController
{
    public function __construct(
        private readonly API $api,
        private readonly PageAdapter $adapter,
    ) {
    }

    #[Route(path: '/page/{id}', methods: ['GET'])]
    #[OA\Response(response: 200, description: 'Returns page by id')]
    #[OA\Response(response: 404, description: 'Requested page not found')]
    public function page(string $id): JsonResponse
    {
        try {
            $dto = $this->adapter->findById($id);

            return $this->api->json($dto);
        } catch (PageNotFoundException) {
            return new JsonResponse(status: Response::HTTP_NOT_FOUND);
        }
    }

    #[Route(path: '/pages', methods: ['GET'])]
    #[OA\Response(
        response: 200,
        description: 'Returns page by id',
    )]
    #[OA\Response(response: 404, description: 'Not found')]
    public function pages(): JsonResponse
    {
        try {
            $dto = $this->adapter->findAll();

            return $this->api->json($dto);
        } catch (PageNotFoundException) {
            return new JsonResponse(status: Response::HTTP_NOT_FOUND);
        }
    }

    #[Route(path: '/page/{id}/galleries', methods: ['GET'])]
    #[OA\Response(
        response: 200,
        description: 'Returns page galleries',
    )]
    #[OA\Response(response: 404, description: 'Page galleries not found')]
    public function galleries(string $id): JsonResponse
    {
        try {
            $dto = $this->adapter->findGalleryByPageId($id);

            return $this->api->json($dto);
        } catch (PageGalleryNotFoundException) {
            return new JsonResponse(status: Response::HTTP_NOT_FOUND);
        }
    }

    #[Route(path: '/page/{id}/projects', methods: ['GET'])]
    #[OA\Response(
        response: 200,
        description: 'Returns page projects',
    )]
    #[OA\Response(response: 404, description: 'Page projects not found')]
    public function projects(string $id): JsonResponse
    {
        try {
            $dto = $this->adapter->findProjectsByPageId($id);

            return $this->api->json($dto);
        } catch (PageProjectNotFoundException) {
            return new JsonResponse(status: Response::HTTP_NOT_FOUND);
        }
    }

    #[Route(path: '/page/{id}/styles', methods: ['GET'])]
    #[OA\Response(
        response: 200,
        description: 'Returns page styles',
    )]
    #[OA\Response(response: 404, description: 'Page styles not found')]
    public function styles(string $id): JsonResponse
    {
        try {
            $dto = $this->adapter->findStylesByPageId($id);

            return $this->api->json($dto);
        } catch (PageStylesNotFoundException) {
            return new JsonResponse(status: Response::HTTP_NOT_FOUND);
        }
    }
}
