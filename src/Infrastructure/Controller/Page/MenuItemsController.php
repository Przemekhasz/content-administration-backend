<?php

namespace App\Infrastructure\Controller\Page;

use App\Application\Page\MenuItemsAdapter;
use App\Application\Page\PageAdapter;
use App\Infrastructure\Api\API;
use OpenApi\Attributes as OA;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

#[OA\Tag('Page')]
class MenuItemsController extends AbstractController
{
    public function __construct(
        private readonly API $api,
        private readonly MenuItemsAdapter $adapter,
    ) {
    }

    #[Route(path: '/page/menu-items', methods: ['GET'])]
    #[OA\Response(
        response: 200,
        description: 'Returns menu items',
    )]
    public function all(): JsonResponse
    {
        try {
            $dto = $this->adapter->findAll();

            return $this->api->json($dto);
        } catch (\Exception $exception) {
            return $this->api->throwException($exception);
        }
    }
}
