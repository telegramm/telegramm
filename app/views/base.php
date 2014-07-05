<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!--<link rel="shortcut icon" href="../../assets/ico/favicon.ico">-->

    <title>telegramm</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">

    <link rel="stylesheet" href="/assets/css/style.css">

    <!-- Custom styles for this template -->

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>
<div id="top">
    <div class="container">
        <div class="telegramm-line">
            <form method="post" id="sender">
                <label id="ind" style="width: 16px; text-align: center;">
                    <span>#</span>
                    <img src="/assets/img/ajax-loader.gif" style="display: none;" />
                </label>
                <input name="command" type="text" placeholder="send your telegramm" autocomplete="off" />
            </form>
        </div>
    </div>
</div>
<div class="container">

    <div class="log" >
        <div class="entry" style="display: none;">
            <div class="telegramm">sudo composer install</div>
            <div class="time">12:34 21.06.2014</div>
            <pre>Stdin</pre>
        </div>

    </div>
</div>

<div id="footer">
    <div class="container">
        <p>©telegramm 2014</p>
    </div>
</div>

<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
<script src="/assets/js/telegramm.js"></script>
</body>
</html>
