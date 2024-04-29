<?php

declare(strict_types=1);

namespace App\Controller;

use App\Repository\ImpactRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

final class ImpactController extends AbstractController
{
    private ImpactRepository $impactRepository;

    public function __construct(ImpactRepository $impactRepository)
    {
        $this->impactRepository = $impactRepository;
    }

    #[Route('/impact', name: 'impact_index', methods: [Request::METHOD_GET], format: 'json')]
    public function index(): JsonResponse
    {
        $impact = $this->impactRepository->findOne();

        return $this->json([
            'impact' => $impact,
        ]);
    }
}
