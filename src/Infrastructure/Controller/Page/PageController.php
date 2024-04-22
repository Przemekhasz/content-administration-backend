<?php

namespace App\Infrastructure\Controller\Page;

use App\Application\Page\PageAdapter;
use App\Infrastructure\Api\API;
use Exception;
use OpenApi\Attributes as OA;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

#[OA\Tag('Page')]
class PageController extends AbstractController
{
    public function __construct(
        private readonly API          $api,
        private readonly PageAdapter $adapter,
    ) {
    }

    #[Route(path: '/page/{id}', methods: ['GET'])]
    public function pages(string $id): JsonResponse
    {
        try {
            $dto = $this->adapter->findById($id);
            return $this->api->json($dto);
        } catch (Exception $exception) {
            return $this->api->throwException($exception);
        }
    }
}
