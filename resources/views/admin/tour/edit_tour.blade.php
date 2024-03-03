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
                    <h4>{{$tour->tour_name}}</h4>
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
                        <div class="card-header p-2">
                            <ul class="nav nav-pills">
                                <li class="nav-item"><a class="nav-link active">Basic Information</a></li>
                                <li class="nav-item"><a class="nav-link" href="{{url('admin/itinerary-builder/'.Request()->id)}}">Itinerary Builder</a></li>
                            </ul>
                        </div>
                        <form method="POST" action="{{ url('admin/edit-tour/'.$tour->id) }}" enctype="multipart/form-data" id="addTour">@csrf
                            <div class="card-body">
                                <div class="row">
                                    <div class="form-group col-md-4">
            	                        <label class="required">Tour Name</label>
            	                        <input type="text" name="tour_name" class="form-control" placeholder="Enter Tour Name" value="{{$tour->tour_name}}" required>
                          	        </div>
                                    <div class="form-group col-md-2">
                                        <label class="required">Destination</label>
                                        <select class="form-control select2bs4" name="dest_id" required>
                                            <option value="" selected>Select One</option>
                                            @foreach(App\Models\Destination::where('status',1)->orderBy('name','ASC')->get() as $row)
                                            <option value="{{$row->id}}" @if($tour->dest_id == $row->id) selected @endif>{{$row->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label class="required">Star Ratings</label>
                                        <select class="form-control select2bs4" name="rating" required>
                                            @for ($i = 1; $i <= 5; $i += 0.5)
                                                <option value="{{$i}}" @if($tour->rating == $i) selected @endif>{{$i}}</option>
                                            @endfor
                                        </select>
                                    </div>
                                    <div class="form-group col-md-4">
            	                      	<label class="required">Cover Image <small>(Size: 600X500px)</small></label>
                                        @if(!empty($tour->image))
                                        <input type="hidden" name="current_image" value="{{ $tour->image }}">
                                        @endif
                                        <input type="file" name="image" class="form-control p-1" id="image" value="{{ $tour->image }}">
                                        <img class="mt-2" style="width: 15%;" src="{{ asset('img/tours/'.$tour->image) }}" alt="">
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label class="required">Tour Type</label>
                                        <select class="form-control select2bs4" name="type" name="type">
                                            <option value="Domestic" @if($tour->type == 'Domestic') selected @endif>Domestic</option>
                                            <option value="International" @if($tour->type == 'International') selected @endif>International</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label class="">Special Tour</label>
                                        <select class="form-control select2" name="special_tour_type[]" multiple data-placeholder="Select one" style="width: 100%;">
                                            <option value="">Select One</option>
                                            @foreach(App\Models\SpecialTour::where('status',1)->get() as $row)
                                            <option value="{{$row->id}}" @if($tour->special_tour_type && in_array($row->id, $tour->special_tour_type)) selected @endif>{{$row->title}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label class="required">Price per perosn (Adult)</label>
                                        <input type="text" name="adult_price" class="form-control" placeholder="Enter Price" value="{{$tour->adult_price}}" required>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label class="">Price per perosn (Child)</label>
                                        <input type="text" name="child_price" class="form-control" placeholder="Enter Price" @if(!empty($tour->child_price)) value="{{$tour->child_price}}" @endif>
                                    </div>
                                    {{-- <div class="form-group col-md-2">
                                        <label class="">From Date</label>
                                        <input type="date" name="from_date" class="form-control" placeholder="Enter Date" @if(!empty($tour->from_date)) value="{{date('Y-m-d', strtotime($tour->from_date))}}" @endif>
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label class="">End Date</label>
                                        <input type="date" name="end_date" class="form-control" placeholder="Enter Date" @if(!empty($tour->end_date)) value="{{date('Y-m-d', strtotime($tour->end_date))}}" @endif>
                                    </div> --}}
                                    <div class="form-group col-md-3">
                                        <label class="required">Day/s</label>
                                        <select class="form-control select2bs4" name="days">
                                            @for($i=1; $i<=30; $i++)
                                            <option value="{{$i}}" @if($tour->days == $i) selected @endif>{{$i}}</option>
                                            @endfor
                                        </select>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label class="required">Night/s</label>
                                        <select class="form-control select2bs4" name="nights">
                                            @for($i=1; $i<=30; $i++)
                                            <option value="{{$i}}" @if($tour->nights == $i) selected @endif>{{$i}}</option>
                                            @endfor
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label class="required">Amenities</label>
                                        <input type="text" name="amenities" class="form-control" placeholder="Enter Amenities" value="{{$tour->amenities}}" required>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label class="">Overview</label>
                                        <textarea name="description" class="form-control" rows="3" placeholder="Enter Overview">{{$tour->description}}</textarea>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label class="">Inclusions</label>
                                        <textarea name="inclusions" class="form-control" rows="3" placeholder="Enter Inclusions">{{$tour->inclusions}}</textarea>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label class="">Exclusions</label>
                                        <textarea name="exclusions" class="form-control" rows="3" placeholder="Enter Exclusions">{{$tour->exclusions}}</textarea>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label class="">Note</label>
                                        <textarea name="note" class="form-control" rows="3" placeholder="Enter Note">@if(!empty($tour->note)) {{$tour->note}} @endif</textarea>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" id="isPopular" name="is_popular" value="1" @if($tour->is_popular == 1) checked @endif >
                                            <label class="form-check-label" for="isPopular">Popular Tour Package</label>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" id="isCustom" name="custom_tour" value="1" @if($tour->custom_tour == 1) checked @endif >
                                            <label class="form-check-label" for="isCustom">Custom Tour</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer ">
                                <button type="submit" class="btn btn-warning text-white submit"><i class="fa fa-check-circle"></i> Update </button>
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
            rules: {
                tour_name: {
                    required: true,
                    maxlength:120,
                },
                adult_price: {
                    required: true,
                    number:true,
                },
                child_price: {
                    required: false,
                    number:true,
                },
                image: {
                    accept: 'png|jpg|jpeg|webp',
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