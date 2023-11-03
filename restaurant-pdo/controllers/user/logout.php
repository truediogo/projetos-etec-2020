<?php
require_once '../../config.php';
unset($_SESSION['id_session']);
unset($_SESSION['role_session']);
header("Location: ../../index.php");