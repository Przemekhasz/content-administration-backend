<?php

namespace App\Infrastructure\Controller\Styles;

use App\Application\Styles\GlobalStylesAdapter;
use App\Infrastructure\Api\API;
use App\Infrastructure\Exception\Styles\GlobalStylesNotFoundException;
use OpenApi\Attributes as OA;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[OA\Tag('Global styles')]
class GlobalStylesController extends AbstractController
{
    public function __construct(
        private readonly API $api,
        private readonly GlobalStylesAdapter $adapter,
    ) {
    }

    #[Route(path: '/global-styles', methods: ['GET'])]
    #[OA\Response(
        response: 200,
        description: 'Returns global styles',
    )]
    #[OA\Response(response: 404, description: 'Global styles not found')]
    public function globalStyles(): JsonResponse
    {
        try {
            $dto = $this->adapter->findGlobalStyles();

            return $this->api->json($dto);
        } catch (GlobalStylesNotFoundException) {
            return new JsonResponse(status: Response::HTTP_NOT_FOUND);
        }
    }
}
