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
                        <form method="POST" action="{{url('admin/edit-tour-itinerary/'.Request()->id)}}" enctype="multipart/form-data" id="editItinerary">@csrf
                            <div class="card bg-light m-3">
                                <h3 class="card-title text-muted pt-2 pl-3">
                                    Edit Itinerary
                                </h3><hr>
                                <div class="card-body pt-1">
                                    <div class="row pb-2 pt-2">
                                        <input type="hidden" name="tour_id" value="{{$itinerary->tour_id}}"> 
                                        <div class="form-group col-md-4">
                                            <label class="required">Places to Visit</label>
                                            {{-- <input type="text" name="visit_place" class="form-control" placeholder="Enter Place" value="{{$itinerary->visit_place}}" required> --}}
                                            <select class="form-control select2bs4" name="visit_place" required>
                                                <option value="">Select One</option>
                                                @foreach(App\Models\Destination::where(['parent_id'=>0, 'id'=>Request()->dest_id])->orderBy('name','ASC')->get() as $cat){
                                                    <option value="{{$cat->name}}" @if($cat->name == $itinerary->visit_place) selected @endif>{{$cat->name}}</option>
                                                    @php $sub_categories = App\Models\Destination::where(['parent_id'=>$cat->id])->orderBy('name','ASC')->get(); @endphp
                                                    @foreach ($sub_categories as $sub_cat) {
                                                    <option value="{{$sub_cat->name}}" @if($sub_cat->name == $itinerary->visit_place) selected @endif>-- {{$sub_cat->name}}</option>
                                                    @endforeach
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label>Sigthseeings of the Day</label>
                                            <input type="text" name="activity" class="form-control" placeholder="Enter Activity" value="{{$itinerary->activity}}">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label class="required">Travel Option</label>
                                            <select class="form-control select2bs4" name="travel_option" required>
                                                <option value="">Select One</option>
                                                <option value="NA" @if($itinerary->travel_option == 'NA') selected @endif>NA</option>
                                                <option value="Bike" @if($itinerary->travel_option == 'Bike') selected @endif>Bike</option>
                                                <option value="Private Car" @if($itinerary->travel_option == 'Private Car') selected @endif>Private Car</option>
                                                <option value="Common Vehicle" @if($itinerary->travel_option == 'Common Vehicle') selected @endif>Common Vehicle</option>
                                                <option value="Train / Flight" @if($itinerary->travel_option == 'Train / Flight') selected @endif>Train / Flight</option>
                                                <option value="Train" @if($itinerary->travel_option == 'Train') selected @endif>Train</option>
                                                <option value="Flight" @if($itinerary->travel_option == 'Flight') selected @endif>Flight</option>
                                                <option value="Cruise" @if($itinerary->travel_option == 'Cruise') selected @endif>Cruise</option>
                                                <option value="Private Boat" @if($itinerary->travel_option == 'Private Boat') selected @endif>Private Boat</option>
                                                <option value="Shared Travel" @if($itinerary->travel_option == 'Shared Travel') selected @endif>Shared Travel</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label class="required">Overview</label>
                                            <textarea name="description" class="form-control" rows="5" placeholder="Enter Overview" required>{{$itinerary->description}}</textarea>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label class="required">Stay</label>
                                            <input type="text" name="stay" class="form-control" placeholder="Enter Stay" value="{{$itinerary->stay}}" required>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label class="required">Food</label>
                                            <input type="text" name="food" class="form-control" placeholder="Enter Food" value="{{$itinerary->food}}" required>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label>Image <small>(Size: 800 X 530px)</small></label>
                                            @if(!empty($itinerary->image))
                                            <input type="hidden" name="current_image" value="{{ $itinerary->image }}">
                                            @endif

                                            <div class="input-group mb-2">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text mr-1 bg-dark" style="cursor: pointer;" data-toggle="modal" data-target="#gallery-modal" onclick="checkGallerySelection()"> Gallery &nbsp;<i class="fa fa-images"></i></span>
                                                </div>
                                                <input type="hidden" name="gallery_image" id="gallery_image">
                                                <input type="file" name="image" class="form-control p-1" id="image_file" onchange="checkFileInput()">
                                            </div>
                                            <div id="visit_place_image_wrapper" style="display: none;" class="mt-1">
                                                <img id="visit_place_image_preview" src="" style="max-height: 60px; border-radius: 4px;" alt="Image Preview">
                                                <small id="visit_place_image_info" class="text-muted d-block"></small>
                                            </div>
                                            @if(!empty($itinerary->image))
                                            <img class="mt-1" id="current_itinerary_image" style="width: 15%;" src="{{ asset('img/tours/tour_itinerary/'.$itinerary->image) }}" alt="">
                                            @endif
                                        </div>
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
                                <div class="card-footer text-left">
                                    <button type="submit" class="btn btn-dark text-white submit"><i class="fa fa-check-circle"></i> Update </button>
                                </div>
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
        if($('#visit_place_image_preview').length > 0){
            var imgSrc = "{{ asset('img/gallery') }}/" + image;
            $('#visit_place_image_preview').attr('src', imgSrc);
            $('#visit_place_image_wrapper').show();
            $('#visit_place_image_info').text('Selected gallery image: ' + image);
        }
    }

    function checkFileInput() {
        const fileInput = document.getElementById('image_file');
        if (fileInput.files.length > 0) {
            document.getElementById('gallery_image').value = '';
            const galleryRadios = document.getElementsByName('gallery_image_option');
            for (let i = 0; i < galleryRadios.length; i++) {
                galleryRadios[i].checked = false;
            }
            if($('#visit_place_image_wrapper').length > 0){
                $('#visit_place_image_wrapper').hide();
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
<script>
    $(document).ready(function() {
        $('select[name="visit_place"]').change(function(){
            var placeId = $(this).val();
            if(placeId){
                $.ajax({
                    type:"GET",
                    url:"../../admin/get-itinerary-details/"+placeId,
                    data:{place_id: placeId},
                    dataType: 'json',
                    success:function(data){
                        var placeImage = data?.destination?.image ?? data?.itinerary?.image;
                        if(placeImage){
                            $('#gallery_image').val(placeImage);
                            if($('#visit_place_image_wrapper').length > 0){
                                var imgSrc = data?.destination?.image ? ("{{ asset('img/destinations') }}/" + placeImage) : ("{{ asset('img/tours/tour_itinerary') }}/" + placeImage);
                                $('#visit_place_image_preview').attr('src', imgSrc);
                                $('#visit_place_image_wrapper').show();
                                $('#visit_place_image_info').text('Linked visit place image: ' + placeImage);
                            }
                        } else {
                            $('#gallery_image').val('');
                            if($('#visit_place_image_wrapper').length > 0){
                                $('#visit_place_image_wrapper').hide();
                            }
                        }
                    }
                });
            }
        });

        $('#editItinerary').validate({
            ignore: [],
            debug: false,
            rules: {
                visit_place: {
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