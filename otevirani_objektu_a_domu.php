<?php
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Otevirani objektu a domu</title>
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
            transition-property: transform;
            transition-duration: 500ms;
            transition-delay: 100ms;
            transition-timing-function: ease-in-out;

        }

        .loga:hover
        {
            cursor: pointer;
            transform: scale(1.2);

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


    </div>
    <div class="footer">
        <img id="pruhy" src="pruhy.png">
    </div>
</div>
</body>
</html>