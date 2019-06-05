
<html>
<head>
<title>DELETING A MEMBER</title>
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
$servername = "students";
$username = "z1829025";
$password = "1996May04";
$dbname = "z1829025";

try {
    $link = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $link->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}

echo "<b><p align = 'center' >SELECT A MEMBER TO BE DELETED:</p></b>";
$sql = "SELECT zid from members;";
$result = $link->query($sql);
echo "<b><p align = 'center'>ZiD:</p></b>";
echo "<form method = 'get' action = '' align = 'center' >";
if($result -> rowCount()>0)
{
echo "<select name = 'zid'>";
while($row = $result->fetch())
{
echo "<option value='".$row['zid'] ."'>".$row['zid']."</option>";
}
echo "</select><br>";
echo "<input type = 'Submit' name = 'Submit'>";
}
echo "</form>";

$sql = "DELETE FROM schedule WHERE zid = ?;";
$sql2 = "DELETE FROM members WHERE zid = ?;";
$stmt = $link->prepare($sql);
$stmt2 = $link->prepare($sql2);
$add = $stmt->execute(array($_GET['zid']));
$add2 = $stmt2->execute(array($_GET['zid']));
echo "<b><i>A member has been deleted:</i><b>";
echo "<br><br>";
$sql = "SELECT zid, aid, name, location, phone FROM members;";
$result = $link->query($sql);
echo "Deleted!!";
if ($result -> rowCount() > 0)
{
echo "<table border = '1'><tr>";
echo "<th>zid</th>";
echo "<th>aid</th>";
echo "<th>name</th>";
echo "<th>location</th>";
echo "<th>phone</th>";
echo "</tr>";
while($row = $result->fetch())
//print_r($row);
{
echo "<tr>";
echo "<td>".$row['zid']."</td>";
echo "<td>".$row['aid']."</td>";
echo "<td>".$row['name']."</td>";
echo "<td>".$row['location']."</td>";
echo "<td>".$row['phone']."</td>";
echo "</tr>";
}
echo "</table>";
}
//</body>
//</html>
