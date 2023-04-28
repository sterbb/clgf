<?php

require_once "controllers/login.controller.php";
require_once "controllers/members.controller.php";
require_once "controllers/template.controller.php";
require_once "controllers/accounts.controller.php";
require_once "controllers/attendee.controller.php";
require_once "controllers/attendance.controller.php";
require_once "controllers/payment.controller.php";
require_once "controllers/report.controller.php";





require_once "models/members.model.php";
require_once "models/login.model.php";
require_once "models/accounts.model.php";
require_once "models/attendee.model.php";
require_once "models/attendance.model.php";
require_once "models/payment.model.php";
require_once "models/report.model.php";




require 'extensions/PHPMailer/src/Exception.php';
require 'extensions/PHPMailer/src/PHPMailer.php';
require 'extensions/PHPMailer/src/SMTP.php';

$template = new ControllerTemplate();
$template -> ctrTemplate();