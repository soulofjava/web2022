<div>
    <div class="row">
        <div class="col-lg-12 right-item">
            {{Form::open(['url' => '#','method' => 'post', 'files' =>
            'true', '', 'class' =>
            'php-email-form'])}}
            <div class="row">
                <div class="col-lg-6">
                    <div class="form-group">
                        {{Form::text('name', null,['class' => 'form-control',
                        'placeholder' => 'Nama',
                        'required'])}}
                        <span class="alert-error"></span>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        {{Form::text('name', null,['class' => 'form-control',
                        'placeholder' => 'Alamat',
                        'required'])}}
                        <span class="alert-error"></span>
                    </div>
                </div>
            </div>
            <div class="row mt-2">
                <div class="col-lg-6">
                    <div class="form-group">
                        {{Form::email('email', null,['class' => 'form-control',
                        'placeholder' => 'Email',
                        'required'])}}
                        <span class="alert-error"></span>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        {{Form::number('phone', null,['class' => 'form-control',
                        'placeholder' =>
                        'Nomor Handphone',
                        'required'])}}
                        <span class="alert-error"></span>
                    </div>
                </div>
            </div>
            <div class="row mt-2">
                <div class="col-lg-6">
                    <div class="form-group">
                        {{Form::text('name', null,['class' => 'form-control',
                        'placeholder' => 'Pekerjaan',
                        'required'])}}
                        <span class="alert-error"></span>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        {{Form::text('name', null,['class' => 'form-control',
                        'placeholder' => 'Masukkan Nomor Pendaftaran Permintaan Informasi Publik',
                        'required'])}}
                        <span class="alert-error"></span>
                    </div>
                </div>
            </div>
            <div class="row mt-2">
                <div class="col-lg-6">
                    <div class="form-group comments">
                        {{Form::textarea('message', null,['class' => 'form-control',
                        'placeholder' => 'Tujuan Penggunaan Informasi Publik',
                        'required'])}}
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group comments">
                        {{Form::textarea('message', null,['class' => 'form-control',
                        'placeholder' => 'Alasan Pengajuan Keberatan',
                        'required'])}}
                    </div>
                </div>
            </div>
            <div class="row mt-2">
                <div class="col-lg-6">
                    <div class="form-group comments">
                        {{Form::textarea('message', null,['class' => 'form-control',
                        'placeholder' => 'Kasus Polisi (Kronologi Kasus)',
                        'required'])}}
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-sm-12 col-md-12 captcha mb-3 mt-3">
                                <span>{!! captcha_img() !!}</span>
                                <button type="button" class="btn btn-danger" class="reload" id="reload">
                                    &#x21bb;
                                </button>
                            </div>
                            <div class="col-sm-12 col-md-12 mb-3">
                                {{Form::number('captcha', null,['class' =>
                                'form-control',
                                'placeholder' => 'Enter Captcha Result',
                                'required'])}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-2">
                <div class="col-lg-12">
                    <center>
                        <button type="submit" class="btn btn-primary">
                            Kirim Permohonan <i class="fa fa-paper-plane"></i>
                        </button>
                    </center>
                </div>
            </div>
            {{Form::close()}}
        </div>
    </div>
</div>