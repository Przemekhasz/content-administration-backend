<?php

namespace App\Infrastructure\Controller\CMS;

use App\Infrastructure\Api\API;
use App\Infrastructure\Repository\CMS\PageRepository;
use Exception;
use OpenApi\Attributes as OA;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

#[OA\Tag('Page')]
class PageController extends AbstractController
{
    public function __construct(
        private readonly API          $api,
        private readonly PageRepository $pageRepository,
    ) {
    }

    #[Route(path: '/pages', methods: ['GET'])]
    public function pages(Request $request): JsonResponse
    {
        try {
            $pages = $this->pageRepository->findAllPagesWithDetails();

            return $this->api->json($pages);
        } catch (Exception $exception) {
            return $this->api->throwException($exception);
        }
    }
}
