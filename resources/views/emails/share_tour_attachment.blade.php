<!DOCTYPE html>
<html lang="en" >
<head>
    <meta charset="UTF-8">
    <title>CodePen - Static Page Layout Example</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no, maximum-scale=1.0, minimum-scale=1.0">
    <meta http - equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <style>
        body {
          background: #fff;
          margin: 0;
        }

        .wrapper {
          color: #000;
          /* font-family: Poppins; */
          text-align: center;
          width: 98%;
          margin: 0 10px;
        }

        header {
            position: fixed;
            top: 0cm;
            left: 0cm;
            right: 0cm;
            height: 1.5cm;
            /** Extra personal styles **/
            text-align: center;
        }

         /** Define now the real margins of every page in the PDF **/
         body {
            margin-top: 2cm;
            margin-left: 2cm;
            margin-right: 2cm;
            margin-bottom: 2cm;
        }

        /* header:after {
          content: '';
          display: inline-block;
          vertical-align: middle;
          width: 1px;
          height: 100%;
          margin: 0 0 0 -5px;
        }

        header > div {
          float: left;
          height: 100px;
          background: green;
        }

        header > div:after {
          content: '';
          display: inline-block;
          vertical-align: middle;
          width: 1px;
          height: 100%;
          margin: 0 0 0 -5px;
        }

        nav,
        section {
          float: left;
          padding: 200px 0;
        }

        nav {
          width: 200px;
          margin-right: 10px;
        }

        section {
          width: 100%;
        } */
        /**************************************
        CSS TO MAKE THE EXAMPLE LOOK PRETTY
        **************************************/

        /* *,
        *:before,
        *:after {
          -moz-box-sizing: border-box;
          -webkit-box-sizing: border-box;
          box-sizing: border-box;
        }

        header,
        nav,
        section {
          border: 1px solid rgb(203 203 203);
          margin-bottom: 10px;
          border-radius: 3px;
        }
        .fs-15{ font-size: 15px }
        .fw-bold{ font-weight: bold } */

        /** Define the footer rules **/
        footer {
            position: fixed;
            bottom: 0cm;
            left: 0cm;
            right: 0cm;
            height: 1cm;

            /** Extra personal styles **/
            /* background-color: #eaeaea; */
            color: black;
            text-align: center;
            /* line-height: 1.5cm; */
        }
        footer .pagenum:before {
            content: counter(page);
        }
    </style>
</head>
<body>
    <header>
        <img src="data:image/png;base64,{{base64_encode(file_get_contents(public_path('img/logo/logo_trans.png')))}}" height="40">
    </header>
    <main>
    <!-- partial:index.partial.html -->
    <div class="wrapper">
        <p>Call/WhatsApp: <a href="tel:+918600031545">+91 8600031545</a> | Email: <a href="mailto:info@rovingsteps.com">info@rovingsteps.com</a> | Website: <a href="https://rovingsteps.com">www.rovingsteps.com</a></p>
        <hr>
        <h1 style="text-align: center;">{{$tour['tour_name']}}</h1>
        <!-- <img src="{{public_path('img/tours/'.$tour['image'])}}" height="400" style="border-radius: 8px;"> -->
        <img src="data:image/png;base64,{{base64_encode(file_get_contents($tour->image_path))}}" height="400" style="border-radius: 8px;">
        <div>
            <h4 class="fw-bold">{{$tour['amenities']}}</h4>
            <hr>
            <p class="fs-15">Dubai...Where everything Glitters... Dazzling Dubai is where the ancient Arabic culture & tradition sit side by side with the modern infrastructure. Our Dubai Tours are memorable for all times to come, for we make you taste the Arabic delicacies, travel the paths of Gold Souk, thrill at Desert Safari, experience the stunning feat of architecture- the Burj Khalifa, the iconic Burj al-Arab, Palm Jumeirah & more. With Kesari, you will not only see Dubai you will experience it! The Dhow Dinner Cruise, the Desert Dune Safari, the Dubai Fountain Show and Snow World are some of the highlights of our Dubai Tour packages. The Dubai Shopping Festival and Ferrari Park are entertaining elements that are added to enhance your Dubai Tours.</p>

            <table role="presentation" border="0" cellpadding="0" cellspacing="0" width="100%">
                <tbody><tr>
                    <td valign="top" width="33.333%" style="padding-top: 20px; border: 1px solid #aaa; margin: 20px 0px;" class="services">
                        <table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%">
                            <tbody>
                                <tr>
                                    <td class="text-services">
                                        <h3 style="border-bottom: 1px solid #aaaaaa30; text-align: center">Price</h3>
                                        <div style="text-align: center;">
                                            <h5 style="margin-bottom: 0">Adult: Rs. {{number_format($tour['adult_price'])}}</h5>
                                            @if($tour['child_price'])<h5>Child: Rs. {{number_format($tour['child_price'])}}</h5>@endif
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                    <td valign="top" width="33.333%" style="padding-top: 20px; border: 1px solid #aaa; margin: 20px 0px; background: rgba(0,0,0,.08);" class="services">
                        <table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%">
                            <tbody>
                                <tr>
                                    <td class="text-services">
                                        <h3 style="border-bottom: 1px solid #aaaaaa30; text-align: center">Duration</h3>
                                        <div style="text-align: center;">
                                            <h5 style="margin-bottom: 0">{{$tour['days']}} Days</h5>
                                            <h5>{{$tour['nights']}} Nights</h5>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                    <td valign="top" width="33.333%" style="padding-top: 20px; border: 1px solid #aaa; margin: 20px 0px;" class="services">
                        <table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%">
                            <tbody>
                                <tr>
                                    <td class="text-services">
                                        <h3 style="border-bottom: 1px solid #aaaaaa30; text-align: center">Date</h3>
                                        <div style="text-align: center;">
                                            @if($tour['from_date'])
                                            <h5 style="margin-bottom: 0">{{date('d M Y', strtotime($tour['from_date']))}} TO</h5>
                                            <h5>{{date('d M Y', strtotime($tour['end_date']))}}</h5>
                                            @else
                                            NA
                                            @endif
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr></tbody>
            </table>

            <h3 style="font-weight: bold;">Tour Itinerary</h3>
            @foreach($tour->itinerary as $day)
            <div style="text-align: left; margin: 2% 1%">
                <p class="fs-15 fw-bold" style="margin-bottom: 1px">Day {{$day->day}}: {{$day->visit_place}}</p>
                <p class="fs-15" style="margin-top: 2px">{!! $day->description !!}</p>
            </div>
            @endforeach
            <hr>

            @if($tour['inclusions'])
            <div style="text-align: left; margin: 2% 1%">
                <p class="fs-15 fw-bold" style="margin-bottom: 1px">Inclusions: </p>
                <p class="fs-15" style="margin-top: 2px">{!! $tour['inclusions'] !!}</p>
            </div>
            <hr>
            @endif

            @if($tour['exclusions'])
            <div style="text-align: left; margin: 2% 1%">
                <p class="fs-15 fw-bold" style="margin-bottom: 1px">Exclusions: </p>
                <p class="fs-15" style="margin-top: 2px">{!! $tour['exclusions'] !!}</p>
            </div>
            <hr>
            @endif

            @if($tour['note'])
            <div style="text-align: left; margin: 2% 1%">
                <p class="fs-15 fw-bold" style="margin-bottom: 1px">Note: </p>
                <p class="fs-15" style="margin-top: 2px">{!! $tour['note'] !!}</p>
            </div>
            @endif

            <div style="text-align: center; line-height: 0.5;">
                <h3> Thank you & Regards. </h3>
                <h4> Looking forward to treat you a great pleasure</h4>
            </div>
        </div>
    </div>
    </main>
    <!-- partial -->
    <footer>
        <div class="pagenum-container">Page <span class="pagenum"></span></div>
    </footer>
</body>
</html>
