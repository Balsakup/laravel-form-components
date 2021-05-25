<?php

namespace Okipa\LaravelFormComponents\Components\Traits;

use Closure;

trait HasAddon
{
    public function getPrepend(string|null $locale): string|null
    {
        if ($this->prepend instanceof Closure) {
            return ($this->prepend)($locale ?: app()->getLocale());
        }

        return $this->prepend;
    }

    public function getAppend(string|null $locale): string|null
    {
        if ($this->append instanceof Closure) {
            return ($this->append)($locale ?: app()->getLocale());
        }

        return $this->append;
    }
}
