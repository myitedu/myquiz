@extends('master')
@section('title', 'Welcome to MyQuiz Portal!')
@section('content')

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <div class="bubles">
        @for($i=10; $i<100; $i++)


            <span style="--i:{{$i}}">
                <i class="material-icons snow">ac_unit</i>
            </span>
        @endfor

    </div>


    <div class="wrapper overflow-hidden position-relative">
        <div class="container-fluid p-0">
            <div class="row">
                <div class="col-lg-4">
                    <div class="steps_area step_area_fixed">
                        <div class="form_logo position-absolute ps-5 pt-5">
                            <img class="d-none d-lg-block" src="/quizo/version-10/assets/images/logo/logo.png" alt="image_not_found">
                        </div>
                        <div class="image_holder">
                            <img class="overflow-hidden d-none d-lg-block" src="/quizo/version-10/assets/images/background/bg_0.png" alt="image_not_found">
                        </div>
                    </div>
                </div>
                <div class="col-lg-8 pt-5 form_wrapper overflow-hidden">
                    <form class="multisteps_form" id="wizard" method="POST" action="/quizo/thankyou/index-1.html">
                        <!-------------------- Step-1 --------------------->
                        <div class="multisteps_form_panel">
                            <div class="step_content text-center pt-3">
                                <h4>Welcome to MYQuiz!</h4>
                                <div class="count_clock">
                                    <img src="/quizo/version-10/assets/images/clock/clock.png" alt="image-not-found">
                                </div>
                                <div class="count_number countdown_timer pt-1" data-countdown="2022/10/24"></div>
                            </div>
                            <div class="form_content">
                                @foreach($categories as $category)
                                 @php
                                    $has_question = count($category->questions)?1:0;
                                 @endphp


                                <div data-has_questions="{{$has_question}}" data-category_id="{{$category->id}}" class="categories">{{$category->title}} ({{count($category->questions)}})</div>
                                @endforeach

                            </div>
                        </div>
                        <!-- ------------------ Step-2 ------------------- -->

                        <!-- ------------------ Step-3 ------------------- -->

                        <!-- ------------------ Step-1 ------------------- -->


                    </form>
                </div>
            </div>
        </div>
    </div>



    @include('tilt')


    @include('scripts')
@stop
