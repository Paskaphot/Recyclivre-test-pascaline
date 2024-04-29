<?php

declare(strict_types=1);

namespace App\Twig;

use App\Entity\Book;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;
use Symfony\Component\HttpFoundation\RequestStack;
use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;

final class AppExtension extends AbstractExtension
{
    private ParameterBagInterface $parameterBag;

    private RequestStack $requestStack;

    public function __construct(ParameterBagInterface $parameterBag, RequestStack $requestStack)
    {
        $this->parameterBag = $parameterBag;
        $this->requestStack = $requestStack;
    }

    public function getFunctions()
    {
        return [
            new TwigFunction('book_images_url', [$this, 'getImageUrl']),
        ];
    }

    public function getImageUrl(Book $book, bool $absolute = false): string
    {
        return (true === $absolute ? $this->requestStack->getCurrentRequest()->getSchemeAndHttpHost() : '').$this->parameterBag->get('book_images_path').'/'.$book->getImageName();
    }
}
