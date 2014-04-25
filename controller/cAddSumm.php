<?php

//------------------------------------------------------------------------------
//                         Includes & variables                            
//------------------------------------------------------------------------------
include_once 'model/User.php';
include_once 'model/api/LolApi.php';
include_once 'model/api/XmppLeague.php';
$_SESSION['errorContext'] = "New duo queue";
LolApi::init($db);


checkAddSummForm();


if ($_SESSION['loggedUserObject']) {
    $pageName = "Link Account";
    include_once 'view/Header.php';
    include_once 'view/vAddSumm.php';
    checkErrors();
    include_once 'view/Footer.php';
} else {
    header('Location: /DuoQ/index.php?l=login');
}

function checkAddSummForm() {
    if (isset($_POST['submitSumm'])) {
        include_once 'model/api/XmppConnect.php';
        $sumName = $_POST['sumName'];
        $mySumId = LolApi::getSummonerIdByName($sumName);
        $_SESSION['chatSecret'] = sha1(rand());
        xmppLeague::addFriend($mySumId, "here is your secret: " . $_SESSION['chatSecret']);
    }
}

/*
 * This function check if errors append and display them
 */

function checkErrors() {
    if ($_SESSION['errorForm'] != "") {
        include_once 'view/Modal.php';
    }
}