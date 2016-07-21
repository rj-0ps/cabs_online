
        
<?php

$searchID = $_GET['searchfield'];

    
				$host = 'cmslamp14.aut.ac.nz';
                $user = 'npc1326';
                $pass = '7BethLechem^Yeshua^';
                $db = 'npc1326';
                //create connection
                $conn = mysqli_connect($host, $user, $pass, $db);
            
    
  
	// Checks if connection is successful
	if (!$conn) {
		// Displays error message
		echo "<p>Database connection failure</p>";
	} else {
		// else nothing, connection is already successful
		
		
		$query = "select * from cabsonline where bookingnumber = '$searchID'";
		$query2 = "UPDATE cabsonline SET bookingstatus='assigned' WHERE bookingstatus='unassigned' and bookingnumber='$searchID';";
		// executes the query and store result into the result pointer
        //make value 'assigned' before displaying the values from the tables
		$resultupdate = mysqli_query($conn, $query2);
        $result = mysqli_query($conn, $query);
		// checks if the execuion was successful
		if(!$result) {
			echo "<p>Something is wrong with ",	$query, "</p>";
		} else if ($row = mysqli_fetch_assoc($result)){
			// Display the retrieved records
			echo "<p style='background-color:black; color:blue'> The booking request" . $searchID. "has been properly assigned. </p>"; 
			echo "<table>";
			echo "<tr style='background-color:blue'>\n"
				 ."<th scope=\"col\">Name</th>\n"
			     ."<th scope=\"col\">Phone</th>\n"
				 ."<th scope=\"col\">Unit</th>\n"
				 ."<th scope=\"col\">Number</th>\n"
                 ."<th scope=\"col\">Street</th>\n"
                 ."<th scope=\"col\">Suburb</th>\n"
			     ."<th scope=\"col\">Destination</th>\n"
				 ."<th scope=\"col\">Date</th>\n"
				 ."<th scope=\"col\">Time</th>\n"
                 ."<th scope=\"col\">Generated Booking Number</th>\n"
                 ."<th scope=\"col\">Booking Time</th>\n"
                 ."<th scope=\"col\">Booking Date</th>\n"
                 ."<th scope=\"col\">Booking Status</th>\n"
				 ."</tr>\n";

			// _assoc is used instead of _row, so field name can be used
			while ($row = mysqli_fetch_assoc($result)){
				echo "<tr>";
				echo "<td style='background-color:lightblue'>",$row["name"],"</td>";
				echo "<td style='background-color:lightblue'>",$row["phone"],"</td>";
				echo "<td style='background-color:lightblue'>",$row["unit"],"</td>";
				echo "<td style='background-color:lightblue'>",$row["number"],"</td>";
                echo "<td style='background-color:lightblue'>",$row["street"],"</td>";
                echo "<td style='background-color:lightblue'>",$row["suburb"],"</td>";
				echo "<td style='background-color:lightblue'>",$row["dest"],"</td>";
				echo "<td style='background-color:lightblue'>",$row["date"],"</td>";
				echo "<td style='background-color:lightblue'>",$row["time"],"</td>";
                echo "<td style='background-color:lightblue'>",$row["bookingnumber"],"</td>";
                echo "<td style='background-color:lightblue'>",$row["bookingtime"],"</td>";
				echo "<td style='background-color:lightblue'>",$row["bookingdate"],"</td>";
				echo "<td style='background-color:lightblue'>",$row["bookingstatus"],"</td>";
				echo "</tr>";
			}
			echo "</table>";
			// Frees up memory, after using pointer
			mysqli_free_result($result);
		} 
		
		// close the db conection
		mysqli_close($conn);
	} 



?>
