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
    $mail->setTo('anna.melton79@hotmail.com', 'Anna Melton')
         ->setSubject($ref)
         ->setFrom($emailAddress, $name)
         ->addMailHeader('Reply-To', $emailAddress, $name)
         ->addMailHeader('Bcc', 'dineth@sachintha.com', 'dineth@sachintha.com')
         ->addGenericHeader('X-Mailer', 'PHP/' . phpversion())
         ->addGenericHeader('Content-Type', 'text/html; charset="utf-8"')
         ->setMessage($message)
         ->setWrap(78);
    $send = $mail->send();
    
    echo $send;