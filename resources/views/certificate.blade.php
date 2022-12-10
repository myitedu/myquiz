<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Jon Toshmatov</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</head>
<body>
<div class="container">
    <div id="certificate">
        <div class="moveable student_name">Jon Toshmatov</div>
        <div class="moveable text1">for completing the <span>History</span> Quiz Succeesfully</div>
        <div class="row text2">
            <div class="col-6 moveable date">
                <div class="text_date">12/09/2022</div>
            </div>
            <div class="col-6 moveable signature">
                <div class="text_signature">
                    <img src="/img/signature.jpg" alt="Jon Toshmatov CEO">
                </div>
            </div>
        </div>

    </div>
</div>

<style>

.text_signature img{
    width: 140px;
}

    .text_signature{
        width: 173px;
        margin: auto;
        text-align: center;
        position: relative;
        top: -20px;
        left: -30px;
        border-bottom: 1px solid black;
    }
    .text_date{
        width: 173px;
        margin: auto;
        text-align: center;
        border-bottom: 1px solid black;
    }

    .text2{
        top: 520px;
        text-align: center;
        margin: auto;
        font-size: 20px;
        position: relative;
    }
    .text1 span{
        background-color: yellow;
        color: darkred;
        padding:1px;
        font-weight: bolder;
    }

    .text1{
        top: 466px;
        width: 70%;
        text-align: center;
        margin: auto;
        font-size: 19px;
    }

    .student_name{
        top: 420px;
        width: 70%;
        text-align: center;
        margin: auto;
        font-size: 30px;
    }
    .moveable{
        position: relative;

    }
    #certificate{
        width: 900px;
        height: 700px;
        border: 1px solid black;
        margin: 100px auto;
        background-image: url("/img/blank_certificate.png");
        background-size: 100% 100%;
    }
</style>

</body>
</html>
