<!DOCTYPE html>
<html lang="en">

<head>
    @include('front.includes.meta')
    @stack('before-style')
    @include('front.includes.style')
    @stack('after-style')
    @vite([])
</head>

<body>
    <a href="#" id="websitename" hidden>{{ $data_website->web_name }}</a>
    @include('sweetalert::alert')
    @include('front.includes.header')
    @yield('content')
    @include('front.includes.footer')
    @stack('before-script')
    @include('front.includes.script')
    @include('components.responsive-voice')
    @stack('after-script')
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Pencarian Global</h1>
                </div>
                <div class="modal-body">
                    {{Form::open(['route' => 'global.search','method' => 'get', ''])}}
                    {{Form::text('kolomcari', null,['class' => 'form-control mb-3 text-center',
                    'placeholder' => 'Kata Pencarian','id'=>'textareaID1'])}}
                    <button type="submit" class="btn w-100 btn-warning mt-1">Cari Data <i
                            class="bi bi-search"></i></button>
                    {{Form::close()}}
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>
</body>

</html>