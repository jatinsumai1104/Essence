<?php

$command = escapeshellcmd('python nlp/stemming.py shirts');
$output = shell_exec($command);
// echo $command;
echo $output;



?>