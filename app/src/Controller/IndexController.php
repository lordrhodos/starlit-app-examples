<?php declare(strict_types=1);

namespace Starlit\App\Examples\Controller;

use Starlit\App\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class IndexController extends AbstractController
{
    public function indexAction(): Response
    {
        return Response::create('hello world');
    }
}
