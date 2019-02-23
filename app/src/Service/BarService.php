<?php declare(strict_types=1);

namespace Starlit\App\Examples\Service;

class BarService
{
    /**
     * @var FooService
     */
    private $foo;

    /**
     * BarService constructor.
     *
     * @param FooService $foo
     */
    public function __construct(FooService $foo)
    {
        $this->foo = $foo;
    }

    public function foo(): string
    {
        return $this->foo->foo();
    }

    public function bar(): string
    {
        return 'bar';
    }
}
