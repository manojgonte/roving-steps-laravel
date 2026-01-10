<!DOCTYPE html>
<html lang="en">
<head>
    <head>
        <!-- Required meta tags -->
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>@if(!empty($meta_title)){{ $meta_title }} @else {{config('app.name')}} @endif</title>
        @if(!empty($meta_description)) <meta name="description" content="{{ $meta_title }}"> 
        @else <meta name="description" content="{{config('app.name')}}"> @endif
        
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="shortcut icon" type="image/x-icon" href="{{asset('img/logo/favicon.png')}}">

        <meta property="og:title" content="{{config('app.name')}}" />
        <meta property="og:type" content="site" />
        <meta property="og:description" content="{{config('app.name')}}" />
        <meta property="og:url" content="{{url('/')}}" />
        <meta property="og:image"  content="{{asset('img/logo/favicon.png')}}"  />
        
        <meta name="twitter:title" content="{{config('app.name')}}">
        <meta name="twitter:description" content="{{config('app.name')}}">
        <meta name="twitter:image"  content="{{asset('img/logo/favicon.png')}}" >
        <meta name="twitter:card" content="summary_large_image">

        <!-- Google fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com/">
        <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Jost:wght@400;500;600&amp;display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />

        <!-- Stylesheets -->
        <link rel="stylesheet" href="{{asset('css/vendors.css')}}">
        <link rel="stylesheet" href="{{asset('css/main.css')}}">

        @yield('styles')

    </head>
<body>
    <div class="preloader js-preloader">
        <div class="preloader__wrap">
            <div class="preloader__icon">
                {{-- <svg width="38" height="37" viewBox="0 0 38 37" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <g clip-path="url(#clip0_1_41)">
                    <path d="M32.9675 13.9422C32.9675 6.25436 26.7129 0 19.0251 0C11.3372 0 5.08289 6.25436 5.08289 13.9422C5.08289 17.1322 7.32025 21.6568 11.7327 27.3906C13.0538 29.1071 14.3656 30.6662 15.4621 31.9166V35.8212C15.4621 36.4279 15.9539 36.92 16.561 36.92H21.4895C22.0965 36.92 22.5883 36.4279 22.5883 35.8212V31.9166C23.6849 30.6662 24.9966 29.1071 26.3177 27.3906C30.7302 21.6568 32.9675 17.1322 32.9675 13.9422V13.9422ZM30.7699 13.9422C30.7699 16.9956 27.9286 21.6204 24.8175 25.7245H23.4375C25.1039 20.7174 25.9484 16.7575 25.9484 13.9422C25.9484 10.3587 25.3079 6.97207 24.1445 4.40684C23.9229 3.91841 23.6857 3.46886 23.4347 3.05761C27.732 4.80457 30.7699 9.02494 30.7699 13.9422ZM20.3906 34.7224H17.6598V32.5991H20.3906V34.7224ZM21.0007 30.4014H17.0587C16.4167 29.6679 15.7024 28.8305 14.9602 27.9224H16.1398C16.1429 27.9224 16.146 27.9227 16.1489 27.9227C16.152 27.9227 23.0902 27.9224 23.0902 27.9224C22.3725 28.8049 21.6658 29.6398 21.0007 30.4014ZM19.0251 2.19765C20.1084 2.19765 21.2447 3.33365 22.1429 5.3144C23.1798 7.60078 23.7508 10.6649 23.7508 13.9422C23.7508 16.6099 22.8415 20.6748 21.1185 25.7245H16.9322C15.2086 20.6743 14.2994 16.6108 14.2994 13.9422C14.2994 10.6649 14.8706 7.60078 15.9075 5.3144C16.8057 3.33365 17.942 2.19765 19.0251 2.19765V2.19765ZM7.28053 13.9422C7.28053 9.02494 10.3184 4.80457 14.6157 3.05761C14.3647 3.46886 14.1273 3.91841 13.9059 4.40684C12.7425 6.97207 12.102 10.3587 12.102 13.9422C12.102 16.7584 12.9462 20.7176 14.6126 25.7245H13.2259C9.33565 20.6126 7.28053 16.5429 7.28053 13.9422Z" fill="#3554D1" />
                  </g>
                  <defs>
                    <clipPath id="clip0_1_41">
                      <rect width="36.92" height="36.92" fill="white" transform="translate(0.540039)" />
                    </clipPath>
                  </defs>
                </svg> --}}
                <img src="{{asset('img/logo/globe.png')}}">
            </div>
        </div>
        <div class="preloader__title">{{config('app.name')}}</div>
    </div>

    <main class="">
        
        @php $dests = App\Models\Destination::where('status',1)->get(); @endphp
        <!-- Page Header-->
        @include('layouts/frontLayout/front_header')

        @yield('content')

        <!-- Page Footer-->
        @include('layouts/frontLayout/front_footer')

    </main>

    <div class="sidebar-media">
        <a class="enquiry" data-x-click="lang" href="javascript:void(0)">
            <i class="fa fa-file-alt"></i> <span>Send Enquiry</span>
        </a>

        <a class="whatsapp" href="https://api.whatsapp.com/send?phone=+91 8600031545&amp;text=Hi,%0a%0aI visited Iggloo at https://iggloo.co.in/ . I am interested in this offer. Do contact me to discuss it further.%0a%0aThanks." target="_blank">
            <span><img src="{{ asset('img/icons/whatsapp.svg') }}" width="25" class="pr-4"> Whatsapp</span>
        </a>
    </div>

    <div class="langMenu is-hidden js-langMenu" data-x="lang" data-x-toggle="is-hidden">
        <div class="langMenu__bg" data-x-click="lang"></div>

        <div class="langMenu__content bg-white rounded-4">
            <div class="d-flex items-center justify-between px-30 py-10 sm:px-15 border-bottom-light">
                <h3>Send Enquiry</h3>
                <button class="pointer" data-x-click="lang">
                    <i class="icon-close"></i>
                </button>
            </div>

            <div class="px-30 py-20 sm:px-15 sm:py-15">                
                <div class="login-box login-box-modal">

                    <div class="row">
                        <div class="col-lg-5 col-md-5 col-sm-12 col-12">
                            <div class="visa-modal-text">                                
                                <div class="text-20 fw-500 lh-15">Why book with us</div>
                            </div>
                            <div class="y-gap-10 mt-20">
                                <div class="d-flex items-center">
                                    <div class="d-flex justify-center items-center border-light rounded-full size-20 mr-10">
                                        <i class="icon-check text-6"></i>
                                    </div>
                                    <p class="text-15 text-dark-1">Complimentary Travel Insurance</p>
                                </div>
                                <div class="d-flex items-center">
                                    <div class="d-flex justify-center items-center border-light rounded-full size-20 mr-10">
                                        <i class="icon-check text-6"></i>
                                    </div>
                                    <p class="text-15 text-dark-1">Personalized Relationship Manager</p>
                                </div>
                                <div class="d-flex items-center">
                                    <div class="d-flex justify-center items-center border-light rounded-full size-20 mr-10">
                                        <i class="icon-check text-6"></i>
                                    </div>
                                    <p class="text-15 text-dark-1">24x7 On Ground Support</p>
                                </div>
                                <div class="d-flex items-center">
                                    <div class="d-flex justify-center items-center border-light rounded-full size-20 mr-10">
                                        <i class="icon-check text-6"></i>
                                    </div>
                                    <p class="text-15 text-dark-1">Rated 4.7 across Social Media Platforms (2500+ Reviews)</p>
                                </div>
                            </div>
                        </div>
                        <div class=" col-lg-7 col-md-7 col-sm-12 col-12">
                            <form id="SendEnquiry" method="POST">
                                <div class="modal-body">
                                    <div class="panel-body pop-up-view no-padding">
                                        <div class="package_det_d_left_form no-padding">
                                            <h5 class="alert custom-success p-2 bg-blue-2 rounded-4 text-center"> 
                                                <a href="tel:+918600031545"><strong>
                                                    <i class="fa fa-phone-square"></i> Call us at : </strong> <span>+91 8600031545</span><span style="opacity: .4;"> | </span>
                                                </a>
                                                <strong class="wts">
                                                    <img width="20" src="{{ asset('img/icons/whatsapp.svg') }}" class="mb-1"></i> 
                                                    <span class="whatsappsize"><a id="" href="https://wa.me/+918600031545?text=Hi %0a%0a I visited  Iggloo  at  https://iggloo.co.in/. I am interested in this offer. Do contact me to discuss it further.Thanks." target="_blank">+91 8600031545 </a></span>
                                                </strong>
                                            </h5>
                                            <div class="mt-10">
                                                <div id="formAlert" class="alert d-none px-5 bg-green-1 fw-500" role="alert"></div>
                                                <div class="row">
                                                    <div class="col-md-12 pdi radio-group">
                                                        <div class="radio-item"><input type="checkbox" class="plan" name="services[]" value="Hotel Booking" checked><label class="radio-label" for="Hotel Booking">Hotel Booking</label></div>
                                                        <div class="radio-item"><input type="checkbox" class="plan" name="services[]" value="Bus Booking"><label class="radio-label" for="Bus Booking">Bus Booking</label></div>
                                                        <div class="radio-item"><input type="checkbox" class="plan" name="services[]" value="Flight"><label class="radio-label" for="Flight">Flight Booking</label></div>
                                                        <div class="radio-item"><input type="checkbox" class="plan" name="services[]" value="Train Booking"><label class="radio-label" for="Train Booking">Train Booking</label></div>
                                                        <div class="radio-item"><input type="checkbox" class="plan" name="services[]" value="Cab Booking"><label class="radio-label" for="Cab Booking">Cab Booking</label></div>
                                                        <div class="radio-item"><input type="checkbox" class="plan" name="services[]" value="Cruise Booking"><label class="radio-label" for="Cruise Booking">Cruise Booking</label></div>
                                                        <div class="radio-item"><input type="checkbox" class="plan" name="services[]" value="Visa Service"><label class="radio-label" for="Visa Service">Visa Service</label></div>
                                                        <div class="radio-item"><input type="checkbox" class="plan" name="services[]" value="Passport Service"><label class="radio-label" for="Passport Service">Passport Service</label></div>
                                                    </div>
                                                </div>

                                                <div class="row py-15">
                                                    <div class="col-sm-4 col-md-3 col-4 no-padding">
                                                        <div class="form-group border-bottom-light m0">
                                                            <select class="form-control" name="prefix">
                                                                <option value="Mr">Mr</option>
                                                                <option value="Mrs">Mrs</option>
                                                                <option value="Miss">Miss</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-12 col-md-5 col-8 no-padding_right">
                                                        <div class="form-group border-bottom-light m0">
                                                            <input autocomplete="off" type="text" name="fname" id="fname" class="form-control" placeholder="First Name *" aria-label="name" maxlength="50" required />
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-12 col-md-4 col-12 no-padding">
                                                        <div class="form-group border-bottom-light m0">
                                                            <input autocomplete="off" type="text" name="lname" id="lname" class="form-control" placeholder="Last Name *" aria-label="name" maxlength="50" required />
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row py-15">
                                                    <div class="col-sm-6 col-md-6 col-12 no-padding_right">
                                                        <div class="form-group border-bottom-light">
                                                            <input class="form-control mr-sm-2" name="mobile" maxlength="10" placeholder="Mobile *" type="tel" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6 col-md-6 col-12 no-padding">
                                                        <div class="form-group border-bottom-light">
                                                            <input type="text" name="email" class="form-control" placeholder="Email Address *" aria-label="Email Address">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row py-15">
                                                    <div class="col-sm-6 col-md-6 col-12 no-padding_right">
                                                        <div class="form-group border-bottom-light">
                                                            <input type="text" name="destination" class="form-control mr-sm-2" maxlength="30" placeholder="Destination" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6 col-md-6 col-12 no-padding">
                                                        <div class="form-group border-bottom-light">
                                                            <input type="text" name="tourist_no" class="form-control" placeholder="No. of Pax" aria-label="No. of Pax" required>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row py-15">
                                                    <div class="col-sm-6 col-md-6 col-12 no-padding_right">
                                                        <div class="form-group border-bottom-light">
                                                            <label class="text-light-1 text-14">From Date:</label>
                                                            <input type="date" name="from_date" placeholder="From Date" aria-label="Travel Date" autocomplete="off">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6 col-md-6 col-12 no-padding">
                                                        <div class="form-group border-bottom-light">
                                                            <label class="text-light-1 text-14">To Date:</label>
                                                            <input type="date" name="end_date" placeholder="To Date" aria-label="Travel Date" autocomplete="off">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row pt-15">
                                                    <button type="submit" class="bg-dark-2 text-white"><i class="fa fa-check-circle"></i> Send Enquiry</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- JavaScript -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAAz77U5XQuEME6TpftaMdX0bBelQxXRlM"></script>
    <script src="https://unpkg.com/@googlemaps/markerclusterer/dist/index.min.js"></script>

    <script src="{{asset('js/vendors.js')}}"></script>
    <script src="{{asset('js/main.js')}}"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function () {

            const form = document.getElementById('SendEnquiry');
            const alertBox = document.getElementById('formAlert');

            form.addEventListener('submit', function (e) {
                e.preventDefault();

                alertBox.className = 'alert d-none';
                alertBox.innerHTML = '';

                // Remove old errors
                document.querySelectorAll('.error-text').forEach(el => el.remove());

                const formData = new FormData(form);

                fetch("{{ route('save.enquiry') }}", {
                    method: "POST",
                    headers: {
                        'X-CSRF-TOKEN': "{{ csrf_token() }}"
                    },
                    body: formData
                })
                .then(response => {
                    if (!response.ok) {
                        return response.json().then(err => { throw err; });
                    }
                    return response.json();
                })
                .then(data => {
                    if (data.status) {
                        showAlert('success', data.message);
                        form.reset();
                    }else{
                        showAlert('danger', 'Something went wrong. Please try again.');
                    }
                })
                .catch(error => {
                    if (error.errors) {
                        Object.keys(error.errors).forEach(function (key) {
                            const field = form.querySelector('[name="' + key + '"]');
                            if (field) {
                                showError(field, error.errors[key][0]);
                            }
                        });
                    } else {
                        showAlert('Something went wrong. Please try again.');
                    }
                });
            });

            function showError(element, message) {
                element.insertAdjacentHTML(
                    'afterend',
                    '<small class="error-text text-danger">' + message + '</small>'
                );
            }

            function showAlert(type, message) {
                alertBox.className = 'alert alert-' + type;
                alertBox.innerHTML = message;
                alertBox.scrollIntoView({ behavior: 'smooth', block: 'center' });
            }

        });
    </script>

    @yield('scripts')

</body>
</html>