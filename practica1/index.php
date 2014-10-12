<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Theme Template for Bootstrap</title>

    <!-- Bootstrap core CSS -->
    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap theme -->
    <link href="../bootstrap/css/bootstrap-theme.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../bootstrap/css/theme.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="../bootstrap/js/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
</html>
<?php
require('encode.php');
if($_GET)
{
$encode = new Encode ();
$encode->decode_get($_SERVER["REQUEST_URI"]);
$idu=$_GET['idu'];
}
else{
    print"<meta http-equiv='refresh' content='0; url=login.php?'>";
}

require('bd.php');


if($_GET)
{
    $encode = new Encode ();
    $encode->decode_get($_SERVER["REQUEST_URI"]);
    $idu=$_GET['idu'];
    if($idu!='')
    {
        setCookie('id',$idu);
        setCookie('acceso',1);
        session_start();
        $_SESSION['id']=$idu;
        $_SESSION['acceso']=1;
        print"<meta http-equiv='refresh' content='0; url=inicio.php'>";
    }
}

?>
<html lang="en">
<body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="../bootstrap/js/bootstrap.min.js"></script>
<script src="../bootstrap/js/docs.min.js"></script>
<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
<script src="../bootstrap/js/ie10-viewport-bug-workaround.js"></script>
</body>
</html>