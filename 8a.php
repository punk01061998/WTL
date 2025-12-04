<?php
$counterFile="counter.txt";

if(!file_exists($counterFile))
{
    file_put_contents($counterFile,"0");
}

$currentCount=(int)file_get_contents($counterFile);
$newCount=$currentCount+1;

file_put_contents($counterFile,$newCount);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body{
            margin:0;
            padding-top:180px;
            background-color:#f4f4f9;
            text-align:center;
        }
        .container{
            width:50%;
            padding:10px;
            margin:0 auto;
            border-radius:8px;
            box-shadow:0px 0px 15px rgba(0,0,0,0.1);
            background:#fff;
        }
            /* body{
        width: 50%;
        margin:18% auto;
        }
        .container{
            margin:0 auto;
            width: 50%;
            border-radius:4px;
            box-shadow:0px 0px 15px rgba(0,0,15);
            padding: 70px;
        } */
    </style>
</head>
<body>
    <div class="container">
        <h1>Welcome to our website</h1>
        <p>You are visitor number: <strong><?php echo $newCount ?></strong> </p>
    </div>
</body>
</html>