<?php
    session_start();

    $phrase = trim($_GET['phrase']);

    // function for to generate slug
	function slug($phrase) {
        $phrase = strtolower( preg_replace("/[^a-zA-Z0-9-]/", "-", strtr(utf8_decode(trim($phrase)), utf8_decode("áàãâéêíóôõúüñçÁÀÃÂÉÊÍÓÔÕÚÜÑÇ"),"aaaaeeiooouuncAAAAEEIOOOUUNC-")) );
        $phrase = implode("-",explode("---",trim($phrase,"-")));
        $phrase = implode("-",explode("--",trim($phrase,"-")));

        return $phrase;
	}

    $slug = slug($phrase);
    // if array is empty
    if(sizeof($_SESSION['arr'])==0) {$_SESSION['arr'][] = $slug;}
    // if array is not empty
    else {array_unshift($_SESSION['arr'], $slug);} // the funtion array_unshift add new element in bigin of array

    // go to index page
    require_once("index.php");
