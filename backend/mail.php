<?php
if (isset($_REQUEST['send'])) {
    $name = $_REQUEST['Name'];
    $email = $_REQUEST['email'];
    $subject = $_REQUEST['subject'];
    $message = $_REQUEST['message'];
    $data = "Name : {$name} email: {$email} \n {$message}";
    $to = "sangwan.himanshu98@gmail.com";

    if (mail($to, $subject, $data, $header)) {
        echo <<<alert
            <script> alert("Message sent successfully"); </script>
alert;
    } else {
        echo <<<alert
            <script> alert("Failed to send message!!!"); </script>
alert;
    }
}
?>