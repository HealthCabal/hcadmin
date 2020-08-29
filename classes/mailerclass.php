<?php

/*
 * @author Chinoms
 * https://chinoms.com
 */

/**
 * This class handles all the mail functions for this app.
 *
 * @author Chinoms
 */
class mailerClass {

    function notifyAdmin($email) {
        $trnxn = $conn->query("SELECT * FROM transactions ORDER BY id DESC LIMIT 0, 1");
        $trnxnData = $trnxn->fetch_object();
        $fullname = $trnxnData->fullname;
        $amount = $trnxnData->amount;
        $phone = $trnxnData->phone;
        $item = $trnxnData->item;
        $network = $trnxnData->network;
        $method = $trnxnData->method;
        $time = $trnxnData->dateandtime;

        $to = $email;
        $subject = "New VTU Transaction";

        $message = "
<html>
<head>
 <link href='https://fonts.googleapis.com/css?family=Coustard' rel='stylesheet' type='text/css'>
 <link href='https://fonts.googleapis.com/css?family=Raleway:400,300' rel='stylesheet' type='text/css'>
  <style>
            body{
                background-color: white;
                font-family: 'Coustard', Raleway;
            }
           
        </style>
<title>New Transaction</title>
</head>
<body>
<center><img src='https://tutorkings.com.ng/assets/images/static/logo.png' height='100'></center>
<br>
<div style='margin-left:20%; margin-right:20%'>
<p style='text-align: justify'>Hi, admin.</p>
<p style='text-align: justify'>This is a notification that a transaction has taken place on your site. The following are the
details of the transaction:</p>
<ul>
<li>Full name: ".$fullname."</li>
<li>Amount: ".$amount."</li>
<li>Phone: ".$phone."</li>
<li>Item: ".$item."</li>
<li>Network: ".$network."</li>
<li>Method: ".$method."</li>
<li>Time: ".$time."</li>
</ul>

</body>
</html>";


           // Set content-type header for sending HTML email
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "From: IPCD VTU<ipcd.technology@gmail.com>" ."\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

  mail($to, $subject, $message, $headers);
        }

    function newTutorAlert($adminemail) {
        $adminemail = "chinoms925@gmail.com";
        $to = $adminemail;
        $subject = "New Trabsaction";

        $message = "
<html>
<head>
<title>New Tutor Signup</title>
</head>
<body>
<center><img src='https://tutorkings.com.ng/assets/images/static/logo.png' height='100'></center>
<br>
<div style='margin-left:20%; margin-right:20%'>
<p style='text-align: justify'>Hello.</p>
<p style='text-align: justify'>A new tutor has signed up for TutorKings.</p>
<br>
<i>The TutorKings Team</i>
</body>
</html>
";


        // Set content-type header for sending HTML email
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "From: TutorKings<admin@tutorkings.com.ng>" ."\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";


        mail($to, $subject, $message, $headers);
    
    }

}

$sendMail = new mailerClass();
