<?php

$name = $_POST['name'];
$number  = $_POST['number'];
$address = $_POST['address'];
$ip_camera = $_POST['ip_camera'];
$ip_capteur_ouvertPorte = $_POST['ip_capteur_ouvertPorte'];
$ip_curtain = $_POST['ip_curtain'];
$ip_light = $_POST['ip_light'];
$ip_capteur_temperature = $_POST['ip_capteur_temperature'];
$ip_detecteur_fumee = $_POST['ip_detecteur_fumee'];

if (!empty($name) || !empty($number) || !empty($address) || !empty($ip_camera) || !empty($ip_capteur_ouvertPorte) || !empty($ip_curtain) || !empty($ip_light) || !empty($ip_capteur_temperature) || !empty($ip_detecteur_fumee))
{

    $host = "localhost";
    $dbusername = "root";
    $dbpassword = "";
    $dbname = "infoenter";

    // Create connection
    $conn = new mysqli ($host, $dbusername, $dbpassword, $dbname);

    if (mysqli_connect_error()){
        die('Connect Error ('. mysqli_connect_errno() .') '
        . mysqli_connect_error());
    }
    else{
        $SELECT = "SELECT number FROM information WHERE number = ? LIMIT 1";
        $INSERT = "INSERT INTO information (name, number, address, ip_camera, ip_capteur_ouvertPorte, ip_curtain, ip_light, ip_capteur_temperature, ip_detecteur_fumee) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";

        $stmt = $conn->prepare($SELECT);
        $stmt->bind_param("s", $number);
        $stmt->execute();
        $stmt->store_result();
        $rnum = $stmt->num_rows;

        if ($rnum == 0) {
            $stmt->close();
            $stmt = $conn->prepare($INSERT);
            $stmt->bind_param("sssssssss", $name, $number, $address, $ip_camera, $ip_capteur_ouvertPorte, $ip_curtain, $ip_light, $ip_capteur_temperature, $ip_detecteur_fumee);
            $stmt->execute();
            echo "New record inserted successfully";
            header("Location: information_update.html");
            exit();
        } else {
            echo "Someone already registered using this phone number";
        }

        $stmt->close();
        $conn->close();
    }
} 
else {
 echo "All field are required";
 die();
}
?>