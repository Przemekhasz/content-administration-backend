<?php

namespace App\Infrastructure\Api;

use App\Infrastructure\Api\Interface\ApiInterface;
use Doctrine\Common\Annotations\AnnotationReader;
use Exception;
use JetBrains\PhpStorm\Pure;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Mapping\Factory\ClassMetadataFactory;
use Symfony\Component\Serializer\Mapping\Loader\AnnotationLoader;
use Symfony\Component\Serializer\NameConverter\NameConverterInterface;
use Symfony\Component\Serializer\Normalizer\AbstractNormalizer;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;

/**
 *
 */
class API implements ApiInterface
{
    /**
     * @var NameConverterInterface|null
     */
    private ?NameConverterInterface $nameConverter = null;
    /**
     * @var array
     */
    private array $groups = [];
    /**
     * @var array
     */
    private array $ignored = [];
    /**
     * @var int
     */
    private int $status = Response::HTTP_OK;

    /**
     * @param string $type
     */
    #[Pure] public function __construct(string $type = '')
    {
    }

    /**
     * @param NameConverterInterface $converter
     * @return $this
     */
    public function setConverter(NameConverterInterface $converter): self
    {
        $this->nameConverter = $converter;
        return $this;
    }

    /**
     * @param array $groups
     * @return $this
     */
    public function setGroups(array $groups): self
    {
        $this->groups = $groups;
        return $this;
    }

    /**
     * @param array $ignored
     * @return $this
     */
    public function setIgnored(array $ignored): self
    {
        $this->ignored = $ignored;
        return $this;
    }

    /**
     * @param int $status
     * @return $this
     */
    public function setStatus(int $status): self
    {
        $this->status = $status;
        return $this;
    }

    /**
     * @return Serializer
     */
    private function init(): Serializer
    {
        $defaultContext = [
            AbstractNormalizer::CIRCULAR_REFERENCE_HANDLER =>
                function ($obj, $format, $context) {
                    return $obj->getId();
                }
        ];

        if (count($this->groups) > 0) {
            $defaultContext[AbstractNormalizer::GROUPS] = $this->groups;
        }

        if (count($this->ignored) > 0) {
            $defaultContext[AbstractNormalizer::IGNORED_ATTRIBUTES] = $this->ignored;
        }

        $classMetadataFactory = new ClassMetadataFactory(new AnnotationLoader(new AnnotationReader()));

        $JsonEncoder = new JsonEncoder();
        $objectNormalizer = new ObjectNormalizer(
            $classMetadataFactory,
            $this->nameConverter,
            null,
            null,
            null,
            null,
            $defaultContext
        );

        return new Serializer([$objectNormalizer], [$JsonEncoder]);
    }

    /**
     * @param mixed $object
     * @param int $status
     * @return JsonResponse
     */
    public function json(mixed $object, int $status = Response::HTTP_OK): JsonResponse
    {
        $this->status = $status;
        $json = $this->init()->serialize($object, JsonEncoder::FORMAT);
        $status = $this->calculateStatus($this->status);
        return new JsonResponse($json, $status, [], true);
    }


    /**
     * @param string|Exception $exception
     * @return JsonResponse
     */
    public function throwException(Exception $exception): JsonResponse
    {
        $status = $this->calculateStatus($exception->getCode());
        $body = [
            'message' => $exception->getMessage(),
            'status' => $status
        ];

        return $this->Json($body, $status);
    }

    /**
     * @param int $status
     * @return int
     */
    private function calculateStatus(int $status): int
    {
        if ($status < 200) {
            $status = 500;
        }

        return $status;
    }
}
