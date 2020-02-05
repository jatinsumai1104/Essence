<?php
session_start();

require_once(__DIR__."/requirements.php");
Session::start_session();
$di = new DependencyInjector();
$di->set("Database", new Database());
$di->set("Hash", new Hash($di));
$di->set("ErrorHandler", new ErrorHandler($di));
$di->set("Auth", new Auth($di));
// $di->set("TokenHandler", new TokenHandler($database, $hash));
$di->set("UserHelper", new UserHelper($di));
$di->set("Mail", MailConfigHelper::getMailer());
$di->set("Validator", new Validator($di));

$di->set("Doctor",new Doctor($di));
$di->set("Patient",new Patient($di));
$di->set("Appointment",new Appointment($di));
$di->set("Specialization",new Specialization($di));


$di->set("Event",new Event($di));
$di->set("UserSpecific",new UserSpecific($di));
// $tokenHandler->build();
