<?php

declare(strict_types=1);

namespace App\Serializer\Normalizer;

use App\Entity\Book;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;

final class BookNormalizer implements NormalizerInterface, NormalizerAwareInterface
{
    use NormalizerAwareTrait;

    private ParameterBagInterface $parameterBag;

    private RequestStack $requestStack;

    public function __construct(ParameterBagInterface $parameterBag, RequestStack $requestStack)
    {
        $this->parameterBag = $parameterBag;
        $this->requestStack = $requestStack;
    }

    /**
     * @param Book $object
     *
     * @return array<string, mixed>
     */
    public function normalize(mixed $object, ?string $format = null, array $context = []): array
    {
        // avoid circular reference
        $context[spl_object_id($object).'.'.self::class.'.already_called'] = true;

        $object->setImageUrl($this->requestStack->getCurrentRequest()->getSchemeAndHttpHost().$this->parameterBag->get('book_images_path').'/'.$object->getImageName());

        return $this->normalizer->normalize($object, $format, $context);
    }

    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        if (!$data instanceof Book) {
            return false;
        }

        // avoid circular reference
        if (
            true === isset($context[spl_object_id($data).'.'.self::class.'.already_called'])
            && true === $context[spl_object_id($data).'.'.self::class.'.already_called']
        ) {
            return false;
        }

        return true;
    }

    public function getSupportedTypes(?string $format): array
    {
        return [Book::class => false];
    }
}
