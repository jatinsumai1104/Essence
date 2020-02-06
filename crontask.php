<?php 
require_once('helper/init.php');
?>
<?php
    $mail = $di->get("Mail");
    $mail->addAddress("2016.jatin.sumai@ves.ac.in");
    // var_dump($base);

    $mail->isHTML(true);                              

    $mail->Subject = 'AdvertiseMent';
    $mail->Body    = '<h2>Essence</h2><br><p>Grab the deals now</p><br><p>Prices of the products in your cart has been lowered</p>';

    if(!$mail->send()) {
        echo 'Message could not be sent.';
        echo 'Mailer Error: ' . $mail->ErrorInfo;
    } else {
        echo 'Message has been sent';
    }
?>
