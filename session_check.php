<?php 
    @session_start();
    $sessionFetch = '';
    if(isset($_SESSION['sadmun']))
    {
        $sessionFetch = $_SESSION['sadmun'];
    }
    elseif(isset($_SESSION['admty'])){
        $sessionFetch = $_SESSION['admty'];
    }
    elseif(isset($_SESSION['doc_username']))
    {
        $sessionFetch = $_SESSION['doc_username'];
    }
   
?>