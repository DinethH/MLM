<?php

    require_once 'SimpleMail.php';
    
    $ref = $_GET['ref'];
    $name = $_GET['name'];
    $emailAddress = $_GET['email'];
    $phone = $_GET['phone'];
    $zipcode = $_GET['zipcode'];
    $amount = $_GET['amount'];
    $start = $_GET['start'];
    $type = $_GET['type'];
    $interest = $_GET['interest'];
    
    $message = $name."<br>".$emailAddress."<br>".$phone."<br>".$zipcode."<br>".$amount."<br>".$start."<br>".$type."<br>".$interest;
    
    
    $mail = new SimpleMail();
    $mail->setTo($emailAddress, $emailAddress)
         ->setSubject($ref)
         ->setFrom('mlm001@mlm-dinethh.c9users.io', 'mlm001')
         ->addMailHeader('Reply-To', 'mlm001@mlm-dinethh.c9users.io', 'mlm001')
         ->addMailHeader('Bcc', 'dineth@sachintha.com', 'dineth@sachintha.com')
         ->addGenericHeader('X-Mailer', 'PHP/' . phpversion())
         ->addGenericHeader('Content-Type', 'text/html; charset="utf-8"')
         ->setMessage($message)
         ->setWrap(78);
    $send = $mail->send();