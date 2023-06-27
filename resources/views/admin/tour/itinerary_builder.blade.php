@extends('layouts/adminLayout/admin_design')
@section('content')

<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <h4>Itinerary Builder Section</h4>
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
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{url('/admin/dashboard')}}">Home</a></li>
                        <li class="breadcrumb-item active">Tour Planner Section</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    {{-- <form id="myForm">
        @for ($i = 0; $i < 3; $i++)
            <div class="form-row">
                <div class="fields-group">
                    <input type="text" name="name[]" placeholder="Name">
                    <input type="email" name="email[]" placeholder="Email">
                </div>
                @if ($i > 0)
                    <button class="remove-field" type="button">Remove</button>
                @endif
                <button class="add-more" type="button" data-group="{{ $i }}">Add More</button>
            </div>
        @endfor
        <button type="submit">Submit</button>
    </form> --}}

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-default">
                        <div class="card-header p-2 d-none">
                            <ul class="nav nav-pills">
                                <li class="nav-item"><a class="nav-link" href="{{url('admin/edit-tour/'.Request()->id)}}">Basic Information</a></li>
                                <li class="nav-item"><a class="nav-link active">Itinerary Builder</a></li>
                            </ul>
                        </div>

                        <div class="card d-none">
                            <h3 class="card-title text-muted pt-2 pl-3">
                                Tour Details
                            </h3>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="card-body border-right">
                                        <dl class="row">
                                            <dt class="col-sm-3">Tour ID</dt>
                                            <dd class="col-sm-9">{{$tour->id}}</dd>
                                            <dt class="col-sm-3">Tour Name</dt>
                                            <dd class="col-sm-9">{{$tour->tour_name}}</dd>
                                            <dt class="col-sm-3">Destination</dt>
                                            <dd class="col-sm-9">{{$tour->dest_name}}</dd>
                                            <dt class="col-sm-3">Tour Type</dt>
                                            <dd class="col-sm-9">{{$tour->type}}</dd>
                                            <dt class="col-sm-3">Price/Adult</dt>
                                            <dd class="col-sm-9">{{$tour->adult_price}}</dd>
                                            <dt class="col-sm-3">Child/Price</dt>
                                            <dd class="col-sm-9">{{$tour->child_price}}</dd>
                                            <dt class="col-sm-3">Date</dt>
                                            <dd class="col-sm-9">{{date('d/m/Y', strtotime($tour->from_date))}} - {{date('d/m/Y', strtotime($tour->end_date))}}</dd>
                                            <dt class="col-sm-3">Duration</dt>
                                            <dd class="col-sm-9">{{$tour->days}}D - {{$tour->nights}}N</dd>
                                        </dl>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="card-body">
                                        <dl class="row">
                                            <dt class="col-sm-2">Overview</dt>
                                            <dd class="col-sm-10">{{$tour->description}}</dd>
                                        </dl>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <h3 class="card-title text-muted pt-2 pl-3">
                            Add Itinerary
                        </h3>

                        <form method="POST" action="{{url('admin/add-tour-itinerary/'.Request()->id)}}" enctype="multipart/form-data" id="addTour">@csrf
                        @for($i=0; $i<$tour->days; $i++)
                        <div class="card m-3">
                            <h4><span class="badge badge-secondary text-md font-weight-normal">Day {{$i+1}}</span></h4>
                            <div class="card-body pt-1">
                                <div class="form-row">
                                    <div class="row fields-group border-bottom pb-2 pt-2">
                                        <input type="hidden" name="day[]" value="{{$i+1}}"> 
                                        <div class="form-group col-md-4">
                	                        <label class="required">Places to Visit</label>
                	                        <input type="text" name="visit_place[]" class="form-control" placeholder="Enter Place" value="Place {{$i+1}}" required>
                              	        </div>
                                        <div class="form-group col-md-4">
                                            <label class="required">Activity of the Day</label>
                                            <input type="text" name="activity[]" class="form-control" placeholder="Enter Activity" value="Activity {{$i+1}}" required>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label class="required">Travel Option</label>
                                            <select class="form-control select2bs4" name="travel_option[]" required>
                                                <option value="">Select One</option>
                                                <option value="Bike" selected>Bike</option>
                                                <option value="Private Car">Private Car</option>
                                                <option value="Common Vehicle">Common Vehicle</option>
                                                <option value="Train">Train</option>
                                                <option value="Flight">Flight</option>
                                                <option value="Cruise">Cruise</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label class="required">Overview</label>
                                            <textarea name="description[]" class="form-control" rows="3" placeholder="Enter Overview" required>Overview {{$i+1}}</textarea>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label class="required">Stay</label>
                                            <input type="text" name="stay[]" class="form-control" placeholder="Enter Stay" value="Stay {{$i+1}}" required>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label class="required">Food</label>
                                            <input type="text" name="food[]" class="form-control" placeholder="Enter Food" value="Food {{$i+1}}" required>
                                        </div>
                                        <div class="form-group col-md-4">
                	                      	<label class="required">Image</label>
                	                      	<input type="file" name="image[]" class="form-control p-1" required>
                                        </div>
                                    </div>
                                    @if ($i > $tour->days)
                                        <a class="remove-field" type="button"><i class="fa fa-times-circle"></i> Remove</a>
                                    @endif
                                    <a class="add-more pt-2 text-dark" type="button" data-group="{{ $i }}"><i class="fa fa-plus-circle"></i> Add More</a>
                                </div>
                            </div>
                        </div>
                        @endfor
                        <div class="card-footer text-right">
                            <button type="submit" class="btn btn-warning text-white"><i class="fa fa-check-circle"></i> Save </button>
                            {{-- <button type="reset" class="btn btn-default"> Reset </button> --}}
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
        // Add More button click event
        $(document).on('click', '.add-more', function() {
            var group = $(this).data('group');
            var $formRow = $(this).closest('.form-row');
            var $fieldsGroup = $formRow.find('.fields-group').last();
            var $clone = $fieldsGroup.clone(); // Clone the fields group
            
            // Clear the values of the cloned input fields
            // $clone.find('input').val('');
            $clone.find('input:not(:hidden)').val('');
            
            // Append the cloned fields group after the current fields group
            $fieldsGroup.after($clone);
            
            // Add a "Remove" button to the cloned fields group
            var $removeButton = $('<a class="remove-field p-1" type="button"><i class="fa fa-times-circle"></i> Remove</a>');
            $clone.append($removeButton);
        });
        
        // Remove button click event
        $(document).on('click', '.remove-field', function() {
            $(this).closest('.fields-group').remove();
        });
    });
</script>

<script>
    $(document).ready(function() {
        $('#addTour').validate({
            ignore: [],
            debug: false,
            rules: {
                title: {
                    required: true,
                },
                image: {
                    required: true,
                    accept: 'png|jpg|jpeg',
                },
                
            },
            messages: {},
            submitHandler: function(form) {
                form.submit();
            }
        });
    });
</script>

@endsection