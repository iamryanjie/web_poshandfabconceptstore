<?php
include("db.php");

session_start();
// $username = $_POST['uname'];
// $password = $_POST['psw'];

$query = "SELECT * FROM tbl_useraccounts";
$result = mysqli_query($db, $query);
$field = mysqli_num_fields($result);

$number_of_fields = mysqli_num_fields($result);
$headers = array();
array_push($headers, "test");
while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
	// echo $row['col_firstname'];
	// array_push($headers, 13);
}
foreach($headers as $key => $value)
{
  echo " has the value". $value;
}

$csv_export = '';
$csv_fileName = "testing.csv";
header('Content-Type: text/csv');
header("Content-Disposition: attachment; filename=".$csv_fileName."");
$fp = fopen('php://output', 'w');
fputcsv($fp, $headers);
while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
    fputcsv($fp, array_values($row));
}


// while ($property = mysqli_fetch_field($result)) {
//     echo $property->name;
// }
// $csv_export.= '';
// while($row = mysql_fetch_array($query)) {
//   // create line with field values
//   for($i = 0; $i < $field; $i++) {
//     $csv_export.= '"'.$row[mysql_field_name($query,$i)].'";';
//   } 
//   $csv_export.= ''; 
// }

// Export the data and prompt a csv file for download

// echo($csv_export);














$result = mysqli_query($conn,"SELECT emp_nr, SUM(az) 
FROM az_konto 
WHERE date BETWEEN '2018-01-01 00:00:00' AND '2018-01-31 23:59:59' 
GROUP BY emp_nr ASC");

echo "<table border='1'>
<tr>
<th>Mitarbeiter NR</th>
<th>Stunden im Monat</th>
</tr>";

while($row = mysqli_fetch_array($result))
{
$emp_nr=$row['emp_nr'];
$az=$row['SUM(az)'];
echo "<tr>";
echo "<td>" . $emp_nr . "</td>";
echo "<td>" . $az . "</td>";
echo "</tr>";
}
echo "</table>";
$conn->close();


?>