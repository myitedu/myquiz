@extends('master')
@section('title', 'Welcome to MyQuiz Portal!')
@section('content')

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
                        <div class="form_btn position-absolute">
                            <button type="button" class="prev_btn border-0 text-uppercase overflow-hidden rounded-pill text-white" id="prevBtn" onclick="nextPrev(-1)"><span><i class="fas fa-arrow-left rounded-pill"></i></span> Last
                                Question</button>
                            <button type="button" class="next_btn border-0 text-uppercase overflow-hidden rounded-pill text-white" id="nextBtn"
                                    onclick="nextPrev(1), move()">Next Question</button>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8 pt-5 form_wrapper overflow-hidden">
                    <form class="multisteps_form" id="wizard" method="POST" action="/answers/save">
                        @foreach($questions as $question)
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
                                <div class="question_title py-5 text-white">
                                    <h1 class="text-center text-uppercase overflow-hidden rounded-pill">
                                        {{$question->title}}</h1>
                                </div>
                                <div class="row text-center form_items">
                                    @foreach($question->answers as $answer)
                                    <div class="col-md-6 py-3">
                                        <label id="opt_{{$answer->id}}" class="step_{{$question->id}} bg-white overflow-hidden rounded-pill text-center">
                                           {{$answer->title}}
                                            <input for="opt_{{$answer->id}}" type="radio" name="questions[{{$question->id}}]" value="{{$answer->id}}">
                                        </label>
                                    </div>
                                    @endforeach
                                        <input type="hidden" name="category_id" value="{{$category_id}}">
                                </div>
                            </div>

                        </div>
                        @endforeach











                        <div class="row justify-content-center align-items-center pt-5">
                            <div class="col-md-8">
                                <!-- progress-bar -->
                                <div class="step_progress_bar">
                                    <div class="progress rounded-pill">
                                        <div id="myBar" class="progress-bar rounded-pill overflow-hidden" role="progressbar" style="width: 25%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">25%</div>
                                    </div>
                                </div>
                                <div class="steps_number d-flex justify-content-around">
                                    <div class="step d-flex flex-column align-items-center position-relative text-center">
                                        <span class="text-white position-absolute rounded-pill active">1</span>
                                        <p class="pt-4 active">Question</p>
                                    </div>
                                    <div class="step d-flex flex-column align-items-center position-relative text-center">
                                        <span class="text-white position-absolute rounded-pill">2</span>
                                        <p class="pt-4">Question</p>
                                    </div>
                                    <div class="step d-flex flex-column align-items-center position-relative text-center">
                                        <span class="text-white position-absolute rounded-pill">3</span>
                                        <p class="pt-4">Question</p>
                                    </div>
                                    <div class="step d-flex flex-column align-items-center position-relative text-center">
                                        <span class="text-white position-absolute rounded-pill">4</span>
                                        <p class="pt-4">Question</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{csrf_field()}}
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="../../public/js/tilt.js"></script>
    <script>
        VanillaTilt.init(document.querySelectorAll(".categories"),{
            max: 25,
            speed: 400,
            glare:true,
            "max-glare": 1,
        });
    </script>

    @include('scripts');
@stop
