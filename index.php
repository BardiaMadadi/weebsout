<?php

$json = json_decode(file_get_contents('./source/answers.json'), true);
$weebs = 0;
$notWeeb = 0;
$all = 0;
foreach ($json as $answer) {
    $all++;
    if ($answer["weeb"] == true) {
        $weebs++;
    } else {
        $notWeeb++;
    }
}

$messageNotWeeb = " {$notWeeb} نفر به ویب نبودن رای دادند  ";
$messagebeWeeb = " {$weebs} نفر به ویب بودن رای دادند  ";
$weebPercent = $weebs / $all * 100; 
$notweebPercent = $notWeeb / $all * 100; 

?>




<!DOCTYPE html>
<html dir="rtl" lang="ar">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> weebs out </title>
</head>

<body>

    <style>
        * {
            margin: 0;
            padding: 0;
        }

        body {
            overflow-x: hidden;
        }

        @font-face {
            font-family: iranYekan;
            src: url(IRANYekanRegular.woff);
        }

        .head {
            width: 100vw;
            height: 500px;
            margin-bottom: 50px;

        }

        .weeb {
            background-color: #00b4ff;
            height: 100%;
            float: left;
            position: relative;
            margin-bottom: 50px;
        }

        .notweeb {
            background-color: #ff00de;
            height: 100%;
            float: right;
            position: relative;
            margin-bottom: 50px;
        }

        .para {
            color: white;
            font-size: 50px;
            text-align: center;
            height: fit-content;
            width: fit-content;
            position: absolute;
            left: 50%;
            top: 50%;
            transform: translate(-50%, -50%);
            font-family: iranYekan;
            font-weight: bolder;
            direction: rtl;

        }

        form {
            width: 80%;
            height: fit-content;
            margin-left: auto;
            margin-right: auto;
            padding: 20px;
        }



        .select {

            font-family: iranYekan;
            font-weight: bolder;
            width: 300px;
            height: 100px;
            border-radius: 20px;
            display: block;
            text-align: center;
            margin-left: auto;
            margin-right: auto;
            border-style: none;
            margin-top: 30px;
            font-size: 30px;
            background-color: #e0d7d7;

        }

        .option {
            font-family: iranYekan;

            font-weight: bolder;
            border-radius: 20px;
            text-align: center;
            border-style: none;
            background-color: #e0d7d7;
        }

        .inp {
            font-family: iranYekan;
            font-weight: bolder;
            text-align: right;
            width: 90%;
            height: 200px;
            font-size: 30px;
            display: block;
            margin-right: auto;
            margin-left: auto;
            border-radius: 5000px;
            margin-top: 100px;
            border-style: none;
            background-color: #e0d7d7;


            overflow: auto;


        }

        button {
            color: white;
            font-family: iranYekan;
            font-weight: bolder;
            width: 300px;
            height: 100px;
            border-radius: 20px;
            display: block;
            text-align: center;
            margin-left: auto;
            margin-right: auto;
            border-style: none;
            margin-top: 30px;
            background-color: #e0d7d7;
            font-size: 30px;
            background-color: #00ff54;
        }



        .footer {

            font-family: iranYekan;
            font-weight: bolder;
            text-align: right;
            width: 90%;
            height: 500px;
            font-size: 30px;
            display: block;
            margin-right: auto;
            margin-left: auto;
            border-radius: 50px;
            margin-top: 100px;
            border-style: none;

            background-color: #e0d7d7;

            overflow: auto;

        }

        .card {
            width: 100%;
            height: 100px;
            background-color: yellow;
        }

        .cardP {

            color: #222;
            font-size: 50px;
            font-family: iranYekan;
            font-weight: bolder;

        }
    </style>

    <div class="head">

        <div style="width: <?= $notweebPercent ?>%;" class="weeb">
            <p class="para"><?= $messageNotWeeb ?></p>
        </div>
        <div style="width: <?= $weebPercent ?>%;" class="notweeb">
            <p class="para"><?= $messagebeWeeb ?></p>
        </div>
        <?php if(!isset($_COOKIE["answer"])) { ?>

        <form action="./API/senanswer.php" method="post">

            <input placeholder="توضیحات شما" name="inp" class="inp" type="text">
            <select class="select" name="ans" id="cars">
                <option class="option" value="not"> ویب نبودن </option>
                <option class="option" value="be"> ویب بودن </option>
            </select>
            <button type="submit"> پایان </button>

        </form>
       <?php } ?>
        <br>
        <br>
        <br>
        <br>

        <div class="footer">
            <?php foreach($json as $answer){ ?>
            <p class="cardP"><?= $answer["message"] ?></p>
            <?php } ?>

        </div>

    </div>






</body>

</html>
