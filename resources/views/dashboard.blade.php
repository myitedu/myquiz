<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
Hello {{$user->name}}!
<hr>
@foreach($answers as $answer)
        @php
            $cid = $answer->category->id;
            $qids = $questions->where('category_id',$cid);



        @endphp

    <div class="category">{{$answer->category->title}} <button>PRINT CERTIFICATE</button></div>
@endforeach


<style>
    .category{
        width: 150px;
        height: 150px;
        border: 1px solid black;
        display: inline-block;
        margin: 10px;
        padding:10px;
        text-align: center;
        font-size: 120%;
        font-weight: bolder;
        border-radius: 20px;
        box-shadow: 5px 5px 5px 5px black;
    }
</style>

</body>
</html>
