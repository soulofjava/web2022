<!-- start looping component -->
@foreach(App\Models\Component::where('active', '1')->orderBy('name', 'ASC')->get() as $component)
@if($component->slug != 'seputar-wonosobo' and $component->slug != 'complaints')
<li class="{{ $li }}">
    <a class="{{ $a }}" href="{{ url($component->slug) }}">
        {{ $component->name }}
    </a>
</li>
@endif
@if($component->slug == 'complaints')
<li class="{{ $li }}">
    <a class="{{ $a }}" href="#"><span>{{ $component->name }}</span> <i class="{{ $i }}"></i></a>
    <ul class="{{ $ul }}">
        <li><a href="https://laporbupati.wonosobokab.go.id/" target="_blank">LaporBup</a></li>
        <li><a href="tel:112" target="_blank">Call Center 112</a></li>
    </ul>
</li>
@endif
@endforeach
<!-- end looping component -->