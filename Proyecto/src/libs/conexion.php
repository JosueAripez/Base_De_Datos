<?php
    $server = "bwv8klhtbp2uj7a8wjik-mysql.services.clever-cloud.com";
    $user = "uwofeqrmud5rdr5q";
    $pass = "Ns3R0AMETjb6hivqQedI";
    $db = "bwv8klhtbp2uj7a8wjik";

    try {	    
        $conn = new PDO("mysql:host=$server;dbname=$db", $user, $pass);        
        // Establece el modo de error del PDO a excepcion
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch(PDOException $e) {        
    	echo "Fallo de conexion: " . $e->getMessage();
        
    }


  










?>