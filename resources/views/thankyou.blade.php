<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</head>
<body>
<div id="thankyou">
    <table class="table table-bordered">
        <h4>Your test results</h4>
        <tr>
            <th>Question</th>
            <th>Answer</th>
            <th>Correct</th>
        </tr>
        @php
            $total_correct = 0;
            $total_questions = 0;
        @endphp
        @foreach($results as $result)
            @php
                $correct_img = ($result->answer->correct)?'https://www.shareicon.net/data/2016/08/20/817721_check_512x512.png':'https://cdn2.iconfinder.com/data/icons/pointed-edge-web-navigation/101/cross-red-512.png';
                $total_correct+=$result->answer->correct;
                $total_questions++;
                $percentage = 100 * ($total_correct /$total_questions ) ;
                $x = number_format($percentage, 2) ;
                if ($x >= 75.00 ){
                    echo '<body style="background-color:darkseagreen">';
                }else if ($x < 75.00 ){
                    echo '<body style="background-color:darkred">';
                } else {
                    echo "Something is wrong!" ;
                }
            @endphp
            <tr>
                <td>{{$result->question->title}}</td>
                <td>{{$result->answer->title}}</td>
                <td><img class="correct_answer" src="{{$correct_img}}" alt="correct"></td>
            </tr>
        @endforeach
        <tr>
            <td  colspan="3">
                @php
                if ($x >= 75){
                    echo "<p><font size=30px color=green>$x%</font></p>";
                }else {
                    echo "<p><font size=30px color=red>$x%</font></p>";
                }
                @endphp
            </td>
        </tr>
    </table>
</div>
<style>

    tr:last-child td{
        text-align: center;
        padding-right: 20px;

    }
    .correct_answer{
        width: 50px;
    }
    #thankyou{
        text-align: center;
        top: 20%;
        left: 30%;
        width: 400px;
        height: auto;
        min-height: 500px;
        position: absolute;
        border-radius: 5px;
        padding-bottom: 10px;
        box-shadow: 0 0 10px 2px ;
        background-color: white;
    }
</style>
</body>
</html>
