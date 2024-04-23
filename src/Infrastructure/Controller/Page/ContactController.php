<?php

namespace App\Infrastructure\Controller\Page;

use App\Application\Page\ContactAdapter;
use App\Application\Page\PageAdapter;
use App\Infrastructure\Api\API;
use App\Infrastructure\Api\Interface\DtoSerializerInterface;
use App\Infrastructure\Http\Dto\Page\HttpContact;
use App\Infrastructure\Http\Dto\User\HttpUser;
use Nelmio\ApiDocBundle\Annotation\Model;
use OpenApi\Attributes as OA;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Validator\Validator\ValidatorInterface;

#[OA\Tag('Page')]
class ContactController extends AbstractController
{
    public function __construct(
        private readonly API $api,
        private readonly ContactAdapter $adapter,
        private readonly DtoSerializerInterface $dtoSerializer,
    ) {
    }

    #[Route(path: '/page/contact', methods: ['POST'])]
    #[OA\RequestBody(required: false, content: new OA\JsonContent(ref: new Model(type: HttpContact::class)))]
    #[OA\Response(
        response: 201,
        description: 'Create new message',
    )]
    public function contact(Request $request): JsonResponse
    {
        try {
            $http = $this->dtoSerializer->convert(HttpContact::class, $request);
            $this->adapter->contact($http);
            return new JsonResponse(status: Response::HTTP_CREATED);
        } catch (\Exception $exception) {
            return $this->api->throwException($exception);
        }
    }
}
