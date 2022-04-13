<?php

session_start();
unset($_SESSION['logged_id']);

header('Location: ab_menu_glowne.php');
