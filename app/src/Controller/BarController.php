<?php declare(strict_types=1);

namespace Starlit\App\Examples\Controller;

use Starlit\App\AbstractController;
use Starlit\App\Examples\Service\BarService;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class BarController extends AbstractController
{
    /**
     * @var BarService
     */
    private $barService;

    /**
     * FooController constructor.
     *
     * @param BarService $barService
     */
    public function __construct(BarService $barService)
    {
        $this->barService = $barService;
    }

    public function fooAction(): Response
    {
        return Response::create('BarController::fooAction');
    }
}
