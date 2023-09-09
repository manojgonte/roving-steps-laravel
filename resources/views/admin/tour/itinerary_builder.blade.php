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

                        <div class="card bg-light m-3">
                            <h3 class="card-title text-muted pt-2 pl-3">
                                Add Itinerary
                            </h3><hr>
                            <div class="card-body pt-1">
                                <form method="POST" action="{{url('admin/add-tour-itinerary/'.Request()->id)}}" enctype="multipart/form-data" id="TourItinerary">@csrf
                                    <div class="row">
                                        <div class="form-group col-md-4">
                                            <label class="required">Day</label>
                                            <select class="form-control select2bs4" name="day" required>
                                                <option value="">Select Day</option>
                                                @for($i=0;$i<$tour->days;$i++)
                                                <option value="{{$i+1}}">{{$i+1}}</option>
                                                @endfor
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row pt-2">
                                        <div class="form-group col-md-4">
                                            <label class="required">Places to Visit</label>
                                            <input type="text" name="visit_place" class="form-control" placeholder="Enter Place" value="" required>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label class="required">Activity of the Day</label>
                                            <input type="text" name="activity" class="form-control" placeholder="Enter Activity" value="" required>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label class="required">Travel Option</label>
                                            <select class="form-control select2bs4" name="travel_option" required>
                                                <option value="">Select One</option>
                                                <option value="NA">NA</option>
                                                <option value="Bike">Bike</option>
                                                <option value="Private Car">Private Car</option>
                                                <option value="Common Vehicle">Common Vehicle</option>
                                                <option value="Train / Flight">Train / Flight</option>
                                                <option value="Train">Train</option>
                                                <option value="Flight">Flight</option>
                                                <option value="Cruise">Cruise</option>
                                                <option value="Private Boat">Private Boat</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label class="required">Overview</label>
                                            <textarea name="description" class="form-control" rows="3" placeholder="Enter Overview" required></textarea>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label class="required">Stay</label>
                                            <input type="text" name="stay" class="form-control" placeholder="Enter Stay" value="" required>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label class="required">Food</label>
                                            <input type="text" name="food" class="form-control" placeholder="Enter Food" value="" required>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label>Image <small>(Size: 800 X 530px)</small></label>
                                            <input type="file" name="image" class="form-control p-1">
                                        </div>
                                    </div>
                                <form>
                            </div>
                            <div class="card-footer text-start">
                                <button type="submit" class="btn btn-warning text-white submit"><i class="fa fa-check-circle"></i> Save </button>
                            </div>
                        </div>

                        <div class="card bg-light m-3">
                            <h3 class="card-title text-muted pt-2 pl-3">
                                View Itineraries
                            </h3><hr>
                            <div class="card-body pt-1">
                                <table id="example1" class="table table-bordered table-striped" style="overflow-x: auto;">
                                <thead>
                                    <tr>
                                        <th>Day</th>
                                        <th>Image</th>
                                        <th>Place</th>
                                        <th>Activity</th>
                                        <th>Travel</th>
                                        {{-- <th>Overview</th> --}}
                                        <th>Stay</th>
                                        <th>Food</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($tour->itinerary->sortBy([['day','asc'],['created_at','asc']]) as $row)
                                    <tr>
                                        <td>{{ $row->day }}</td>
                                        <td><img src="{{asset('img/tours/tour_itinerary/'.$row->image)}}" height="60"></td>
                                        <td>{{ Str::limit($row->visit_place, 30) }}</td>
                                        <td>{{ $row->activity }}</td>
                                        <td>{{ $row->travel_option }}</td>
                                        {{-- <td>{{ Str::limit($row->description, 30) }}</td> --}}
                                        <td>{{ $row->stay }}</td>
                                        <td>{{ $row->food }}</td>
                                        <td class="d-flex border-0 justify-content-center">
                                            <a class="btn btn-default" href="{{ url('/admin/edit-tour-itinerary/'.$row->id) }}"><i class="fa fa-edit"></i></a> &nbsp;
                                            <a class="btn btn-default" onclick="return confirm('Are you sure?')" href="{{url('admin/delete-itinerary/'.$row->id)}}"><i class="fa fa-trash"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            {{-- {{ $tour->itinerary->links("pagination::bootstrap-4") }} --}}
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
</div>


<script src="{{ asset('backend_plugins/jquery/jquery.min.js') }}"></script>
<script>
    $(document).ready(function() {
        $('#TourItinerary').validate({
            ignore: [],
            debug: false,
            rules: {
                day: {
                    required: true,
                },
                visit_place: {
                    required: true,
                },
                activity: {
                    required: true,
                },
                description: {
                    required: true,
                },
                stay: {
                    required: true,
                },
                food: {
                    required: true,
                },
                image: {
                    // required: true,
                    accept: 'png|jpg|jpeg|webp|svg',
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