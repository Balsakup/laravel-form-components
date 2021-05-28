@foreach($locales as $locale)
    @php
        $id = $getId($locale) ?: $getDefaultId($type, $locale);
        $label = $getLabel($locale);
        $placeholder = $getPlaceholder($locale, $label);
        $value = $getValue($locale);
        $prepend = $getPrepend($locale);
        $append = $getAppend($locale);
        $errorMessage = $getErrorMessage($errors, $locale);
    @endphp
    <div class="{{ $type === 'hidden' ? 'd-none' : 'mb-3'}}{{  $floatingLabel ? ' form-floating' : null }}{{ $prepend || $append ? ' input-group' : null }}">
        @unless($floatingLabel)
            <x-form::label :id="$id" :label="$getLabel($locale)"/>
            @if($prepend)
                <x-form::addon :addon="$prepend"/>
            @endisset
        @endunless
        <input {{ $attributes->merge([
            'id' => $id,
            'class' => 'form-control ' . $getValidationClass($errors, $locale),
            'type' => $type,
            'name' => $locale ? $name . '[' . $locale . ']' : $name,
            'placeholder' => $placeholder,
            'data-locale' => $locale,
            'aria-describedby' => $caption ? $id . '-caption' : null,
        ]) }} value="{{ $value }}"/>
        @if($floatingLabel)
            <x-form::label :id="$id" :label="$label"/>
        @else
            @if($append)
                <x-form::addon :addon="$append"/>
            @endisset
        @endif
        <x-form::caption :inputId="$id" :caption="$caption"/>
        <x-form::error-message :message="$errorMessage"/>
    </div>
@endforeach
