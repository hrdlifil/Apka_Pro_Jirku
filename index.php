<?php
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <style>
        *{
            box-sizing: border-box;
            padding: 0;
            margin: 0;
        }
        html {

            height: 100%;
            background-image: url("dark.png");
            background-repeat: no-repeat;
            background-position: center;



        }
        body{

            height: 100%;
            padding: 0;
            margin: 0;

        }

        img{
            width: 100vw;
            height: 6vh;
        }

        .header
        {
            height: 6vh;
        }

        .middle
        {
            flex-grow: 1;
        }

        .footer
        {
            height: 6vh;
            width: 100vw;
        }

        .contain
        {
            display: flex;
            height: 100%;
            flex-direction: column;
        }



    </style>
</head>
<body>

<div class="contain">
    <div class="header">

    </div>
    <div class="middle">
    
    </div>
    <div class="footer">
        <img src="pruhy.png">
    </div>
</div>

</body>
</html>