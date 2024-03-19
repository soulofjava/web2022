<!-- start looping component -->
@foreach(App\Models\Component::where('active', '1')->orderBy('name', 'ASC')->get() as $component)
<li class="{{ $li }}">
    <a class="{{ $a }}" href="{{ url($component->slug) }}">
        {{ $component->name }}
    </a>
</li>
@endforeach
<!-- end looping component -->