@extends('layouts/adminLayout/admin_design')
@section('content')

@section('styles')
    <link rel="stylesheet" href="{{asset('backend_plugins/select2/css/select2.min.css')}}">
    <link rel="stylesheet" href="{{asset('backend_plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">

    <link rel="stylesheet" href="{{asset('backend_css/sumoselect.css')}}">
    <style>
        .SumoSelect>.CaptionCont>span.placeholder {
            color: #495057 !important;
        }
    </style>
@endsection('styles')

<div class="content-wrapper">
    <section class="content-header pb-0">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <h4>New Enquiry</h4>
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
                        <form method="POST" action="{{ url('admin/new-enquiry') }}" enctype="multipart/form-data" id="tourEnq">@csrf
                            <div class="card-body">
                                <div class="row">
                                    <div class="form-group col-md-4">
                                        @php
                                            $users = App\Models\User::select('id', 'name', 'contact', 'email')->orderBy('name','ASC')->get();
                                        @endphp
                                        <label class="">Customer Name <span class="text-danger">*</span> <a href="{{ url('admin/add-user') }}" target="_blank">Create New User</a></label>
                                        <select class="form-control select2" id="user_id" name="name" required>
                                            <option value="" selected>Select One</option>
                                            @foreach($users as $user)
                                            <option value="{{$user->id}}" @if(Request()->user_id == $user->id) selected @endif>{{$user->name}}</option>
                                            @endforeach
                                        </select>
                                        <a href="#" id="updateUser" class="mt-1" style="display:none;" target="_blank">Update User</a>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label class="">Customer Contact No.</label>
                                        <input type="text" name="contact" id="contact" readonly disabled class="form-control" placeholder="Enter phone">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label class="">Customer Email</label>
                                        <input type="email" name="email" id="email" readonly disabled class="form-control" placeholder="Enter email">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label class="">Tour</label>
                                        <select class="form-control select2" name="tour_id" >
                                            <option value="" selected>Select One</option>
                                            @foreach(App\Models\Tour::select('id','tour_name','days','nights')->orderBy('custom_tour','DESC')->orderBy('tour_name','ASC')->get() as $row)
                                            <option value="{{$row->id}}" @if(Request()->tour_id == $row->id) selected @endif>{{$row->tour_name}} | {{$row->nights}}N/{{$row->days}}D</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label class="">Services</label>
                                        @php
                                            $options = [
                                                'Tour Booking', 'Hotel Booking', 'Bus Booking', 'Flight Booking', 
                                                'Train Booking', 'Cab Booking', 'Cruise Booking', 
                                                'Visa Service', 'Passport Service'
                                            ];
                                        @endphp
                                        <select name="services[]" class="form-control sumoselect" multiple>
                                            @foreach($options as $option)
                                            <option value="{{ $option }}">{{ $option }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label class="">Tourist Count</label>
                                        <input type="number" min="1" name="tourist_no" class="form-control" placeholder="Enter count" >
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label class="">Current City</label>
                                        <input type="text" name="current_city" class="form-control" placeholder="Enter city" >
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label class="">From Date</label>
                                        <input type="date" name="from_date" id="from_date" class="form-control" placeholder="Enter Date">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label class="">To Date</label>
                                        <input type="date" name="end_date" class="form-control" placeholder="Enter Date">
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label class="">Message</label>
                                        <textarea name="message" class="form-control" placeholder="Enter message" rows="3" ></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer ">
                                <button type="submit" class="btn btn-dark submit"><i class="fa fa-check-circle"></i> Create </button>
                                <button type="reset" class="btn btn-default"> Reset </button>
                                <button class="btn btn-default" data-dismiss="modal" aria-label="Close"> Cancel </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<!-- <script src="{{ asset('backend_plugins/jquery/jquery.min.js') }}"></script> -->
@section('scripts')
<script src="{{asset('backend_js/jquery.sumoselect.js')}}"></script>
<script src="{{asset('backend_plugins/select2/js/select2.full.min.js')}}"></script>
<script>
    $(function () {
        $('.select2').select2()
    });
</script>

<script>
    $(document).ready(function() {
        $.validator.addMethod("greaterThan", function (value, element, params) {
            var from_date_value = $(params).val();
            var end_date_value = value;

            if (from_date_value && end_date_value) {
                from_date_value = new Date(from_date_value);
                end_date_value = new Date(end_date_value);

                return end_date_value > from_date_value;
            }

            return true;
        }, "End Date must be greater than From Date.");
        $('#tourEnq').validate({
            ignore: [],
            debug: false,
            rules: {
                contact: {
                    required: false,
                    minlength: 10,
                    maxlength: 10
                },
                from_date: {
                    required: false,
                },
                end_date: {
                    required: false,
                    greaterThan: "#from_date" // Custom rule for greater than from_date
                }
            },
            messages: {
                from_date: {
                    required: "Please select a From Date."
                },
                end_date: {
                    required: "Please select an End Date.",
                    greaterThan: "End Date must be greater than From Date."
                }
            },
            submitHandler: function(form) {
                $(".submit").attr("disabled", true);
                $(".submit").html("<span class='fa fa-spinner fa-spin'></span> Please wait...");
                form.submit();
            }
        });
    });
</script>

<script>
    $((function(){
        window.asd=$(".SlectBox").SumoSelect({csvDispCount:3,selectAll:!0,captionFormatAllSelected:"Yeah, OK, so everything."}),window.Search=$(".search-box").SumoSelect({csvDispCount:3,search:!0,searchText:"Enter here."}),window.sb=$(".SlectBox-grp-src").SumoSelect({csvDispCount:3,search:!0,searchText:"Enter here.",selectAll:!0}),$(".sumoselect").SumoSelect({placeholder: 'Select'}),$(".selectsum1").SumoSelect({okCancelInMulti:!0,selectAll:!0}),$(".selectsum2").SumoSelect({selectAll:!0})}));
</script>

<script>
    $(document).ready(function () {
        const userData = @json($users->keyBy('id'));

        const $userSelect = $('#user_id');
        const $contactInput = $('#contact');
        const $emailInput = $('#email');
        const $updateLink = $('#updateUser');

        function updateFieldsAndLink(userId) {
            const user = userData[userId];

            if (user) {
                $contactInput.val(user.contact ?? '');
                $emailInput.val(user.email ?? '');
                $updateLink.attr('href', `/admin/edit-user/${userId}`).show();
            } else {
                $contactInput.val('');
                $emailInput.val('');
                $updateLink.hide();
            }
        }

        // On change
        $userSelect.on('change', function () {
            updateFieldsAndLink($(this).val());
        });

        // On page load (if already selected)
        if ($userSelect.val()) {
            updateFieldsAndLink($userSelect.val());
        } else {
            $updateLink.hide(); // Hide link by default
        }
    });
</script>
@endsection('scripts')

@endsection