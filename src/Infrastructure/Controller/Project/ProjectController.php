<?php

namespace App\Infrastructure\Controller\Project;

use App\Application\Project\ProjectAdapter;
use App\Infrastructure\Api\API;
use OpenApi\Attributes as OA;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

#[OA\Tag('Project')]
class ProjectController extends AbstractController
{
    public function __construct(
        private readonly API $api,
        private readonly ProjectAdapter $adapter,
    ) {
    }

    #[Route(path: '/project/{id}', methods: ['GET'])]
    #[OA\Response(
        response: 200,
        description: 'Returns project by id',
    )]
    public function project(string $id): JsonResponse
    {
        try {
            $dto = $this->adapter->findById($id);

            return $this->api->json($dto);
        } catch (\Exception $exception) {
            return $this->api->throwException($exception);
        }
    }

    #[Route(path: '/project/{id}/details', methods: ['GET'])]
    #[OA\Response(
        response: 200,
        description: 'Returns project details',
    )]
    public function projectDetails(string $id): JsonResponse
    {
        try {
            $dto = $this->adapter->findProjectDetails($id);

            return $this->api->json($dto);
        } catch (\Exception $exception) {
            return $this->api->throwException($exception);
        }
    }
}
