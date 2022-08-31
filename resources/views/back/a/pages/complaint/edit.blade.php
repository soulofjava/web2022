@extends('back.a.layouts.app')
@section('content')
<div class="content">
    <div class="container-fluid">
        {{ Breadcrumbs::render('complaint') }}
        <div class="row">
            <div class="card">
                <div class="card-header card-header-icon" data-background-color="green">
                    <i class="material-icons">date_range</i>
                </div>
                <div class="card-content">
                    <h4 class="card-title">Form Edit Public Complaints</h4>
                    <!-- <div class="col-sm-8 col-sm-offset-2"> -->
                    <!--      Wizard container        -->
                    <div class="wizard-container">
                        <div class="card wizard-card" data-color="green" id="wizardProfile">
                            {{Form::model($data, ['route' => ['complaint.update', $data->id],'method' => 'put', 'files'
                            =>
                            'true', ''])}}
                            <!--        You can switch " data-color="purple" "  with one of the next bright colors: "green", "orange", "red", "blue"       -->
                            <div class="wizard-header">
                                <h3 class="wizard-title">
                                    Build Your Profile
                                </h3>
                                <h5>This information will let us know more about you.</h5>
                            </div>
                            <div class="wizard-navigation">
                                <ul>
                                    <li>
                                        <a href="#about" data-toggle="tab">About</a>
                                    </li>
                                    <li>
                                        <a href="#account" data-toggle="tab">Account</a>
                                    </li>
                                    <li>
                                        <a href="#address" data-toggle="tab">Address</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="tab-content">
                                <div class="tab-pane" id="about">
                                    <div class="row">
                                        <div class="col-sm-4 col-sm-offset-1">
                                            <div class="col text-center">
                                                <!-- <legend>Regular Image</legend> -->
                                                <div class="fileinput fileinput-new text-center"
                                                    data-provides="fileinput">
                                                    <div class="fileinput-new thumbnail">
                                                        @if($data->attachment)
                                                        <img src="{{ asset('storage') }}/{{ $data->attachment }}"
                                                            alt="...">
                                                        @else
                                                        <img src="{{ asset('assets/back/assets/img/image_placeholder.jpg') }}"
                                                            alt="thumbnail">
                                                        @endif
                                                    </div>
                                                    <div class="fileinput-preview fileinput-exists thumbnail"></div>
                                                    <div>
                                                        <span class="btn btn-success btn-round btn-file">
                                                            <span class="fileinput-new">Select image</span>
                                                            <span class="fileinput-exists">Change</span>
                                                            <!-- <input type="file" name="photo" /> -->
                                                            {{Form::file('attachment', null,['class' =>
                                                            'form-control'])}}
                                                        </span>
                                                        <a href="#pablo"
                                                            class="btn btn-danger btn-round fileinput-exists"
                                                            data-dismiss="fileinput"><i class="fa fa-times"></i>
                                                            Remove</a>
                                                    </div>
                                                    @if ($errors->any())
                                                    <div class="alert alert-danger">
                                                        <ul>
                                                            @foreach ($errors->all() as $error)
                                                            <li>{{ $error }}</li>
                                                            @endforeach
                                                        </ul>
                                                    </div>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label class="control-label">Report Date</label>
                                                {{Form::text('date', null,['class' => 'form-control datepicker'])}}
                                            </div>
                                            <div class="form-group label-floating">
                                                <label class="control-label">Reporter's Name</label>
                                                {{Form::text('name', null,['class' => 'form-control'])}}
                                            </div>
                                            <div class="form-group label-floating">
                                                <label class="control-label">Reporter's Phone Number</label>
                                                {{Form::text('phone', null,['class' => 'form-control'])}}
                                            </div>
                                            <div class="form-group label-floating">
                                                <label class="control-label">Location</label>
                                                {{Form::text('location', null,['class' => 'form-control'])}}
                                            </div>
                                            <div class="form-group label-floating">
                                                <label class="control-label">Report Description</label>
                                                {{Form::text('description', null,['class' => 'form-control'])}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="account">
                                    <!-- <h4 class="info-text"> What are you doing? (checkboxes) </h4> -->
                                    <div class="row">
                                        <div class="col-lg-10 col-lg-offset-1">
                                            <div class="form-group">
                                                <label class="control-label">Bidang</label>
                                                <select name="language" id="language" class="form-control">
                                                    <option disabled="" selected=""> Select Bidang </option>
                                                    @forelse ($languages as $language)
                                                    <option value="{{ $language->id }}">{{ $language->name }} </option>
                                                    @empty
                                                    @endforelse
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label"> Select Sub Koor</label>
                                                <select class="form-control" name="framework" id="framework">
                                                    <option> Select Bidang First</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="address">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <h4 class="info-text"> Are you living in a nice area? </h4>
                                        </div>
                                        <div class="col-sm-7 col-sm-offset-1">
                                            <div class="form-group label-floating">
                                                <label class="control-label">Street Name</label>
                                                <input type="text" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-group label-floating">
                                                <label class="control-label">Street No.</label>
                                                <input type="text" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-sm-5 col-sm-offset-1">
                                            <div class="form-group label-floating">
                                                <label class="control-label">City</label>
                                                <input type="text" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-sm-5">
                                            <div class="form-group label-floating">
                                                <label class="control-label">Country</label>
                                                <select name="country" class="form-control">
                                                    <option disabled="" selected=""></option>
                                                    <option value="Afghanistan"> Afghanistan </option>
                                                    <option value="Albania"> Albania </option>
                                                    <option value="Algeria"> Algeria </option>
                                                    <option value="American Samoa"> American Samoa </option>
                                                    <option value="Andorra"> Andorra </option>
                                                    <option value="Angola"> Angola </option>
                                                    <option value="Anguilla"> Anguilla </option>
                                                    <option value="Antarctica"> Antarctica </option>
                                                    <option value="...">...</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="wizard-footer">
                                <div class="pull-right">
                                    <a href="{{ route('complaint.index') }}" class="btn btn-fill btn-fill">Cancel</a>
                                    <!-- <button type="submit" class="btn btn-success btn-fill">Update</button> -->
                                    <input type='button' class='btn btn-next btn-fill btn-success btn-wd' name='next'
                                        value='Next' />
                                    <input type='button' class='btn btn-finish btn-fill btn-rose btn-wd' name='finish'
                                        value='Finish' />
                                </div>
                                <div class="pull-left">
                                    <input type='button' class='btn btn-previous btn-info btn-default btn-wd'
                                        name='previous' value='Previous' />
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            {{Form::close()}}
                        </div>
                    </div>
                    <!-- wizard container -->
                    <!-- </div> -->
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
        $("#language").change(function () {
            $.ajaxSetup({
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
                },
            });
            const langId = $(this).val();
            var url = "{{ route('frameworks') }}";
            $.ajax({
                type: "POST",
                url: url,
                data: {
                    languageId: langId,
                },
                success: function (result) {
                    $("#framework").empty();
                    // $("#framework").append(
                    //     '<option selected disabled value="">Select</option>'
                    // );

                    if (result && result?.status === "success") {
                        result?.data?.map((framework) => {
                            const frameworks = `<option value='${framework?.id}'> ${framework?.name} </option>`;
                            $("#framework").append(frameworks);
                        });
                    }
                },
                error: function (result) {
                    console.log("error", result);
                },
            });
        });
    });
</script>
@endpush