<?php
if ($_POST) {
    $Email = "";
    $Name = "";
    $Pesan = "";
    $Email_Penerima = "roma_coll04@yahoo.com";

    if (isset($_POST['frm_email'])) {
        $Email = str_replace(array("\r", "\n", "%0a", "%0d"), '', $_POST['frm_email']);
        $Email = filter_var($Email, FILTER_VALIDATE_EMAIL);
    }

    if (isset($_POST['frm_name'])) {
        $Name = filter_var($_POST['frm_name'], FILTER_SANITIZE_STRING);
    }

    if (isset($_POST['frm_pesan'])) {
        $Pesan = htmlspecialchars($_POST['frm_pesan']);
    }

    $headers  = "From: " . $Email;

    if (mail($Email_Penerima, "Contact Roma Github", $Pesan, $headers)) {
        echo "<p>Thank you for contacting us, $Email. You will get a reply within 24 hours.</p>";
    } else {
        echo '<p>We are sorry but the email did not go through.</p>';
    }
} else {
    echo '<p>Something went wrong</p>';
}
