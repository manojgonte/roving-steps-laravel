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
                                <li class="nav-item"><a class="nav-link bg-light btn btn-sm" href="{{url('admin/itinerary-builder/'.Request()->id)}}"><i class="fa fa-plus-circle"></i> Add Itinerary</a></li>
                                <li class="nav-item"><a class="nav-link text-white bg-gradient-dark btn btn-sm ml-2"><i class="fa fa-pencil-alt"></i> Edit Itinerary</a></li>
                            </ul>
                        </h3>

                        <form method="POST" action="{{url('admin/edit-tour-itinerary/'.Request()->id)}}" enctype="multipart/form-data" id="editItinerary">@csrf
                        @for($i=0; $i<$tour->days; $i++)
                        <div class="card m-3">
                            <div class="card-body bg-light pt-1">
                                <h4><span class="badge badge-secondary text-md font-weight-normal">Day {{$i+1}}</span></h4>
                                <div class="form-row">
                                    {{-- previously added itinerary --}}
                                    @if($tour->itinerary)
                                    @foreach($tour->itinerary as $itinerary)
                                        @if($itinerary->day == ($i+1))
                                        <div class="row border-bottom border-dark pb-2 pt-2">
                                            <input type="hidden" name="day[]" value="{{$itinerary->day}}"> 
                                            <input type="hidden" name="itinerary_id[]" value="{{$itinerary->id}}"> 
                                            <div class="form-group col-md-4">
                                                <label class="required">Places to Visit</label>
                                                <input type="text" name="visit_place[]" class="form-control" placeholder="Enter Place" value="{{$itinerary->visit_place}}" required>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label class="required">Activity of the Day</label>
                                                <input type="text" name="activity[]" class="form-control" placeholder="Enter Activity" value="{{$itinerary->activity}}" required>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label class="required">Travel Option</label>
                                                <select class="form-control select2bs4" name="travel_option[]" required>
                                                    <option value="">Select One</option>
                                                    <option value="Bike" @if($itinerary->travel_option == 'Bike') selected @endif>Bike</option>
                                                    <option value="Private Car" @if($itinerary->travel_option == 'Private Car') selected @endif>Private Car</option>
                                                    <option value="Common Vehicle" @if($itinerary->travel_option == 'Common Vehicle') selected @endif>Common Vehicle</option>
                                                    <option value="Train / Flight" @if($itinerary->travel_option == 'Train / Flight') selected @endif>Train / Flight</option>
                                                    <option value="Train" @if($itinerary->travel_option == 'Train') selected @endif>Train</option>
                                                    <option value="Flight" @if($itinerary->travel_option == 'Flight') selected @endif>Flight</option>
                                                    <option value="Cruise" @if($itinerary->travel_option == 'Cruise') selected @endif>Cruise</option>
                                                </select>
                                            </div>
                                            <div class="form-group col-md-12">
                                                <label class="required">Overview</label>
                                                <textarea name="description[]" class="form-control" rows="3" placeholder="Enter Overview" required>{{$itinerary->description}}</textarea>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label class="required">Stay</label>
                                                <input type="text" name="stay[]" class="form-control" placeholder="Enter Stay" value="{{$itinerary->stay}}" required>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label class="required">Food</label>
                                                <input type="text" name="food[]" class="form-control" placeholder="Enter Food" value="{{$itinerary->food}}" required>
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label class="required">Image <small>(Size: 800 X 530px)</small></label>
                                                @if(!empty($itinerary->image))
                                                <input type="hidden" name="current_image[]" value="{{ $itinerary->image }}">
                                                @endif
                                                <input type="file" name="image[]" class="form-control p-1" value="{{ $itinerary->image }}">
                                                <img class="mt-2" style="width: 15%;" src="{{ asset('img/tours/tour_itinerary/'.$itinerary->image) }}" alt="">
                                            </div>
                                            <div class="form-group col-md-1">
                                                <label class="invisible">Remove</label>
                                                <a href="{{url('admin/delete-itinerary/'.$itinerary->id)}}" class="btn btn-danger" onclick="return confirm('Are you sure?')"> Delete</a>
                                            </div>
                                        </div>
                                        @endif
                                    @endforeach
                                    @endif
                                </div>
                            </div>
                        </div>
                        @endfor
                        <div class="card-footer text-left">
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
<script>
    $(document).ready(function() {
        $('#editItinerary').validate({
            ignore: [],
            debug: false,
            rules: {
                'visit_place[]': {
                    required: true,
                },
                'activity[]': {
                    required: true,
                },
                'description[]': {
                    required: true,
                },
                'stay[]': {
                    required: true,
                },
                'food[]': {
                    required: true,
                },
                'image[]': {
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