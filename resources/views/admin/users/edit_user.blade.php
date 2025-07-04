@extends('layouts/adminLayout/admin_design')
@section('content')

<div class="content-wrapper">
    <section class="content-header pb-0">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <h4>Update User</h4>
                </div>
            </div>
            @if(Session::has('flash_message_error'))
            <div class="alert alert-error alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>{!! session('flash_message_error') !!}</strong>
            </div>
            @endif
            @if(Session::has('flash_message_success'))
            <div class="alert alert-success alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>{!! session('flash_message_success') !!}</strong>
            </div>
            @endif
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-default">
                        <form method="POST" action="{{ url('admin/edit-user/'.$user->id) }}" enctype="multipart/form-data" id="addUser">@csrf
                            <div class="card-body">
                                <div class="row">
                                    <div class="form-group col-md-3">
                                        <label class="required">Customer Name</label>
                                        <input type="text" name="name" class="form-control" placeholder="Enter name" required value="{{$user->name}}">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label>Email</label>
                                        <input type="email" name="email" class="form-control" placeholder="Enter email" value="{{$user->email}}">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label class="">Primary Contact No.</label>
                                        <input type="number" name="contact" minlength="10" maxlength="10" id="contact" class="form-control" placeholder="Enter mobile number" value="{{$user->contact}}">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label class="">Secondary Contact No.</label>
                                        <input type="number" name="contact_alt" minlength="10" maxlength="10" id="contact_alt" class="form-control" placeholder="Enter secondary mobile number" value="{{$user->contact_alt}}">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label>Address</label>
                                        <textarea name="address" id="address" class="form-control" rows="1" placeholder="Enter address">{{$user->address}}</textarea>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label class="">GST No.</label>
                                        <input type="text" name="gst_no" minlength="15" maxlength="15" id="gst_no" class="form-control" placeholder="Enter mobile number" value="{{$user->gst_no}}">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label class="">GST Address</label>
                                        <input type="text" name="gst_address" id="gst_address" class="form-control" placeholder="Enter GST address" value="{{$user->gst_address}}">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label class="">PAN Card No. & File</label>
                                        <div class="input-group mb-1">
                                            <div class="input-group-prepend mr-1">
                                                <input type="text" name="pan_no" class="form-control p-1" placeholder="Enter PAN no." value="{{$user->pan_no}}">
                                            </div>
                                            <input type="file" name="pan_card_file" class="form-control p-1">
                                            @if(!empty($user->pan_card_file))
                                            <input type="hidden" name="current_pan_file" value="{{ $user->pan_card_file }}">
                                            @endif
                                        </div>
                                        @if(!empty($user->pan_card_file))
                                        <a href="{{ asset('img/user/'.$user->pan_card_file) }}" download target="_blank">{{$user->pan_card_file }}</a>
                                        @endif
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label class="">Aadhar Card No. & File</label>
                                        <div class="input-group mb-1">
                                            <div class="input-group-prepend mr-1">
                                                <input type="text" name="aadhar_no" class="form-control p-1" placeholder="Enter Aadhar no." value="{{$user->aadhar_no}}">
                                            </div>
                                            <input type="file" name="aadhar_card_file" class="form-control p-1">
                                            @if(!empty($user->aadhar_card_file))
                                            <input type="hidden" name="current_aadhar_file" value="{{ $user->aadhar_card_file }}">
                                            @endif
                                        </div>
                                        @if(!empty($user->aadhar_card_file))
                                        <a href="{{ asset('img/user/'.$user->aadhar_card_file) }}" download target="_blank">{{$user->aadhar_card_file }}</a>
                                        @endif
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label class="">Passport No. & File</label>
                                        <div class="input-group mb-1">
                                            <div class="input-group-prepend mr-1">
                                                <input type="text" name="passport_no" class="form-control p-1" placeholder="Enter Passport no." value="{{$user->passport_no}}">
                                            </div>
                                            <input type="file" name="passport_file" class="form-control p-1">
                                            @if(!empty($user->passport_file))
                                            <input type="hidden" name="current_passport_file" value="{{ $user->passport_file }}"> 
                                            @endif
                                        </div>
                                        @if(!empty($user->passport_file))
                                        <a href="{{ asset('img/user/'.$user->passport_file) }}" download target="_blank">{{$user->passport_file }}</a>
                                        @endif
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label class="">Passport Expiry Date</label>
                                        <input type="date" name="passport_expiry" id="passport_expiry" class="form-control" value="{{ $user->passport_expiry ? date('Y-m-d', strtotime($user->passport_expiry)) : null }}" />
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label class="">Birth Date</label>
                                        <input type="date" name="dob" id="dob" class="form-control" value="{{ $user->dob ? date('Y-m-d', strtotime($user->dob)) : null }}" />
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label class="">Anniversary Date</label>
                                        <input type="date" name="anniversary_date" id="anniversary_date" class="form-control" value="{{ $user->anniversary_date ? date('Y-m-d', strtotime($user->anniversary_date)) : null }}" />
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label class="">Visa Type</label>
                                        <select class="form-control select2bs4" name="visa_type">
                                            <option value="">Select One</option>
                                            <option value="tourist" @if($user->visa_type == 'tourist') selected @endif>Tourist Visa (B-2 / C-1)</option>
                                            <option value="business" @if($user->visa_type == 'business') selected @endif>Business Visa (B-1)</option>
                                            <option value="student" @if($user->visa_type == 'student') selected @endif>Student Visa (F-1 / M-1)</option>
                                            <option value="work_h1b" @if($user->visa_type == 'work_h1b') selected @endif>Work Visa (e.g., H-1B, L-1, O-1)</option>
                                            <option value="exchange" @if($user->visa_type == 'exchange') selected @endif>Exchange Visitor Visa (J-1)</option>
                                            <option value="family_immigrant" @if($user->visa_type == 'family_immigrant') selected @endif>Family Immigrant Visa (IR / F Category)</option>
                                            <option value="employment_immigrant" @if($user->visa_type == 'employment_immigrant') selected @endif>Employment Immigrant Visa (EB Category)</option>
                                            <option value="diplomatic" @if($user->visa_type == 'diplomatic') selected @endif>Diplomatic/Official Visa (A / G / NATO)</option>
                                            <option value="transit" @if($user->visa_type == 'transit') selected @endif>Transit Visa (C-1 / TWOV)</option>
                                            <option value="media" @if($user->visa_type == 'media') selected @endif>Media Visa (I)</option>
                                            <option value="crew" @if($user->visa_type == 'crew') selected @endif>Crewmember Visa (D)</option>
                                            <option value="investor" @if($user->visa_type == 'investor') selected @endif>Investor Visa (E-2)</option>
                                            <option value="other" @if($user->visa_type == 'other') selected @endif>Other / Not Listed</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label class="">Visa Expiry</label>
                                        <input type="date" name="visa_expiry" id="visa_expiry" class="form-control" value="{{ $user->visa_expiry ? date('Y-m-d', strtotime($user->visa_expiry)) : null }}" />
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer ">
                                <button type="submit" class="btn btn-dark submit"><i class="fa fa-check-circle"></i> Update </button>
                                <button type="reset" class="btn btn-default"> Reset </button>
                                <a href="{{url('admin/registered-users')}}" class="btn btn-default"> Cancel </a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<script src="{{ asset('backend_plugins/jquery/jquery.min.js') }}"></script>
@section('scripts')
<script>
    $(function () {
        $('.select2').select2()
    });
</script>
@endsection('scripts')
<script>
    $(document).ready(function() {
        $('#addUser').validate({
            ignore: [],
            debug: false,
            rules: {
                name: {
                    required: true,
                },
            },
            messages: {},
            submitHandler: function(form) {
                $(".submit").attr("disabled", true);
                $(".submit").html("<span class='fa fa-spinner fa-spin'></span> Please wait...");
                form.submit();
            }
        });
    });
</script>
@endsection