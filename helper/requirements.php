<?php

$app = __DIR__;

// Helper Class
require_once "{$app}/../classes/includes/Database.php";
require_once "{$app}/../classes/includes/Hash.php";
require_once "{$app}/../classes/includes/ErrorHandler.php";
require_once "{$app}/../classes/includes/Validator.php";
require_once "{$app}/../classes/includes/Auth.php";
// require_once "{$app}/../classes/includes/TokenHandler.php";
require_once "{$app}/../classes/includes/UserHelper.php";
require_once "{$app}/../classes/includes/MailConfigHelper.php";
require_once "{$app}/../classes/includes/Util.php";
require_once "{$app}/../classes/includes/DependencyInjector.php";
require_once "{$app}/../classes/includes/Session.php";



// Project Related Classes
require_once "{$app}/../classes/controllers/web/Doctor.php";
require_once "{$app}/../classes/controllers/web/Patient.php";
require_once "{$app}/../classes/controllers/web/Appointment.php";
require_once "{$app}/../classes/controllers/web/Specialization.php";
require_once "{$app}/../classes/controllers/web/Event.php";