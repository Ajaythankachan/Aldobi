<?php
include 'PHPMailerAutoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
if(isset($_POST['send']))
{

$to_id = 'info@aldobi.com';
$email = $_POST['email'];
$name = $_POST['name'];
$phone = $_POST['phone'];
$l_name = $_POST['laundry_name'];
$role = $_POST['role'];
$message = 'Become a aldobi Laundry - Partner';
$subject = 'Partnership';
$mail = new PHPMailer;
$mail->isSMTP();
$mail->Host = 'smtp.gmail.com';
$mail->Port = 587;
$mail->SMTPSecure = 'tls';
$mail->SMTPAuth = true;
$mail->Username = 'aldobimiddlemail@gmail.com';
$mail->Password = 'hjouzbxaxbiegcfu';
$mail->addAddress($to_id);
$mail->Subject = $subject;

$body='<h4>
        <table>
            <tr>
                <td style="color: gray">from</td><td>:</td><td><b>'.$email.'</b></td>
            </tr>
            <tr>
                <td style="color: gray">name</td><td>:</td><td><b>'.$name.'</b></td>
            </tr>
            <tr>
                <td style="color: gray">phone</td><td>:</td><td><b>'.$phone.'</b></td>
            </tr>
            <tr>
                <td style="color: gray">to</td><td>:</td><td>info@aldobi.com</td>
            </tr>
        </table>
       </h4>
       <h3>'.$message.'</h3><p>Contract Role : '.$role.'</p><p>Laundry Name : '.$l_name.'</p>';

	$mail->msgHTML($body);

		if (!$mail->send()) {
		$error = "Mailer Error: " . $mail->ErrorInfo;
		echo '<p id="para"> g- '.$error.'</p>';
			echo '<script>alert("g- '.$error.'"); window.history.back();</script>';
		 	// header("Location: " . $_SERVER["HTTP_REFERER"]);
		}
		else {
			echo '<script> localStorage.setItem("send", 1); window.history.back();</script>';

		 	// header("Location: " . $_SERVER["HTTP_REFERER"]);
		}
	}
	else{
			echo '<script> localStorage.setItem("send", 2); window.history.back();</script>';
		 	// header("Location: " . $_SERVER["HTTP_REFERER"]);
	}

?>