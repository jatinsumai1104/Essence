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


$di->set("Cart",new Cart($di));

// $tokenHandler->build();
