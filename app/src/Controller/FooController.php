<?php declare(strict_types=1);

namespace Starlit\App\Examples\Controller;

use Starlit\App\AbstractController;
use Starlit\App\Examples\Service\BarService;
use Symfony\Component\HttpFoundation\Response;

class FooController extends AbstractController
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

    public function barAction(int $id): Response
    {
        $bar = $this->barService->bar();

        return Response::create("Hello $bar (id: $id)");
    }

    public function fooAction(): Response
    {
        return Response::create('FooController::fooAction');
    }

    public function internalForwardAction(): Response
    {
        return $this->forward('foo');
    }

    public function externalForwardAction(): Response
    {
        return $this->forward('foo', 'bar');
    }
}
