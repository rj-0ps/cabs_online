<!--file data.php -->
<?php

//$value = $_GET['query'];
//$formfield = $_GET['field'];
$namefield = $_GET['namefield'];
$phonefield = $_GET['phonefield'];
$unitfield = $_GET['unitfield'];
$numberfield = $_GET['numberfield'];
$streetfield = $_GET['streetfield'];
$suburbfield = $_GET['suburbfield'];
$destfield = $_GET['destfield'];
$day = $_GET['dayfield'];
$month = $_GET['monthfield'];
$year = $_GET['yearfield'];
$hour = $_GET['hourfield'];
$minute = $_GET['minutefield'];
$datefield = $day . "/" . $month . "/" .  $year;
$timefield = $hour . $minute;
date_default_timezone_set('Pacific/Auckland');
$date = date('d/m/Y');
$time = date('Hi');
$number = rand(1,1000);
$status = "unassigned";






//enter all data into my sql database
    
				$host = 'cmslamp14.aut.ac.nz';
                $user = 'npc1326';
                $pass = '';
                $db = 'npc1326';
                //create connection
                $conn = mysqli_connect($host, $user, $pass, $db);




    // Check connection

    if ($conn->connect_error) {

        die("Connection failure: " . $conn->connect_error);
        return false;

    } else {

        $inject = "INSERT INTO cabsonline (name, phone, unit, number, street, suburb, dest, date, time, bookingnumber, bookingtime, bookingdate, bookingstatus)
        VALUES ('$namefield', '$phonefield', '$unitfield', '$numberfield', '$streetfield', '$suburbfield', '$destfield', '$datefield', '$timefield', '$number', '$time', '$date', '$status')"; 


        if (mysqli_query($conn, $inject)) {
            
        } else {
            echo "Error: " . $inject . "<br>" . mysqli_error($conn);
        }
        
        if ($conn->query($inject) === TRUE) {
            echo "<div style='background-color:green; color:white'> <b>Thank You! Your Booking Reference Number is : </b>".$number.". You will be picked up
			in front of your provided address at ".$destfield. " on ".$timefield."\n <br>";
            
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
                }

    }



        
        




    
    
    

    
        
?>