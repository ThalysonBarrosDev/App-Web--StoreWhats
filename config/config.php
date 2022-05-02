<?php

    session_start();

    error_reporting(E_ERROR);

    date_default_timezone_set('America/Sao_Paulo');
    setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'portuguese');

    include_once ('database/Database.php'); // Database
    include_once ('../database/Database.php'); // Database
    include_once ('app/Products.php'); // Index
    include_once ('../app/Products.php'); // Views
    include_once ('app/Checkout.php'); // Index
    include_once ('../app/Checkout.php'); // Views
    include_once ('app/Request.php'); // Index
    include_once ('../app/Request.php'); // Views