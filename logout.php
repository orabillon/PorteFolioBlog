<?php
    session_start(); // initialise

    session_unset(); // desactive

    session_destroy(); // detruit 

    setcookie("Auth", time() - 42); // destruction cookie

    header('location: moi');
	exit();
