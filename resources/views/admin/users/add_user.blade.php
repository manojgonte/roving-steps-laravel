@extends('layouts/adminLayout/admin_design')
@section('content')

@section('styles')
{{-- <link rel="stylesheet" href="{{asset('backend_plugins/select2/css/select2.min.css')}}"> --}}
{{-- <link rel="stylesheet" href="{{asset('backend_plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}"> --}}
@endsection('styles')

<div class="content-wrapper">
    <section class="content-header pb-0">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <h4>New User</h4>
                    @if(Session::has('flash_message_error'))
                    <div class="alert alert-danger alert-block">
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
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-default">
                        <form method="POST" action="{{ url('admin/add-user') }}" enctype="multipart/form-data" id="addUser">@csrf
                            <div class="card-body">
                                <div class="row">
                                    <div class="form-group col-md-3">
                                        <label class="required">Customer Name</label>
                                        <input type="text" name="name" class="form-control" placeholder="Enter name" required>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label class="required">Email</label>
                                        <input type="email" name="email" class="form-control" placeholder="Enter email" required>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label class="required">Primary Contact No.</label>
                                        <input type="number" name="contact" minlength="10" maxlength="10" id="contact" class="form-control" placeholder="Enter mobile number" required>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label class="">Secondary Contact No.</label>
                                        <input type="number" name="contact_alt" minlength="10" maxlength="10" id="contact_alt" class="form-control" placeholder="Enter secondary mobile number">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label>Address</label>
                                        <textarea name="address" id="address" class="form-control" rows="1" placeholder="Enter address"></textarea>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label class="">GST No.</label>
                                        <input type="text" name="gst_no" minlength="15" maxlength="15" id="gst_no" class="form-control" placeholder="Enter mobile number">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label class="">GST Address</label>
                                        <input type="text" name="gst_address" id="gst_address" class="form-control" placeholder="Enter GST address">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label class="">PAN Card No. & File</label>
                                        <div class="input-group mb-1">
                                            <div class="input-group-prepend mr-1">
                                                <input type="text" name="pan_no" class="form-control p-1" placeholder="Enter PAN no.">
                                            </div>
                                            <input type="file" name="pan_card_file" class="form-control p-1">
                                        </div>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label class="">Aadhar Card No. & File</label>
                                        <div class="input-group mb-1">
                                            <div class="input-group-prepend mr-1">
                                                <input type="text" name="aadhar_no" class="form-control p-1" placeholder="Enter Aadhar no.">
                                            </div>
                                            <input type="file" name="aadhar_card_file" class="form-control p-1">
                                        </div>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label class="">Passport No. & File</label>
                                        <div class="input-group mb-1">
                                            <div class="input-group-prepend mr-1">
                                                <input type="text" name="passport_no" class="form-control p-1" placeholder="Enter Passport no.">
                                            </div>
                                            <input type="file" name="passport_file" class="form-control p-1">
                                        </div>
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label class="">Passport Expiry Date</label>
                                        <input type="date" name="passport_expiry" id="passport_expiry" class="form-control" />
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label class="">Birth Date</label>
                                        <input type="date" name="dob" id="dob" class="form-control" />
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label class="">Anniversary Date</label>
                                        <input type="date" name="anniversary_date" id="anniversary_date" class="form-control" />
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label>Visa Type</label>
                                        <select class="form-control select2bs4" name="visa_type">
                                            <option value="">Select One</option>
                                            <option value="tourist">Tourist Visa (B-2 / C-1)</option>
                                            <option value="business">Business Visa (B-1)</option>
                                            <option value="student">Student Visa (F-1 / M-1)</option>
                                            <option value="work_h1b">Work Visa (e.g., H-1B, L-1, O-1)</option>
                                            <option value="exchange">Exchange Visitor Visa (J-1)</option>
                                            <option value="family_immigrant">Family Immigrant Visa (IR / F Category)</option>
                                            <option value="employment_immigrant">Employment Immigrant Visa (EB Category)</option>
                                            <option value="diplomatic">Diplomatic/Official Visa (A / G / NATO)</option>
                                            <option value="transit">Transit Visa (C-1 / TWOV)</option>
                                            <option value="media">Media Visa (I)</option>
                                            <option value="crew">Crewmember Visa (D)</option>
                                            <option value="investor">Investor Visa (E-2)</option>
                                            <option value="other">Other / Not Listed</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label class="">Visa Expiry</label>
                                        <input type="date" name="visa_expiry" id="visa_expiry" class="form-control" />
                                    </div>
                                    {{-- <div class="form-group col-md-3">
                                        <label class="">Status</label>
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" id="status" name="status" value="1">
                                            <label class="form-check-label" for="isPopular">Enable to Login</label>
                                        </div>
                                    </div> --}}
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-dark submit"><i class="fa fa-check-circle"></i> Create </button>
                                <button type="reset" class="btn btn-default"> Reset </button>
                                <a href="{{url('admin/tours')}}" class="btn btn-default"> Cancel </a>
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
{{-- <script src="{{asset('backend_plugins/select2/js/select2.full.min.js')}}"></script> --}}
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