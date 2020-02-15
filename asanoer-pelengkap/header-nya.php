<?php
defined('ASANOER_NAMA_APLIKASI') or exit('Tidak dapat diakses langsung !!!');
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="<?php echo(ASANOER_NAMA_APLIKASI." - ".ASANOER_VERSI_APLIKASI)?>">
    <meta name="author" content="<?php echo(ASANOER_EMAIL_AUTHOR)?>">

    <title>ASANOER CRUD - SPA</title>

    <!-- Bootstrap Core CSS -->
    <link href="<?php echo ASANOER_TEMA; ?>bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="<?php echo ASANOER_TEMA; ?>metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?php echo ASANOER_TEMA; ?>sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="<?php echo ASANOER_TEMA; ?>font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]--> 

    <style type="text/css">
        .asanoer-loading-teks {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            min-height:50px;
            color: #222; 
            background-color: #F9EDBE; 
            padding: 5px 10px; 
            font: 20px Arial; 
            text-align: center;
            border: 1px solid #F0C36D; 
            z-index:12346;
        }
        #footer {
            position: fixed;
            left: 0;
            bottom: 0;
            min-height:50px;
            width: 100%; 
            padding: 5px 10px; 
            font: 20px Arial; 
            text-align: center;
            border: 1px solid #F0C36D; 
            z-index:12344;
        }
    </style> 
</head>