<?php

include_once "../Resource/connect_db.php";
include_once "../Resource/session.php";

session_destroy();
header("Location: login.php");
exit();
