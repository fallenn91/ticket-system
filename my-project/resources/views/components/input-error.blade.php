@props(['messages' => []])

@if ($messages && count($messages) > 0)
    <p {{ $attributes->merge(['class' => 'text-sm text-red-600 mt-2']) }}>
        {{ $messages[0] }}
    </p>
@endif
