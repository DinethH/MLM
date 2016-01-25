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
    
    if ($amount == 0) {
        $amount = "0-$500";
    } elseif ($amount == 1) {
        $amount = "$500-$1500";
    } elseif ($amount == 2) {
        $amount = "$1500-$2500";
    } elseif ($amount == 3) {
        $amount = "$2500 and above";
    }
    
    if ($start == 0) {
        $start = "0-3 months";
    } elseif ($start == 1) {
        $start = "3-6 months";
    } elseif ($start == 2) {
        $start = "6 months - 1 year";
    }
    
    $message = "
            Referer: $ref<br>
            Name: $name<br>
            Email Address: $emailAddress<br>
            Phone #: $phone<br>
            ZipCode: $zipcode<br>
            Amount interested in investing: $amount<br>
            When they want to get started: $start<br>
            What type of marketing are they interested in: $type<br>
            Why are they interested in Network Marketing: $interest<br>
        ";
    
    
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
    
    //setTo('anna.melton79@hotmail.com', 'Anna Melton')