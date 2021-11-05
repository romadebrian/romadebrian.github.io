<?php
if ($_POST) {
    $Email = "";
    $Name = "";
    $Isi_Email = "";

    if (isset($_POST['frm_email'])) {
        $Email = str_replace(array("\r", "\n", "%0a", "%0d"), '', $_POST['frm_email']);
        $Email = filter_var($Email, FILTER_VALIDATE_EMAIL);
    }

    if (isset($_POST['frm_name'])) {
        $Name = filter_var($_POST['frm_name'], FILTER_SANITIZE_STRING);
    }

    if (isset($_POST['visitor_message'])) {
        $visitor_message = htmlspecialchars($_POST['visitor_message']);
    }

    if ($concerned_department == "billing") {
        $recipient = "billing@domain.com";
    } else if ($concerned_department == "marketing") {
        $recipient = "marketing@domain.com";
    } else if ($concerned_department == "technical support") {
        $recipient = "tech.support@domain.com";
    } else {
        $recipient = "contact@domain.com";
    }

    $headers  = 'MIME-Version: 1.0' . "\r\n"
        . 'Content-type: text/html; charset=utf-8' . "\r\n"
        . 'From: ' . $visitor_email . "\r\n";

    if (mail($recipient, $email_title, $visitor_message, $headers)) {
        echo "<p>Thank you for contacting us, $visitor_name. You will get a reply within 24 hours.</p>";
    } else {
        echo '<p>We are sorry but the email did not go through.</p>';
    }
} else {
    echo '<p>Something went wrong</p>';
}
