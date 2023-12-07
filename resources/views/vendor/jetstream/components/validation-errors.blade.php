@if ($errors->any())
<div {{ $attributes }}>
    <div class="font-medium text-danger text-center">{{ __('Whoops! Something went wrong.') }}</div>

    <ul class="mt-3 list-disc list-inside text-sm text-danger">
        @foreach ($errors->all() as $error)
        {{ $error }}
        @endforeach
    </ul>
</div>
@endif