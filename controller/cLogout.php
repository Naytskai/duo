<?php

//------------------------------------------------------------------------------
//                         Destroy the current session                              
//------------------------------------------------------------------------------
session_start();
$_SESSION['loggedUserObjectDuoQ'] = null;
unset($_SESSION);
session_destroy();
//------------------------------------------------------------------------------
//                         Redirect user after logout                              
//------------------------------------------------------------------------------
header('Location: /DuoQ/');
