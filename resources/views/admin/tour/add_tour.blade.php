@extends('layouts/adminLayout/admin_design')
@section('content')

<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <h4>Tour Planner Section</h4>
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
                                <li class="nav-item"><a class="nav-link active" href="{{url('admin/add-tour')}}">Basic Information</a></li>
                                <li class="nav-item"><a class="nav-link disabled" disabled>Itinerary Builder</a></li>
                            </ul>
                        </div>
                        <form method="POST" action="{{ route('addTour') }}" enctype="multipart/form-data" id="addTour">@csrf
                            <div class="card-body">
                                <div class="row">
                                    <div class="form-group col-md-4">
            	                        <label class="required">Tour Name</label>
            	                        <input type="text" name="tour_name" class="form-control" placeholder="Enter Tour Name" required>
                          	        </div>
                                    <div class="form-group col-md-2">
                                        <label class="required">Destination</label>
                                        <select class="form-control select2bs4" name="dest_id" required>
                                            <option value="" selected>Select One</option>
                                            @foreach(App\Models\Destination::where('status',1)->orderBy('name','ASC')->get() as $row)
                                            <option value="{{$row->id}}">{{$row->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label class="required">Star Ratings</label>
                                        <select class="form-control select2bs4" name="rating" required>
                                            @for ($i = 1; $i <= 5; $i += 0.5)
                                                <option value="{{$i}}">{{$i}}</option>
                                            @endfor
                                        </select>
                                    </div>
                                    <div class="form-group col-md-4">
            	                      	<label class="required">Cover Image <small>(Size: 600 X 500px)</small></label>
            	                      	<input type="file" name="image" class="form-control p-1" accept="image/*" required>
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label class="required">Tour Type</label>
                                        <select class="form-control select2bs4" name="type" name="type">
                                            <option value="Domestic">Domestic</option>
                                            <option value="International">International</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label class="">Special Tour</label>
                                        <select class="form-control select2bs4" name="special_tour_type" name="special_tour_type">
                                            <option value="">Select One</option>
                                            <option value="Adventures Tour">Adventures Tour</option>
                                            <option value="Student Special ">Student Special </option>
                                            <option value="Bike Tour">Bike Tour</option>
                                            <option value="Honeymoon Special">Honeymoon Special</option>
                                            <option value="Second Innings">Second Innings</option>
                                            <option value="Young Age">Young Age</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label class="required">Price per perosn (Adult)</label>
                                        <input type="text" name="adult_price" class="form-control" placeholder="Enter Price" required>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label class="required">Price per perosn (Child)</label>
                                        <input type="text" name="child_price" class="form-control" placeholder="Enter Price" required>
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label class="">From Date</label>
                                        <input type="date" name="from_date" class="form-control" placeholder="Enter Date">
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label class="">End Date</label>
                                        <input type="date" name="end_date" class="form-control" placeholder="Enter Date">
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label class="required">Day/s</label>
                                        <select class="form-control select2bs4" name="days">
                                            @for($i=1; $i<=30; $i++)
                                            <option value="{{$i}}">{{$i}}</option>
                                            @endfor
                                        </select>
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label class="required">Night/s</label>
                                        <select class="form-control select2bs4" name="nights">
                                            @for($i=1; $i<=30; $i++)
                                            <option value="{{$i}}">{{$i}}</option>
                                            @endfor
                                        </select>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label class="required">Amenities</label>
                                        <input type="text" name="amenities" class="form-control" placeholder="Enter Amenities" required>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label class="required">Overview</label>
                                        <textarea name="description" class="form-control" rows="3" placeholder="Enter Overview" required></textarea>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label class="required">Inclusions</label>
                                        <textarea name="inclusions" class="form-control" rows="3" placeholder="Enter Inclusions" required></textarea>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label class="required">Exclusions</label>
                                        <textarea name="exclusions" class="form-control" rows="3" placeholder="Enter Exclusions" required></textarea>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label class="">Note</label>
                                        <input type="text" name="note" class="form-control" placeholder="Enter Note">
                                    </div>
                                    <div class="form-group col-md-12">
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" id="isPopular" name="is_popular" value="1">
                                            <label class="form-check-label" for="isPopular">Popular Tour Package</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer ">
                                <button type="submit" class="btn btn-warning text-white submit"><i class="fa fa-check-circle"></i> Add </button>
                                <button type="reset" class="btn btn-default"> Reset </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<script src="{{ asset('backend_plugins/jquery/jquery.min.js') }}"></script>
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
                    required: true,
                    number:true,
                },
                image: {
                    required: true,
                    accept: 'png|jpg|jpeg',
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