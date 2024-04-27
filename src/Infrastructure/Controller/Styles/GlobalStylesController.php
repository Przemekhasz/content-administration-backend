<?php

namespace App\Infrastructure\Controller\Styles;

use App\Application\Styles\GlobalStylesAdapter;
use App\Infrastructure\Api\API;
use OpenApi\Attributes as OA;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
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
    public function globalStyles(): JsonResponse
    {
        try {
            $dto = $this->adapter->findGlobalStyles();

            return $this->api->json($dto);
        } catch (\Exception $exception) {
            return $this->api->throwException($exception);
        }
    }
}
