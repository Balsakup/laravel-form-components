<?php

namespace Okipa\LaravelFormComponents\Tests\Unit\Buttons\Classes;

use Okipa\LaravelFormComponents\Components\Button\Link;
use Okipa\LaravelFormComponents\Tests\TestCase;

class ButtonLinkClassesTest extends TestCase
{
    /** @test */
    public function it_can_setup_default_classes_when_none_are_defined(): void
    {
        $html = $this->renderComponent(Link::class);
        self::assertStringContainsString(' class="btn btn-primary"', $html);
    }

    /** @test */
    public function it_can_set_custom_classes(): void
    {
        $html = $this->renderComponent(Link::class, [], [], ['class' => 'btn-secondary']);
        self::assertStringContainsString('class="btn btn-secondary"', $html);
    }
}
