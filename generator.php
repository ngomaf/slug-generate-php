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
    $_SESSION['arr'][] = $slug;

    // requisition o index page
    require_once("index.php");
