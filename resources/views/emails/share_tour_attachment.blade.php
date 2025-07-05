<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>{{ $tour['tour_name'] }} | {{config('app.name')}}</title>
    <meta name="viewport"
        content="width=device-width, initial-scale=1, user-scalable=no, maximum-scale=1.0, minimum-scale=1.0">
    <meta http - equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">

    {{-- Poppins font --}}
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,500;1,400;1,500;1,600&display=swap" rel="stylesheet">

    {{-- Roboto font --}}
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&family=Roboto+Mono:ital@1&family=Roboto+Serif:opsz@8..144&family=Roboto+Slab&display=swap"
        rel="stylesheet">

    {{-- Manrope font --}}
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@500;600;700&display=swap" rel="stylesheet">

    <style type="text/css">
        body {
            background: #fff;
            margin-top: 2cm;
            margin-left: 1cm;
            margin-right: 1cm;
            margin-bottom: 2cm;
            font-family: 'Poppins', sans-serif;
            font-family: 'Roboto Mono', monospace;
            font-family: 'Roboto Serif', serif;
            font-family: 'Roboto Slab', serif;
            font-family: 'Manrope', sans-serif;
        }

        .wrapper {
            color: #000;
            /* font-family: Poppins; */
            /* text-align: center; */
            width: 98%;
            margin: 0 10px;
        }

        header {
            position: fixed;
            top: 0.5cm;
            height: 1.5cm;
            width: 98%;
            margin: 0 10px;
        }

        /*  */
        .durationBadge {
            background-color: #e0dfdf;
            /* color: #494646b6; */
            color: #228b22;
            font-size: 17px;
            font-weight: 700;
            font-family: 'Roboto Mono', monospace;
            font-family: 'Roboto Serif', serif;
            font-family: 'Roboto Slab', serif;
            border-radius: 30px;
            width: 80px;
            height: 25px;
            text-align: center;
        }

        /*  */

        .tourName {
            color: #039BE5;
            font-size: 35px;
            font-weight: 700;
            font-family: 'Roboto Mono', monospace;
            font-family: 'Roboto Serif', serif;
            font-family: 'Roboto Slab', serif;
        }

        .amenities {
            font-family: 'Roboto Mono', monospace;
            font-family: 'Roboto Serif', serif;
            font-family: 'Roboto Slab', serif;
            color: #228b22;
            font-size: 23px;
            font-weight: 800;
        }

        .date {
            font-size: 17px;
            font-weight: 800;
            font-family: 'Roboto Mono', monospace;
            font-family: 'Roboto Serif', serif;
            font-family: 'Roboto Slab', serif;
        }

        .package {
            margin: 2% 0% 0% 0%;
        }

        .inclExlu {
            text-align: left;
        }

        .dayWise {
            margin: 1% 0% 1% 0%;
        }

        .day {
            border: 1px solid black;
            padding: 0.5%;
            margin-bottom: 0.5%;
        }

        .dayNplace {
            color: #039BE5;
            font-size: 15px;
            /* font-family: 'Poppins', sans-serif; */
            font-family: 'Roboto Mono', monospace;
            font-family: 'Roboto Serif', serif;
            font-family: 'Roboto Slab', serif;
        }

        .end {
            text-align: center;
            margin-top: 2%;
        }

        .contact {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 1% 0% 1% 0%;
        }

        .title {
            font-size: 20px;
            font-weight: 700;
            /* font-family: 'Poppins', sans-serif; */
            font-family: 'Roboto Mono', monospace;
            font-family: 'Roboto Serif', serif;
            font-family: 'Roboto Slab', serif;
            color: #1F95D1;
        }

        .line {
            margin: 1% 0% 1% 0%;
        }

        .goodByeText {
            color: #039BE5;
            text-align: center;
            font-size: 30px;
            /* font-family: 'Poppins', sans-serif; */
            font-family: 'Roboto Mono', monospace;
            font-family: 'Roboto Serif', serif;
            font-family: 'Roboto Slab', serif;
        }

        .page-break {
            page-break-after: always;
        }

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
        <img src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('img/logo/logo_trans.png'))) }}"
            height="60">
    </header>
    <main>
        <div class="wrapper">
            <div class="tourName">{{ $tour['tour_name'] }}</div>
            <div class="durationBadge">
                {{ $tour['nights'] }}N/{{ $tour['days'] }}D
            </div>
            <div class="amenities">
                <span>Amenities: {{ $tour['amenities'] }}</span>
            </div>
            @if ($tour['from_date'])
                <div class="date">
                    Travel date: {{ date('d M Y', strtotime($tour['from_date'])) }}
                </div>
            @endif

            <hr class="line" />
            @if($tour->image)
            <img src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('img/tours/'.$tour->image))) }}" height="400"
                style="border-radius: 8px;">
            @endif
            <div class="package">
                @if ($tour['inclusions'])
                    <div class="inclExlu">
                        <span class="title">Inclusions: </span>
                        <p>{!! nl2br($tour['inclusions']) !!}</p>
                    </div>
                    <hr>
                @endif

                @if ($tour['exclusions'])
                    <div class="inclExlu">
                        <span class="title">Exclusions: </span>
                        <p class="fs-15" style="margin-top: 2px">{!! nl2br($tour['exclusions']) !!}</p>
                    </div>
                    <hr class="line" />
                @endif
            </div>

            <div class="dayWise">

                <div class="title" style="margin-bottom: 2%">Day wise details</div>

                @foreach ($tour->itinerary as $day)
                    <div class="day">
                        <p class="dayNplace">Day {{ $day->day }}:
                            {{ $day->visit_place }}</p>
                        <p class="fs-15" style="margin-top: 2px">{!! $day->description !!}</p>
                    </div>
                @endforeach
            </div>

            <hr class="line" />

            <div class="page-break"></div>

            @if ($tour['note'])
                <div>
                    <div style="text-align: left; margin: 2% 1%">
                        <p class="fs-15 fw-bold" style="margin-bottom: 1px">Note: </p>
                        <p class="fs-15" style="margin-top: 2px">{!! $tour['note'] !!}</p>
                    </div>
                </div>
                <hr class="line" />
            @endif

            <div class="end">
                <div class="title">Contact detail:</div>
                <div class="contact">
                    <span>
                        Call/WhatsApp: <a href="tel:+918600031545">+91 8600031545</a>
                    </span>
                    <span>
                        Email: <a href="mailto:info@rovingsteps.com">info@rovingsteps.com</a>
                    </span>
                </div>
                <div style="text-align: center; margin-bottom: 2%;">
                    <span>
                        Website: <a href="https://rovingsteps.com">www.rovingsteps.com</a>
                    </span>
                </div>

                <hr class="line" />

                <div class="goodByeText">
                    <h5> Tour Ends with Happy and Beautiful Memories. </h5>
                </div>
            </div>
        </div>
    </main>
    <!-- partial -->
    <footer>
        <div class="pagenum-container">
            <div style="font-size: 15px; background: #2786BD; padding: 5px; border-radius: 5px; color: #fff !important;">Call/WhatsApp: +91 8600031545 | Email: info@rovingsteps.com | Website: www.rovingsteps.com</div>
            Page <span class="pagenum"></span>
        </div>
    </footer>
</body>

</html>
