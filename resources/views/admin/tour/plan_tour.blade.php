@extends('layouts/adminLayout/admin_design')
@section('content')

@section('styles')
<link rel="stylesheet" href="{{asset('backend_plugins/select2/css/select2.min.css')}}">
<link rel="stylesheet" href="{{asset('backend_plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
@endsection('styles')

<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <h4>Create Custom Tour</h4>
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
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{url('/admin/dashboard')}}">Home</a></li>
                        <li class="breadcrumb-item active">Tour Section</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-default">
                        <form method="POST" action="{{ url('admin/plan-tour') }}" enctype="multipart/form-data" id="addTour">@csrf
                            <div class="card-body">
                                <div class="row">
                                    <div class="form-group col-md-3">
                                        <label class="">Customer Name</label>
                                        <input type="text" name="customer_name" class="form-control" placeholder="Enter Customer Name" value="{{Request()->name}}">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label class="required">Tour</label>
                                        <select class="form-control select2bs4" name="tour_id" required>
                                            <option value="" selected>Select One</option>
                                            @foreach(App\Models\Tour::select('id','tour_name','days','nights')->orderBy('custom_tour','DESC')->orderBy('tour_name','ASC')->get() as $row)
                                            <option value="{{$row->id}}" @if(Request()->tour_id == $row->id) selected @endif>{{$row->tour_name}} | {{$row->nights}}N/{{$row->days}}D</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label class="required">Tourist Count</label>
                                        <input type="number" min="1" name="tourist_count" class="form-control" placeholder="Enter Count" value="{{Request()->tourist_count}}" required>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-3">
                                        <label class="">Start Date</label>
                                        <input type="date" name="from_date" id="from_date" class="form-control" placeholder="Enter Date" value="{{Request()->from_date}}">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label class="">End Date</label>
                                        <input type="date" name="end_date" class="form-control" placeholder="Enter Date" value="{{Request()->end_date}}">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label class="">Status</label>
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" id="status" name="status" value="1">
                                            <label class="form-check-label" for="isPopular">Final</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer ">
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
<script src="{{asset('backend_plugins/select2/js/select2.full.min.js')}}"></script>
<script>
    $(function () {
        $('.select2').select2()
    });
</script>
@endsection('scripts')
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
        $('#addTour').validate({
            ignore: [],
            debug: false,
            rules: {
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
@endsection