@extends('frontend.layouts.app')

@section('title', app_name() . ' | ' .'Subject File')

@section('content')

<main>
    <!-- Hero Start-->
    <div class="slider-area slider-bg ">
        <div class="single-slider d-flex align-items-center slider-height2 ">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="hero-cap text-center pt-50">
                            <h2>{{ $school_name }} School</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Slider Shape -->
        <div class="slider-shape d-none d-lg-block">
            <img class="slider-shape1" src="{{ asset('./img/hero/top-left-shape.png') }}" alt="">
            <img class="slider-shape2" src="{{ asset('./img/hero/right-top-shape.png') }}" alt="">
            <img class="slider-shape3" src="{{ asset('./img/hero/left-botom-shape.png') }}" alt="">
        </div>
    </div>

    <div class="container pt-3">
        <div class="row">
            <div class="col-lg-12 col-xs-12 col-sm-8 ">
                <ul class="event-list">
                    @if ($school_data == null)
                    <div class="alert alert-info alert-dismissible fade show" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            <span class="sr-only">Close</span>
                        </button>
                        <strong>No file Found!</strong> There is no Data currently available in the school directory.
                    </div>
                    @else
                    @foreach ($school_data as $item)

                    <li>
                        <time datetime="{{ $item['file_property']['last_modified'] }}">
                            <span class="day">{{ $item['file_property']['last_modified']->day }}</span>
                            <span class="month">{{ $item['file_property']['last_modified']->month }}</span>
                            <span class="year">{{ $item['file_property']['last_modified']->year }}</span>
                            <span class="time">12:00 AM</span>
                        </time>
                        <div class="info">
                            <h2 class="title">{{ $item['file_name'] }}</h2>

                            <p class="desc">{{ $item['school_subject'] }}</p>
                            <p class="desc">{{ $item['file_property']['size'] }} &nbsp<span
                                    class="badge badge-info">{{ Str::afterLast($item['file_name'],'.') }}</span></p>
                            <ul>
                                <li style="width:50%;"><a href="{{ url($item['subject_files_destination'])  }}"
                                        target="_new"><span class="fa fa-money"></span> Download</li></a>
                            </ul>
                        </div>
                        <div class="social">
                            <ul class="pt-2 pb-1" style="background:#020230; !important;">
                                {!! Share::currentPage(null, ['class' => 'p-2'])->facebook() !!}
                                {!! Share::currentPage()->telegram() !!}
                                {!! Share::currentPage()->whatsapp() !!}

                            </ul>
                        </div>
                    </li>
                    @endforeach


                    @endif



                </ul>
            </div>
        </div>
    </div>

</main>
@endsection

<style>
    .event-list {
        list-style: none;
        font-family: 'Lato', sans-serif;
        margin: 0px;
        padding: 0px;
    }

    .event-list>li {
        background-color: rgb(255, 255, 255);
        box-shadow: 0px 0px 5px rgb(51, 51, 51);
        box-shadow: 0px 0px 5px rgba(51, 51, 51, 0.7);
        padding: 0px;
        margin: 0px 0px 20px;
    }

    .event-list>li>time {
        display: inline-block;
        width: 100%;
        color: rgb(255, 255, 255);
        background-color: rgb(197, 44, 102);
        padding: 5px;
        text-align: center;
        text-transform: uppercase;
    }

    .event-list>li:nth-child(even)>time {
        background-color: #020230;
    }

    .event-list>li>time>span {
        display: none;
    }

    .event-list>li>time>.day {
        display: block;
        font-size: 56pt;
        font-weight: 100;
        line-height: 1;
    }

    .event-list>li time>.month {
        display: block;
        font-size: 24pt;
        font-weight: 900;
        line-height: 1;
    }

    .event-list>li>img {
        width: 100%;
    }

    .event-list>li>.info {
        padding-top: 5px;
        text-align: center;
    }

    .event-list>li>.info>.title {
        font-size: 17pt;
        font-weight: 700;
        margin: 0px;
    }

    .event-list>li>.info>.desc {
        font-size: 13pt;
        font-weight: 300;
        margin: 0px;
    }

    .event-list>li>.info>ul,
    .event-list>li>.social>ul {
        display: table;
        list-style: none;
        margin: 10px 0px 0px;
        padding: 0px;
        width: 100%;
        text-align: center;
    }

    .event-list>li>.social>ul {
        margin: 0px;
    }

    .event-list>li>.info>ul>li,
    .event-list>li>.social>ul>li {
        display: table-cell;
        cursor: pointer;
        color: rgb(30, 30, 30);
        font-size: 11pt;
        font-weight: 300;
        padding: 3px 0px;
    }

    .event-list>li>.info>ul>li>a {
        display: block;
        width: 100%;
        color: rgb(30, 30, 30);
        text-decoration: none;
    }

    .event-list>li>.social>ul>li {
        padding: 0px;
    }

    .event-list>li>.social>ul>li>a {
        padding: 3px 0px;
    }

    .event-list>li>.info>ul>li:hover,
    .event-list>li>.social>ul>li:hover {
        color: rgb(30, 30, 30);
        background-color: rgb(200, 200, 200);
    }

    .facebook a,
    .twitter a,
    .telegram a {
        display: block;
        width: 100%;
        color: rgb(75, 110, 168) !important;
    }

    .twitter a {
        color: rgb(79, 213, 248) !important;
    }

    .telegram a {
        color: #2aa1da !important;
    }

    .facebook:hover a {
        color: rgb(255, 255, 255) !important;
        background-color: rgb(75, 110, 168) !important;
    }

    .twitter:hover a {
        color: rgb(255, 255, 255) !important;
        background-color: rgb(79, 213, 248) !important;
    }

    .telegram:hover a {
        color: rgb(255, 255, 255) !important;
        background-color: #2aa1da !important;
    }

    @media (min-width: 768px) {
        .event-list>li {
            position: relative;
            display: block;
            width: 100%;
            height: 120px;
            padding: 0px;
        }

        .event-list>li>time,
        .event-list>li>img {
            display: inline-block;
        }

        .event-list>li>time,
        .event-list>li>img {
            width: 120px;
            float: left;
        }

        .event-list>li>.info {
            background-color: rgb(245, 245, 245);
            overflow: hidden;
        }

        .event-list>li>time,
        .event-list>li>img {
            width: 120px;
            height: 120px;
            padding: 0px;
            margin: 0px;
        }

        .event-list>li>.info {
            position: relative;
            height: 120px;
            text-align: left;
            padding-right: 40px;
        }

        .event-list>li>.info>.title,
        .event-list>li>.info>.desc {
            padding: 0px 10px;
        }

        .event-list>li>.info>ul {
            position: absolute;
            left: 0px;
            bottom: 0px;
        }

        .event-list>li>.social {
            position: absolute;
            top: 0px;
            right: 0px;
            display: block;
            width: 40px;
        }

        .event-list>li>.social>ul {
            border-left: 1px solid rgb(230, 230, 230);
        }

        .event-list>li>.social>ul>li {
            display: block;
            padding: 0px;
        }

        .event-list>li>.social>ul>li>a {
            display: block;
            width: 40px;
            padding: 10px 0px 9px;
        }
    }
</style>