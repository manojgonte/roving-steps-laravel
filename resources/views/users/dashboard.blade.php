@extends('layouts/frontLayout/front_design')
@section('content')

<div class="dashboard" data-x="dashboard" data-x-toggle="-is-sidebar-open">

    @include('layouts/frontLayout/user_sidebar')

    <div class="dashboard__main">
        <div class="dashboard__content bg-light-2">
            <div class="row y-gap-20 justify-between items-end pb-20 lg:pb-20 md:pb-32">
	          	<div class="col-auto">
		            <div class="text-18 fw-500">Hello, {{Auth::User()->name}}</div>
		            <h1 class="text-30 lh-14 fw-600">Dashboard</h1>
	          	</div>
	          	<div class="col-auto"></div>
	        </div>
            {{-- <div class="row y-gap-30">
			    <div class="col-xl-3 col-md-6">
			        <div class="py-30 px-30 rounded-4 bg-white shadow-3">
			            <div class="row y-gap-20 justify-between items-center">
			                <div class="col-auto">
			                    <div class="fw-500 lh-14">Pending</div>
			                    <div class="text-26 lh-16 fw-600 mt-5">$12,800</div>
			                    <div class="text-15 lh-14 text-light-1 mt-5">Total pending</div>
			                </div>
			            </div>
			        </div>
			    </div>
			    <div class="col-xl-3 col-md-6">
			        <div class="py-30 px-30 rounded-4 bg-white shadow-3">
			            <div class="row y-gap-20 justify-between items-center">
			                <div class="col-auto">
			                    <div class="fw-500 lh-14">Earnings</div>
			                    <div class="text-26 lh-16 fw-600 mt-5">$14,200</div>
			                    <div class="text-15 lh-14 text-light-1 mt-5">Total earnings</div>
			                </div>
			            </div>
			        </div>
			    </div>
			    <div class="col-xl-3 col-md-6">
			        <div class="py-30 px-30 rounded-4 bg-white shadow-3">
			            <div class="row y-gap-20 justify-between items-center">
			                <div class="col-auto">
			                    <div class="fw-500 lh-14">Bookings</div>
			                    <div class="text-26 lh-16 fw-600 mt-5">$8,100</div>
			                    <div class="text-15 lh-14 text-light-1 mt-5">Total bookings</div>
			                </div>
			            </div>
			        </div>
			    </div>
			    <div class="col-xl-3 col-md-6">
			        <div class="py-30 px-30 rounded-4 bg-white shadow-3">
			            <div class="row y-gap-20 justify-between items-center">
			                <div class="col-auto">
			                    <div class="fw-500 lh-14">Services</div>
			                    <div class="text-26 lh-16 fw-600 mt-5">22,786</div>
			                    <div class="text-15 lh-14 text-light-1 mt-5">Total bookable services</div>
			                </div>
			            </div>
			        </div>
			    </div>
			</div> --}}
			<div class="row y-gap-30 py-20" id="tour-enquiries">
			    <div class="col-xl-12 col-md-12">
			        <div class="py-30 px-30 rounded-4 bg-white shadow-3">
			            <div class="d-flex justify-between items-center">
			                <h2 class="text-18 lh-1 fw-500">My Tour Enquiries <span>({{$tour_enquiry->total()}})</span> </h2>
			                {{-- <div class="">
			                    <a href="#" class="text-14 text-blue-1 fw-500 underline">View All</a>
			                </div> --}}
			            </div>
			            <div class="overflow-scroll scroll-bar-1 pt-30">
			                <table class="table-2 col-12">
			                    <thead class="">
			                        <tr>
			                            <th>#</th>
			                            <th>Tour</th>
			                            <th>Total Tourist</th>
			                            <th>Current City</th>
			                            <th>Travel Dates</th>
			                            <th>Message</th>
			                        </tr>
			                    </thead>
			                    <tbody>
			                    	@foreach($tour_enquiry as $row)
			                        <tr>
			                            <td>{{$row->index+1}}</td>
			                            <td><a href="{{url('tour-details/'.$row->id.'/'.Str::slug($row->tour_name))}}"> {{$row->tour_name}} </a> <br><span class="text-13 text-light-1"> Enquired on: {{date('d M Y', strtotime($row->created_at))}}</span></td>
			                            <td>{{$row->tourist_no}}</td>
			                            <td>{{$row->current_city}}</td>
			                            <td>{{date('d M Y', strtotime($row->from_date))}} - <br> {{date('d M Y', strtotime($row->end_date))}}</td>
			                            <td>{{$row->message}}</td>
			                        </tr>
			                        @endforeach
			                    </tbody>
			                </table>
			                <div class="mt-2 d-flex justify-content-center">
                                {{ $tour_enquiry->links("pagination::bootstrap-4") }}
                            </div>
			            </div>
			        </div>
			    </div>
			</div>
        </div>
    </div>
</div>

@endsection('content')