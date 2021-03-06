<?php

include_once getenv('APP_DUOQ_ROOT_PATH') . '/model/User.php';
include_once getenv('APP_DUOQ_ROOT_PATH') . '/model/UserManager.php';
include_once getenv('APP_DUOQ_ROOT_PATH') . '/model/api/LolApi.php';
include_once getenv('APP_DUOQ_ROOT_PATH') . '/model/Duo.php';
include_once getenv('APP_DUOQ_ROOT_PATH') . '/model/DuoManager.php';
include_once getenv('APP_DUOQ_ROOT_PATH') . '/model/StatsDisplayer.php';
$_SESSION['errorContext'] = "Stats";
$statsDisplay = new StatsDisplayer($db);
LolApi::init($db);

if (isset($_SESSION['loggedUserObjectDuoQ'])) {
    $user = unserialize($_SESSION['loggedUserObjectDuoQ']);
    $duoManager = new DuoManager($db);
    $duoSelect = displayDuoLane($db);
    if (isset($_POST['duoLane'])) {
        $idDuo = $_POST['duoLane'];
        $duo = new Duo(array());
        $duo = $duoManager->getDuoById($idDuo);
        $sum1Id = $duo->getPlayerOneDuo();
        $sum2Id = $duo->getPlayerTwoDuo();
        $player1 = $duoManager->getSummonerFromDb($sum1Id);
        $player2 = $duoManager->getSummonerFromDb($sum2Id);
        $player1Name = $player1['nameSummoner'];
        $player2Name = $player2['nameSummoner'];
        $headerTitle = $player1Name . " & " . $player2Name;
        // init all the duo's stats value ------------------------------------------
        $matches = $statsDisplay->displayMatches($db, $idDuo);
        $totalGameTime = $statsDisplay->getTotalGamingTime($db, $idDuo);
        $totalWins = $statsDisplay->getTotalWins($db, $idDuo);
        $totalDefeat = $statsDisplay->getTotalDefeat($db, $idDuo);
        $totalDomDealt = $statsDisplay->getTotalDomDealt($db, $idDuo);
        $totalGold = $statsDisplay->getTotalGold($db, $idDuo);
        $shareURL = "http://cypressxt.net/DuoQ/index.php?l=sharing&duoId=" . $idDuo;
        //--------------------------------------------------------------------------
    }
    $pageName = "Stats";
    include_once getenv('APP_DUOQ_ROOT_PATH') . '/view/Header.php';
    include_once getenv('APP_DUOQ_ROOT_PATH') . '/view/vStats.php';
    include_once getenv('APP_DUOQ_ROOT_PATH') . '/view/Modal.php';
    include_once getenv('APP_DUOQ_ROOT_PATH') . '/view/Footer.php';
} else {
    $_SESSION['askedPage'] = "stats";
    header('Location: /DuoQ/index.php?l=login');
}


/*
 * This function fill the dropdown list with the user's duo lane
 */

function displayDuoLane($db) {
    $user = unserialize($_SESSION['loggedUserObjectDuoQ']);
    $duoManager = new DuoManager($db);
    $duoArray = $duoManager->getDuoByUser($user);
    $html = '<select name="duoLane" id="duoLane" class="selectpicker" data-style="btn-info">';
    for ($i = 0; $i < count($duoArray); $i++) {
        $sum1 = $duoManager->getSummonerFromDb($duoArray[$i]['playerOneDuo']);
        $sum2 = $duoManager->getSummonerFromDb($duoArray[$i]['playerTwoDuo']);
        $html = $html . '<option value="' . $duoArray[$i]['pkDuo'] . '">' . $sum1['nameSummoner'] . " & " . $sum2['nameSummoner'] . '</option>';
    }
    return $html . '</select>';
}
