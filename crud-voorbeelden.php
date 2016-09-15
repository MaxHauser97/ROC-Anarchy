<?php
//Verbinden met de database
$servername = "localhost";
$dbusername = "root";
$dbpassword = "root";
$db = "newDB";

$conn = new mysqli($servername, $dbusername, $dbpassword, $db);
//------------------------------


//Tabel aanmaken
$tabel_Employees = "CREATE table Employees(
	EmployeeID INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
	LastName  VARCHAR(30) NOT NULL,
	FirstName  VARCHAR(30) NOT NULL,	
	Password  VARCHAR(30) NOT NULL,	
	Email VARCHAR(50),
	Reg_date TIMESTAMP
)";


// if ($conn->query($tabel_Employees) === TRUE) { echo "Table created successfully";
// } else { echo "Error creating table: " . $conn->error;}
//---------------

//Nieuwe record toevoegen
$nieuwe_Employee = "INSERT INTO Employees 
								  	(LastName,FirstName,Password,Email)
									VALUES
									('Burgsma','Amy','Geheim95','a.burgsma@web.nl')
								";
											
//if($conn->query($nieuwe_Employee) === TRUE){echo "";}
//else{echo "Error ".$conn->error;}
//--------------------------

//selecteer record
$selecteer_Employee = "SELECT * FROM Employees";
$result = $conn->query($selecteer_Employee);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "ID: " . $row["EmployeeID"]. " - Firstname: " . $row["FirstName"].
				 " - Email: " . $row["Email"]." - Password: " . $row["Password"]. "<br>";
    }
} else {
    echo "0 results";
}


$update_Employee = "UPDATE Employees SET LastName='Van Kurk', FirstName='Kevin', Email='kevinvankurk@web.nl', Password='R00d123!'  WHERE EmployeeID=2";

if ($conn->query($update_Employee) === TRUE) {
    echo "";
} else {
    echo "Error updating record: " . mysqli_error($conn);
}



// sql to delete a record
$delete_Employee = "DELETE FROM Employees WHERE EmployeeID>4";

if ($conn->query($delete_Employee) === TRUE) {
    echo "";
} else {
    echo "Error deleting record: " . $conn->error;
}

$conn->close();


?>