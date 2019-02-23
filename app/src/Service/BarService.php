<?php declare(strict_types=1);

namespace Starlit\App\Examples\Service;

class BarService
{
    /**
     * @var FooService
     */
    private $fooService;

    /**
     * BarService constructor.
     *
     * @param FooService $fooService
     */
    public function __construct(FooService $fooService)
    {
        $this->fooService = $fooService;
    }

    public function bar(): string
    {
        return 'bar';
    }
}
