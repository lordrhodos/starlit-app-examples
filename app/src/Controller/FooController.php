<?php declare(strict_types=1);

namespace Starlit\App\Examples\Controller;

use Starlit\App\AbstractController;
use Starlit\App\Examples\Service\BarService;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class FooController extends AbstractController
{
    public function barAction(BarService $barService, $id): Response
    {
        return new JsonResponse([
            'id' => $id,
            'bar' => $barService->bar(),
        ]);
    }
}
