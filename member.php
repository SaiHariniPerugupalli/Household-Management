<html>
<head>
<title>ADDING A MEMBER</title>
<style type="text/css">
table {
margin: 8px;
}

th {
font-family: Arial, Helvetica, sans-serif;
font-size: 1em;
background: #666;
color: #FFF;
padding: 2px 6px;
border-collapse: separate;
border: 2px red solid;
}

td {
font-family: Arial, Helvetica, sans-serif;
font-size: 1em;
border: 1px blue solid;
}
</style>
</head>
<body>
<?php
$username = "z1829025";
$password = "1996May04";
$dbname = "z1829025";

try{
        $conn = new PDO("mysql:host=students;dbname=$dbname", $username, $password);

        }
catch(PDOException $e){
        echo "Connection failed: " . $e->getMessage();
         }

$num = $_GET['zid'];
//echo $num;

$sql = "select members.zid, members.name, members.location, schedule.cooking, schedule.cleaning, schedule.Day from members, schedule where members.zid=schedule.zid and members.zid = ?;";
$prepared = $conn->prepare($sql);
$result = $prepared->execute((array($num)));
//echo "<h3>Details of the member $num</h3>";
if($prepared->rowCount() != NULL){
echo "<h3>DETAILS OF THE MEMBER</h3>";
echo "<h3>ZID NUMBER: $num</h3>";
echo "<table border = '1'; class = 'table'>";
echo "<tr>";
echo "<th>zid</th>";
echo "<th>name</th>";
echo "<th>location</th>";
echo "<th>cooking</th>";
echo "<th>cleaning</th>";
echo "<th>Day</th>";
echo "</tr>";
while(($row = $prepared->fetch())){
echo "<tr>";
echo "<td>".$row['zid']."</td>";
echo "<td>".$row['name']."</td>";
echo "<td>".$row['location']."</td>";
echo "<td>".$row['cooking']."</td>";
echo "<td>".$row['cleaning']."</td>";
echo "<td>".$row['Day']."</td>";
echo "</tr>";
}
echo "</table>";
}
/*$stmt = $conn->prepare($sql);
if ($stmt->execute(array($_GET['zid']))) {
  while ($row = $stmt->fetch()) {
    echo $row['name'];
  }
}*/

?>
</body>
</html>
