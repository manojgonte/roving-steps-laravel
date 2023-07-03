@extends('layouts/adminLayout/admin_design')
@section('content')

<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <h4>Itinerary Builder Section</h4>
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

    <section class="content">
        <div class="container-fluid">
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
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-default">
                        <div class="card-header p-2">
                            <ul class="nav nav-pills">
                                <li class="nav-item"><a class="nav-link" href="{{url('admin/edit-tour/'.Request()->id)}}">Basic Information</a></li>
                                <li class="nav-item"><a class="nav-link active">Itinerary Builder</a></li>
                            </ul>
                        </div>

                        <div class="card">
                            <h3 class="card-title text-muted pt-2 pl-3">
                                Tour Details
                            </h3>
                            @include('admin/tour/tour_basic_info', ['tour' => $tour])
                        </div>

                        <h3 class="card-title text-muted pt-2 pl-3">
                            <ul class="nav nav-pills">
                                <li class="nav-item"><a class="nav-link text-white bg-gradient-dark btn btn-sm"><i class="fa fa-plus-circle"></i> Add Itinerary</a></li>
                                <li class="nav-item"><a class="nav-link bg-light btn btn-sm ml-2" href="{{url('admin/edit-tour-itinerary/'.Request()->id)}}"><i class="fa fa-pencil-alt"></i> Edit Itinerary</a></li>
                            </ul>
                        </h3>

                        <form method="POST" action="{{url('admin/add-tour-itinerary/'.Request()->id)}}" enctype="multipart/form-data" id="TourItinerary">@csrf
                        @for($i=0; $i<$tour->days; $i++)
                        <div class="card m-3">
                            <div class="card-body bg-light pt-1">
                                <h4><span class="badge badge-secondary text-md font-weight-normal">Day {{$i+1}}</span></h4>
                                <div class="form-row">

                                    {{-- new itinerary --}}
                                    <div class="row fields-group border-bottom border-dark pb-2 pt-2">
                                        <input type="hidden" name="day[]" value="{{$i+1}}"> 
                                        <div class="form-group col-md-4">
                	                        <label class="required">Places to Visit</label>
                	                        <input type="text" name="visit_place[]" class="form-control" placeholder="Enter Place" value="" required>
                              	        </div>
                                        <div class="form-group col-md-4">
                                            <label class="required">Activity of the Day</label>
                                            <input type="text" name="activity[]" class="form-control" placeholder="Enter Activity" value="" required>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label class="required">Travel Option</label>
                                            <select class="form-control select2bs4" name="travel_option[]" required>
                                                <option value="">Select One</option>
                                                <option value="Bike">Bike</option>
                                                <option value="Private Car">Private Car</option>
                                                <option value="Common Vehicle">Common Vehicle</option>
                                                <option value="Train / Flight">Train / Flight</option>
                                                <option value="Train">Train</option>
                                                <option value="Flight">Flight</option>
                                                <option value="Cruise">Cruise</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label class="required">Overview</label>
                                            <textarea name="description[]" class="form-control" rows="3" placeholder="Enter Overview" required></textarea>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label class="required">Stay</label>
                                            <input type="text" name="stay[]" class="form-control" placeholder="Enter Stay" value="" required>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label class="required">Food</label>
                                            <input type="text" name="food[]" class="form-control" placeholder="Enter Food" value="" required>
                                        </div>
                                        <div class="form-group col-md-4">
                	                      	<label class="required">Image <small>(Size: 800 X 530px)</small></label>
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
                            <button type="submit" class="btn btn-warning text-white submit"><i class="fa fa-check-circle"></i> Save </button>
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
        $('#TourItinerary').validate({
            ignore: [],
            debug: false,
            rules: {
                'visit_place[]': {
                    required: true,
                },
                // 'activity[]': {
                //     required: true,
                // },
                // 'description[]': {
                //     required: true,
                // },
                // 'stay[]': {
                //     required: true,
                // },
                // 'food[]': {
                //     required: true,
                // },
                'image[]': {
                    // required: true,
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