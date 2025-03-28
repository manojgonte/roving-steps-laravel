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
                                            <option value="">Select One</option>
                                            @foreach(App\Models\Destination::where('status',1)->orderBy('name','ASC')->get() as $cat)
                                                <option value="{{$cat->id}}">{{$cat->name}}</option>
                                                {{-- @php $sub_categories = App\Models\Destination::where(['parent_id'=>$cat->id])->get(); @endphp
                                                @foreach ($sub_categories as $sub_cat)
                                                <option value="{{$sub_cat->id}}">-- {{$sub_cat->name}}</option>
                                                @endforeach --}}
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
            	                      	{{-- <input type="file" name="image" class="form-control p-1" accept="image/*" required> --}}
                                        <div class="input-group mb-1">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text mr-1 bg-dark" style="cursor: pointer;" data-toggle="modal" data-target="#gallery-modal" onclick="checkGallerySelection()"> Gallery &nbsp;<i class="fa fa-images"></i></span>
                                            </div>
                                            <input type="hidden" name="gallery_image" id="gallery_image">
                                            <input type="file" name="image" class="form-control p-1" id="image_file" onchange="checkFileInput()">
                                        </div>

                                        {{-- gallery modal --}}
                                        <div class="modal fade" id="gallery-modal">
                                            <div class="modal-dialog modal-dialog-centered modal-xl">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">Photo Gallery</h4>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="card-body p-0">
                                                            <div id="gallery-content"></div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-primary" data-dismiss="modal">Select</button>
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label class="required">Tour Type</label>
                                        <select class="form-control select2bs4" name="type" name="type">
                                            <option value="Domestic">Domestic</option>
                                            <option value="International">International</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label>Special Tour</label>
                                        <select class="select2" name="special_tour_type[]" multiple="multiple" data-placeholder="Select one" style="width: 100%;">
                                            <option value="">Select One</option>
                                            @foreach(App\Models\SpecialTour::where('status',1)->get() as $row)
                                            <option value="{{$row->id}}">{{$row->title}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label class="required">Price per perosn (Adult)</label>
                                        <input type="text" name="adult_price" class="form-control" placeholder="Enter Price" required>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label class="">Price per perosn (Child)</label>
                                        <input type="text" name="child_price" class="form-control" placeholder="Enter Price">
                                    </div>
                                    {{-- <div class="form-group col-md-2">
                                        <label class="">From Date</label>
                                        <input type="date" name="from_date" class="form-control" placeholder="Enter Date">
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label class="">End Date</label>
                                        <input type="date" name="end_date" class="form-control" placeholder="Enter Date">
                                    </div> --}}
                                    <div class="form-group col-md-3">
                                        <label class="required">Day/s</label>
                                        <select class="form-control select2bs4" name="days">
                                            @for($i=1; $i<=30; $i++)
                                            <option value="{{$i}}">{{$i}}</option>
                                            @endfor
                                        </select>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label class="required">Night/s</label>
                                        <select class="form-control select2bs4" name="nights">
                                            @for($i=1; $i<=30; $i++)
                                            <option value="{{$i}}">{{$i}}</option>
                                            @endfor
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label class="required">Amenities</label>
                                        <input type="text" name="amenities" class="form-control" placeholder="Enter Amenities" required>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label class="">Overview</label>
                                        <textarea name="description" class="form-control" rows="3" placeholder="Enter Overview"></textarea>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label class="">Inclusions</label>
                                        <textarea name="inclusions" class="form-control" rows="5" placeholder="Enter Inclusions">
1. Meals / Breakfast @ Indian Restaurant without transfers.
2. Air Ticket 
3. Airport and sightseeing transfers on SIC basis.
4. Toll Taxes & Service charges 
5. All sightseeing on SIS basis. 
6. Air flight 
7. Insurance</textarea>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label class="">Exclusions</label>
                                        <textarea name="exclusions" class="form-control" rows="5" placeholder="Enter Exclusions">
1. Tips and porter charges. 
2. Cost of any excursions not included in the package
 3. Early check in and late checkout will be as per hotel policy and availability. (Extra charges may be applicable).
 4. Items of any personal nature such as phone calls, pay movies, room services, mini bars, laundries or other expenditures during the tour. 
5. Tours can be cancelled or postponed without prior notice in case of any natural calamities. 
6. SIC means seat in coach basis. Drivers would communicate with the guests if there is any change in assigned pick up time. 
7. If guests fails to reach within the time arranged, there will be no replacement given any other services not specified above</textarea>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label class="">Note</label>
                                        <textarea name="note" class="form-control" rows="3" placeholder="Enter Note">
Terms & Conditions
•   No refund will be made for any unused accommodation, missed meals, transportation segments, sightseeing tours or any other service. 
•   Such unused items are neither refundable nor exchangeable. Room allocation is done by the hotel depending upon availability at the time of check-in in the category of room as specified on your confirmation voucher. 
•   No refund shall be claimed, if the services & amenities of hotel were not up to your expectations, it will be considered on case to case basis.</textarea>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" id="isPopular" name="is_popular" value="1">
                                            <label class="form-check-label" for="isPopular">Popular Tour Package</label>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" id="isCustom" name="custom_tour" value="1">
                                            <label class="form-check-label" for="isCustom">Custom Tour</label>
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

<script>
    function selectGalleryImage(image) {
        document.getElementById('gallery_image').value = image;
        document.getElementById('image_file').disabled = true;
    }

    function checkFileInput() {
        const fileInput = document.getElementById('image_file');
        if (fileInput.files.length > 0) {
            document.getElementById('gallery_image').value = '';
            const galleryRadios = document.getElementsByName('gallery_image_option');
            for (let i = 0; i < galleryRadios.length; i++) {
                galleryRadios[i].checked = false;
            }
        }
    }

    function checkGallerySelection() {
        const galleryRadios = document.getElementsByName('gallery_image_option');
        let isChecked = false;
        for (let i = 0; i < galleryRadios.length; i++) {
            if (galleryRadios[i].checked) {
                isChecked = true;
                break;
            }
        }

        if (isChecked) {
            document.getElementById('image_file').disabled = true;
        } else {
            document.getElementById('image_file').disabled = false;
        }
    }
</script>

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
                    required: true,
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