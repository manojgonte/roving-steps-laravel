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
                    <h4>Plan Tour Section</h4>
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
                        <form method="POST" action="{{ url('admin/edit-plan-tour/'.$tour->id) }}" enctype="multipart/form-data" id="addTour">@csrf
                            <div class="card-body">
                                <div class="row">
                                    <div class="form-group col-md-3">
                                        <label class="required">Customer Name</label>
                                        <input type="text" name="customer_name" class="form-control" placeholder="Enter Customer Name" required>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label class="required">Tour</label>
                                        <select class="form-control select2bs4" name="tour_id" required>
                                            <option value="" selected>Select One</option>
                                            @foreach(App\Models\Tour::orderBy('tour_name','ASC')->get() as $row)
                                            <option value="{{$row->id}}" @if($row->id === $tour->tour_id) selected @endif>{{$row->tour_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label class="required">Tourist Count</label>
                                        <input type="number" min="1" name="tourist_count" class="form-control" placeholder="Enter Count" value="{{$tour->tourist_count}}" required>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-3">
                                        <label class="required">From Date</label>
                                        <input type="date" name="from_date" class="form-control" placeholder="Enter Date" value="{{$tour->from_date}}" required>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label class="required">End Date</label>
                                        <input type="date" name="end_date" class="form-control" placeholder="Enter Date" value="{{$tour->end_date}}" required>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label class="required">Status</label>
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" id="status" name="status" value="1" @if($tour->status == 1) checked @endif>
                                            <label class="form-check-label" for="isPopular">Final</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer ">
                                <button type="submit" class="btn btn-dark submit"><i class="fa fa-check-circle"></i> Update </button>
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
        $('#addTour').validate({
            ignore: [],
            debug: false,
            rules: {},
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