<?php

namespace App\Infrastructure\Controller\MenuItems;

use App\Application\MenuItem\MenuItemsAdapter;
use App\Infrastructure\Api\API;
use App\Infrastructure\Exception\MenuItems\MenuItemsNotFoundException;
use OpenApi\Attributes as OA;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[OA\Tag('Menu items')]
class MenuItemsController extends AbstractController
{
    public function __construct(
        private readonly API $api,
        private readonly MenuItemsAdapter $adapter,
    ) {
    }

    #[Route(path: '/menu-items', methods: ['GET'])]
    #[OA\Response(
        response: 200,
        description: 'Returns menu items',
    )]
    #[OA\Response(response: 404, description: 'Menu items not found')]
    public function all(): JsonResponse
    {
        try {
            $dto = $this->adapter->findAll();

            return $this->api->json($dto);
        } catch (MenuItemsNotFoundException) {
            return new JsonResponse(status: Response::HTTP_NOT_FOUND);
        }
    }
}
