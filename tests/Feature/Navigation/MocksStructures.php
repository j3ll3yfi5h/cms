<?php

namespace Tests\Feature\Navigation;

use Mockery;
use Statamic\Contracts\Structures\Nav;
use Statamic\Structures\Tree;

trait MocksStructures
{
    private function createNav($handle)
    {
        return tap(Mockery::mock(Nav::class), function ($s) use ($handle) {
            $s->shouldReceive('in')->andReturn($this->createStructureTree($handle));
            $s->shouldReceive('title')->andReturn($handle);
            $s->shouldReceive('handle')->andReturn($handle);
            $s->shouldReceive('showUrl')->andReturn('/nav-show-url');
            $s->shouldReceive('editUrl')->andReturn('/nav-edit-url');
            $s->shouldReceive('deleteUrl')->andReturn('/nav-delete-url');
            $s->shouldReceive('collections')->andReturn(collect());
            $s->shouldReceive('expectsRoot')->andReturnFalse();
        });
    }

    private function createStructureTree($handle)
    {
        return tap(Mockery::mock(Tree::class), function ($s) use ($handle) {
            $s->shouldReceive('showUrl')->andReturn('/tree-show-url');
            $s->shouldReceive('editUrl')->andReturn('/tree-edit-url');
            $s->shouldReceive('route')->andReturn('/route');
        });
    }
}