<?php

namespace Okipa\LaravelFormComponents\Components;

use Closure;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Support\Htmlable;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Model;
use Okipa\LaravelFormComponents\Components\Traits\HasAddon;
use Okipa\LaravelFormComponents\Components\Traits\HasId;
use Okipa\LaravelFormComponents\Components\Traits\HasLabel;
use Okipa\LaravelFormComponents\Components\Traits\HasName;
use Okipa\LaravelFormComponents\Components\Traits\HasPlaceholder;
use Okipa\LaravelFormComponents\Components\Traits\HasValidation;
use Okipa\LaravelFormComponents\Components\Traits\HasValue;

class Input extends AbstractComponent
{
    use HasId;
    use HasName;
    use HasLabel;
    use HasValue;
    use HasPlaceholder;
    use HasAddon;
    use HasValidation;

    /** @SuppressWarnings(PHPMD.ExcessiveParameterList) */
    public function __construct(
        public string $name,
        public string|null $id = null,
        public string $type = 'text',
        public Model|null $model = null,
        public string|null $label = null,
        public bool $hideLabel = false,
        public bool|null $floatingLabel = null,
        public string|null $placeholder = null,
        public bool $hidePlaceholder = false,
        public string|Closure|null $prepend = null,
        public string|Closure|null $append = null,
        public string|int|array|Closure|null $value = null,
        public string|null $caption = null,
        public bool|null $displayValidationSuccess = null,
        public bool|null $displayValidationFailure = null,
        public string $errorBag = 'default',
        public array|null $locales = [null]
    ) {
        $this->id = $this->getId();
        $this->label = $this->getLabel();
        $this->floatingLabel = $this->getFloatingLabel();
        $this->placeholder = $this->getPlaceholder();
        $this->prepend = $this->getPrepend();
        $this->append = $this->getAppend();
        $this->displayValidationSuccess = $this->shouldDisplayValidationSuccess();
        $this->displayValidationFailure = $this->shouldDisplayValidationFailure();
        parent::__construct();
    }

    protected function setViewPath(): string
    {
        return 'input';
    }
}
