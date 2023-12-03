<?php
if (isset($_POST['search'])) {
    $selectedItem = $_POST['selectedItem'];

    $host = "localhost";
    $dbusername = "root";
    $dbpassword = "";
    $dbname = "infoenter";

    $conn = new mysqli($host, $dbusername, $dbpassword, $dbname);

    if (mysqli_connect_error()) {
        die('Connect Error (' . mysqli_connect_errno() . ') ' . mysqli_connect_error());
    } else {
        $sql = "SELECT ip_camera, ip_capteur_ouvertPorte, ip_curtain, ip_light, ip_capteur_temperature, ip_detecteur_fumee FROM information";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                if ($selectedItem == "Light") {
                    echo "IP Light: " . $row['ip_light'] . "<br>";
                } elseif ($selectedItem == "Camera") {
                    echo "IP Camera: " . $row['ip_camera'] . "<br>";
                } elseif ($selectedItem == "Curtain") {
                    echo "IP Curtain: " . $row['ip_curtain'] . "<br>";
                } elseif ($selectedItem == "Capteur Ouvert Porte") {
                    echo "IP Capteur Ouvert Porte: " . $row['ip_capteur_ouvertPorte'] . "<br>";
                } elseif ($selectedItem == "Capteur Temperature") {
                    echo "IP Capteur Temperature: " . $row['ip_capteur_temperature'] . "<br>";
                } elseif ($selectedItem == "Detecteur Fumee") {
                    echo "IP Detecteur Fumee: " . $row['ip_detecteur_fumee'] . "<br>";
                }
            }
        } else {
            echo "0 results";
        }

        $conn->close();
    }
}
?>