<?php
session_start();

if (strtolower($_REQUEST['captcha']) !=  strtolower($_SESSION['captcha'])) {
    echo 0;
} else {
    echo 1;
}
