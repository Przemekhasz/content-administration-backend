<?php

namespace App\Infrastructure\Controller\Page;

use App\Application\Page\PageAdapter;
use App\Infrastructure\Api\API;
use OpenApi\Attributes as OA;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
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
    #[OA\Response(
        response: 200,
        description: 'Returns page by id',
    )]
    public function page(string $id): JsonResponse
    {
        try {
            $dto = $this->adapter->findById($id);

            return $this->api->json($dto);
        } catch (\Exception $exception) {
            return $this->api->throwException($exception);
        }
    }

    #[Route(path: '/pages', methods: ['GET'])]
    #[OA\Response(
        response: 200,
        description: 'Returns page by id',
    )]
    public function pages(): JsonResponse
    {
        try {
            $dto = $this->adapter->findAll();

            return $this->api->json($dto);
        } catch (\Exception $exception) {
            return $this->api->throwException($exception);
        }
    }

    #[Route(path: '/page/{id}/galleries', methods: ['GET'])]
    #[OA\Response(
        response: 200,
        description: 'Returns page galleries',
    )]
    public function galleries(string $id): JsonResponse
    {
        try {
            $dto = $this->adapter->findGalleryByPageId($id);

            return $this->api->json($dto);
        } catch (\Exception $exception) {
            return $this->api->throwException($exception);
        }
    }

    #[Route(path: '/page/{id}/projects', methods: ['GET'])]
    #[OA\Response(
        response: 200,
        description: 'Returns page projects',
    )]
    public function projects(string $id): JsonResponse
    {
        try {
            $dto = $this->adapter->findProjectsByPageId($id);

            return $this->api->json($dto);
        } catch (\Exception $exception) {
            return $this->api->throwException($exception);
        }
    }

    #[Route(path: '/page/{id}/styles', methods: ['GET'])]
    #[OA\Response(
        response: 200,
        description: 'Returns page styles',
    )]
    public function styles(string $id): JsonResponse
    {
        try {
            $dto = $this->adapter->findStylesByPageId($id);

            return $this->api->json($dto);
        } catch (\Exception $exception) {
            return $this->api->throwException($exception);
        }
    }

    #[Route(path: '/project/{id}', methods: ['GET'])]
    #[OA\Response(
        response: 200,
        description: 'Returns project by id',
    )]
    public function project(string $id): JsonResponse
    {
        try {
            $dto = $this->adapter->findProjectByProjectId($id);

            return $this->api->json($dto);
        } catch (\Exception $exception) {
            return $this->api->throwException($exception);
        }
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
}
