@extends('master')
@section('title', 'Thank you!')
@section('content')

    <div class="container myresult">
        <div class="container">
            <div class="row">
                <h4>Your Quiz Results</h4>
                <hr>
                <nav>
                    <a href="/">HOME</a>
                </nav>
                <hr>
                <table class="table table-bordered">
                    <tr>
                        <th>ID</th>
                        <th>Question</th>
                        <th>Answers</th>
                        <th>Status</th>
                    </tr>

                    @php
                        $total_correct_answers = 0;
						$total_qustions = $answers->count();
                    @endphp
                    @foreach($answers as $answer)
                        <tr>
                            <td>1</td>
                            <td>{{$answer->question->title}}</td>
                            <td>
                                @php
                                    $results = $answer->answers;
									$is_correct = 1;
                                @endphp
                                <ul>
                                    @foreach($results as $result)
                                        @if($result->correct == 1)
                                            <li class="correct_answer">{{$result->title}}</li>
                                        @elseif($result->correct != 1 && $answer->answer_id == $result->id)
                                            <li class="wrong_answer">{{$result->title}}</li>
                                            @else
                                            <li>{{$result->title}}</li>
                                        @endif
                                    @endforeach
                                </ul>
                            </td>
                            <td>
                                @php
                                    $is_correct = ($answer->answers()->where('id',$answer->answer_id)->first()->correct)??false;
									if ($is_correct){
										$total_correct_answers++;
									}
                                @endphp
                                @if ($is_correct)
                                <img class="check_icon"
                                     src="https://upload.wikimedia.org/wikipedia/commons/thumb/b/b0/Light_green_check.svg/768px-Light_green_check.svg.png"
                                     alt="correct answer">
                                @else
                                    <img class="check_icon" src="http://www.clker.com/cliparts/1/1/9/2/12065738771352376078Arnoud999_Right_or_wrong_5.svg.med.png" alt="wrong answer">
                                @endif

                            </td>
                        </tr>
                    @endforeach

                    <tr>
                        <td class="report_title" colspan="3">Total Questions: </td>
                        <td class="report_numbers">{{$answers->count()}}</td>
                    </tr>
                    <tr>
                        <td class="report_title"  colspan="3">Total Correct Answers: </td>
                        <td class="report_numbers">{{$total_correct_answers}}</td>
                    </tr>

                    <tr>
                        <td class="report_title"  colspan="3">Correct Answers by %: </td>
                        <td class="report_numbers">
                            @php
                                $percent = $total_correct_answers / $total_qustions * 100;
								$percent = round($percent);
								$passed = 'Failed';
								if ($percent>=75){
									$passed = 'Passed';
								}
                            @endphp
                            {{$percent}}%
                        </td>
                    </tr>
                    <tr>
                        <td class="report_title"  colspan="3">Pass/Fail: </td>
                        <td class="report_numbers">{{$passed}}</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>

    <style>

        .report_numbers{
            color: #0a53be;
            text-align: center;
        }

        .report_title{
            text-align: right;
            font-weight: bolder;
        }


        H4 {
            text-align: center;
            padding-top: 5px;
            color: #054141;
        }

        th {
            background-color: darkred !important;
            color: gold;
        }

        .myresult {
            background-color: whitesmoke;
            padding: 5px;
            border-radius: 15px;
            border: 3px solid black;
            margin-top: 50px;
        }

        .check_icon {
            width: 50px;
        }

        body {
            background-color: black;
        }
        .correct_answer{
            text-decoration: underline;
            color: darkgreen;
        }
        .wrong_answer{

            color: darkred;
            text-decoration: line-through;
        }
    </style>
    @include('scripts')
@stop
