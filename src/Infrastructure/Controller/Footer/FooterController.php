<?php

namespace App\Infrastructure\Controller\Footer;

use App\Application\Footer\FooterAdapter;
use App\Infrastructure\Api\API;
use App\Infrastructure\Exception\Project\ProjectNotFoundException;
use OpenApi\Attributes as OA;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[OA\Tag('Footer')]
class FooterController extends AbstractController
{
    public function __construct(
        private readonly API $api,
        private readonly FooterAdapter $adapter,
    ) {
    }

    #[Route(path: '/footer', methods: ['GET'])]
    #[OA\Response(
        response: 200,
        description: 'Returns project by id',
    )]
    #[OA\Response(response: 404, description: 'Footer not found')]
    public function project(): JsonResponse
    {
        try {
            $dto = $this->adapter->findFooter();

            return $this->api->json($dto);
        } catch (ProjectNotFoundException) {
            return new JsonResponse(status: Response::HTTP_NOT_FOUND);
        }
    }
}
