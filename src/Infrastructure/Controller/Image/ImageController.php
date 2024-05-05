<?php

namespace App\Infrastructure\Controller\Image;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\BinaryFileResponse;
use Symfony\Component\Routing\Annotation\Route;
use OpenApi\Attributes as OA;

#[OA\Tag('Shared Image')]
class ImageController extends AbstractController
{
    #[Route(path: '/public/image/share/{imageName}', methods: ['GET'])]
    #[OA\Response(
        response: 200,
        description: 'Returns gallery by id',
    )]
    #[OA\Response(response: 404, description: 'image not found')]
    public function showImage(string $imageName)
    {
        $imagePath = $this->getParameter('kernel.project_dir').'/public/uploads/img/'.$imageName;

        $response = new BinaryFileResponse($imagePath);
        $response->headers->set('Content-Type', mime_content_type($imagePath));

        return $response;
    }
}
