@extends('back.a.layouts.app')
@section('content')
<div class="content">
    <div class="container-fluid">
        {{ Breadcrumbs::render('surveilans_malaria') }}
        <div class="row">
            <div class="card">
                <div class="card-header card-header-icon" data-background-color="green">
                    <i class="material-icons">book</i>
                </div>
                <div class="card-content">
                    <h4 class="card-title">Form Edit Data</h4>
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    {{Form::model($data, ['route' => ['surveilans_malaria.update', $data->id],'method' => 'put', 'files'
                    =>
                    'true',
                    ''])}}
                    <div class="form-group label-floating">
                        <label class="control-label">NIK</label>
                        {{Form::number('nik', null,['class' => 'form-control'])}}
                    </div>
                    <div class="form-group label-floating">
                        <label class="control-label">Nama</label>
                        {{Form::text('nama', null,['class' => 'form-control'])}}
                    </div>
                    <div class="form-group">
                        <label class="control-label">Tanggal Lahir</label>
                        {{Form::text('tanggal_lahir', null,['class' => 'form-control datepicker'])}}
                    </div>
                    <div class="form-group label-floating">
                        <label class="control-label">Alamat (Sekarang)</label>
                        {{Form::text('alamat', null,['class' => 'form-control'])}}
                    </div>
                    <div class="form-group label-floating">
                        <label class="control-label">Nomor Handphone</label>
                        {{Form::number('no_hp', null,['class' => 'form-control'])}}
                    </div>
                    <div class="form-group">
                        <label class="control-label">Jenis Kelamin</label>
                        {{Form::select('jenis_kelamin', get_code_group('JENIS_KELAMIN'), null, ['class' =>
                        'form-control', 'placeholder' => 'Pilih Jenis Kelamin'])}}
                    </div>
                    <hr>
                    <h5 class="text-center">Daerah Yang Dikunjungi</h5>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                {{Form::select('region_prop', get_prov(), $data->region_prop, ['class' => 'form-control
                                select2',
                                'placeholder' => 'Pilih Provinsi', 'id' => 'provinsi'])}}
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                {{Form::select('region_kab', $kab, null, ['class' => 'form-control
                                select2',
                                'placeholder' =>
                                'Pilih Kabupaten','id' => 'kabupaten'])}}
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                {{Form::select('region_kec', $kec, null, ['class' => 'form-control select2',
                                'placeholder' =>
                                'Pilih Kecamatan', 'id' => 'kecamatan'])}}
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                {{Form::select('region_kel', $kel, null, ['class' => 'form-control select2',
                                'placeholder' =>
                                'Pilih Kelurahan', 'id' => 'kelurahan'])}}
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="form-group">
                        <label class="control-label">Tanggal Datang (di Kabupaten Wonosobo)</label>
                        {{Form::text('tgl_kembali', null,['class' => 'form-control datepicker'])}}
                    </div>

                    <div class="d-flex text-right">
                        <a href="{{ route('surveilans_malaria.index') }}" class="btn btn-default btn-fill">Cancel</a>
                        <button type="submit" class="btn btn-success btn-fill">Insert</button>
                    </div>
                    {{Form::close()}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('after-script')
<script type="text/javascript">
    $(document).ready(function () {
        demo.initFormExtendedDatetimepickers();
    });
</script>
<script>
    $('#provinsi').change(function () {
        var kabupaten = $(this).val();
        $.ajax({
            type: "GET",
            url: "{{ route('kabupaten') }}?kabupaten=" + kabupaten,
            success: function (res) {
                $("#kabupaten").empty();
                $("#kabupaten").append('<option value="">Pilih Kabupaten</option>');
                $.each(res, function (key, value) {
                    $("#kabupaten").append('<option value="' + key + '">' + value +
                        '</option>');
                });
            }
        });
    });
    $('#kabupaten').change(function () {
        var kecamatan = $(this).val();
        $.ajax({
            type: "GET",
            url: "{{ route('kecamatan') }}?kecamatan=" + kecamatan,
            success: function (res) {
                $("#kecamatan").empty();
                $("#kecamatan").append('<option value="">Pilih Kecamatan</option>');
                $.each(res, function (key, value) {
                    $("#kecamatan").append('<option value="' + key + '">' + value +
                        '</option>');
                });
            }
        });
    });
    $('#kecamatan').change(function () {
        var kelurahan = $(this).val();
        $.ajax({
            type: "GET",
            url: "{{ route('kelurahan') }}?kelurahan=" + kelurahan,
            success: function (res) {
                $("#kelurahan").empty();
                $("#kelurahan").append('<option value="">Pilih Kelurahan</option>');
                $.each(res, function (key, value) {
                    $("#kelurahan").append('<option value="' + key + '">' + value +
                        '</option>');
                });
            }
        });
    });

</script>
@endpush