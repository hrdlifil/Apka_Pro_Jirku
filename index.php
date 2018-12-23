<?php
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <style>
        *
        {
            box-sizing: border-box;
            padding: 0;
            margin: 0;
        }

        html
        {
            height: 100%;
            background-image: url("dark.png");
            background-repeat: no-repeat;
            background-position: center;
        }

        body
        {
            height: 100%;
            padding: 0;
            margin: 0;
        }

        img
        {
            padding: 0;
            margin: 0;
        }

        img#pruhy
        {
            width: 100vw;
            height: 100%;
        }

        img#zluta
        {
            width: 100vw;
            height: 9vh;
        }

        img#logo
        {
            height: 60px;
            width: 150px;
            position: absolute;
            top: 0.6vh;
            left: 4.5vw;
            transform: scale(1.5);
        }

        img#telefon
        {
            height: 60px;
            width: 150px;
            position: absolute;
            top: 0.8vh;
            right: 4.5vw;
            transform: scale(1.5);

        }


        .header
        {
            display: flex;
            flex-direction: column;
        }

        #pruhy_nahore
        {
            width: 100vw;
            height: 3vh;
            position: relative;
            bottom: 2px;
        }

        .middle
        {
            flex-grow: 2;
            flex-direction: column;
            display: flex;
            justify-content: center;
            align-items: center;
            align-content: center;
            flex-wrap: wrap;
        }

        .footer
        {
            display: flex;
            height: 3vh;
        }

        .contain
        {
            display: flex;
            height: 100%;
            flex-direction: column;
        }

        .loga
        {
            height: 200px;
            width: 170px;

        }

        #upper_row
        {
             width: 700px;
             display: flex;
             justify-content: space-between;
             margin-bottom: 6vw;
         }

        #lower_row
        {
            width: 700px;
            display: flex;
            justify-content: space-between;
        }



    </style>
</head>
<body>
<div class="contain">
    <div class="header">
        <img id="zluta" src="zluta.png"><img id="logo" src="samonil.svg"><img id="telefon" src="telefon.svg"><img id="pruhy_nahore" src="pruhy.png">
    </div>
    <div class="middle">
        <div id="upper_row">
            <img class="loga" id="logo1" src="logo1.png">
            <img class="loga" id="logo2" src="logo2.png">
            <img class="loga" id="logo3" src="logo3.png">
        </div>
        <div id="lower_row">
            <img class="loga" id="logo4" src="logo4.png">
            <img class="loga" id="logo5" src="logo5.png">
            <img class="loga" id="logo5" src="logo6.png">
        </div>
    </div>
    <div class="footer">
        <img id="pruhy" src="pruhy.png">
    </div>
</div>
</body>
</html>