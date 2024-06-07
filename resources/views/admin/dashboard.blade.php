@extends('layouts/adminLayout/admin_design')
@section('content')

<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">

<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Dashboard</h1>
                </div>
            </div>
        </div>
    </div> 

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>{{App\Models\Tour::count()}}</h3>
                            <p>Tours</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-map"></i>
                        </div>
                        {{-- <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> --}}
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3>{{App\Models\Destination::count()}}</h3>
                            <p>Destinations</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-location"></i>
                        </div>
                        {{-- <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> --}}
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <h3>{{App\Models\Enquiry::count()}}</h3>
                            <p>Tour Enquiries</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-social-twitch"></i>
                        </div>
                        {{-- <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> --}}
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <h3>{{App\Models\TourEnquiry::count()}}</h3>
                            <p>Contact Enquiries</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-person-add"></i>
                        </div>
                        {{-- <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> --}}
                    </div>
                </div>
            </div>
        </div>
    </section>

    <hr />

    @php $now = Carbon\Carbon::now(); @endphp
    <section class="content">
        <div class="container-fluid">
            <h4 class="m-0 mb-3 text-dark">Dashboard</h4>
            <div class="row">
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-gradient-dark">
                        <div class="inner">
                            <h3>{{App\Models\PlannedTour::where('status', 0)->count()}}</h3>
                            <p>Draft</p>
                        </div>
                        {{-- <div class="icon">
                            <i class="ion ion-map"></i>
                        </div> --}}
                        <a href="{{url('admin/tours/draft')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-gradient-dark">
                        <div class="inner">
                            <h3>{{App\Models\PlannedTour::where('status', 1)->whereRaw('? between from_date and end_date', [$now])->count()}}</h3>
                            <p>Ongoing</p>
                        </div>
                        {{-- <div class="icon">
                            <i class="ion ion-location"></i>
                        </div> --}}
                        <a href="{{url('admin/tours/ongoing')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-gradient-dark">
                        <div class="inner">
                            <h3>{{App\Models\PlannedTour::where('status', 1)->where('from_date', '>', $now)->count()}}</h3>
                            <p>Upcoming</p>
                        </div>
                        {{-- <div class="icon">
                            <i class="ion ion-social-twitch"></i>
                        </div> --}}
                        <a href="{{url('admin/tours/upcoming')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-gradient-dark">
                        <div class="inner">
                            <h3>{{App\Models\PlannedTour::where('status', 1)->where('end_date', '<', $now)->count()}}</h3>
                            <p>Completed</p>
                        </div>
                        {{-- <div class="icon">
                            <i class="ion ion-person-add"></i>
                        </div> --}}
                        <a href="{{url('admin/tours/completed')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection