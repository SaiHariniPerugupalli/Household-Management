<html>
<head>
<title>Insert a Member</title>
<style type="text/css">
table {
margin: 8px;
}
input[type=text], select {
    width: 25%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}

input[type=submit] {
    width: 25%;
    background-color: #4CAF50;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}
table {
    border-collapse: collapse;
    width: 75%;
}

th, td {
    text-align: left;
    padding: 8px;
}

tr:nth-child(even){background-color: #f2f2f2}

th {
    background-color: #4CAF50;
    color: white;
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

echo "<h3> Add a member and his schedule </h3>";
echo "<form action='' method='GET'>";
echo " Enter the Aid:<br> <input type='text' placeholder= 'Aid..' required='required' name='aid' id='aid'> </br>";
echo " Enter the Hours: <br><input type='text' placeholder= 'hours' name='hours' id='hours'> </br>";
echo " Enter the Workplace:<br> <input type='text' placeholder= 'work place' name='workplace' id='workplace'> </br>";
echo " Enter the Pay: <br><input type='text' placeholder= 'pay' name='pay' id='pay'> </br>";
echo " Enter the Name: <br><input type='text' placeholder= 'name' name='name' id='name'> </br>";
echo " Enter the Zid: <br><input type='text' placeholder= 'zid...' name='zid' id='zid'> </br>";
echo " Enter the Location: <br><input type='text' placeholder= 'location' name='location' id='location'> </br>";
echo " Enter the Phone: <br><input type='text' placeholder= 'phone' name='phone' id='phone'> </br>";

echo "<input type= 'Submit' value='Submit'>";
echo "</form>";


$sql = "INSERT INTO job (aid, pay, hours, workplace) VALUES (?,?,?,?);";
$sql1 = "INSERT INTO members (aid,zid, name, location, phone) VALUES (?,?,?,?,?);";
$stmt = $conn->prepare($sql);
$stmt2 = $conn->prepare($sql1);
$aid = $_GET['aid'];
$add = $stmt->execute(array($_GET['aid'],$_GET['pay'],$_GET['hours'],$_GET['workplace']));
$add2 = $stmt2->execute(array($_GET['aid'],$_GET['zid'],$_GET['name'],$_GET['location'],$_GET['phone']));

echo "<h3><i>A member has been added:</i><h3>";
//echo "<br><br>";
echo "<b>Table showing the Job info</b> ";
$sql = "select job.aid,pay,hours,workplace,zid, name, location, phone from job,members where job.aid = members.aid group by job.aid;";
$result = $conn->query($sql);
$result1 = $conn->query($sql1);
if ($result -> rowCount() > 0)
{
echo "<table border = '1'><tr>";
echo "<th>Aid</th>";
echo "<th>Pay</th>";
echo "<th>Hours</th>";
echo "<th>Work Place</th>";
echo "<th>Zid</th>";
echo "<th>Name</th>";
echo "<th>Location</th>";
echo "<th>Phone</th>";
echo "</tr>";
while($row = $result->fetch())
{
echo "<tr>";
echo "<td>".$row['aid']."</td>";
echo "<td>".$row['pay']."</td>";
echo "<td>".$row['hours']."</td>";
echo "<td>".$row['workplace']."</td>";
echo "<td>".$row['zid']."</td>";
echo "<td>".$row['name']."</td>";
echo "<td>".$row['location']."</td>";
echo "<td>".$row['phone']."</td>";
echo "</tr>";
}
echo "</table>";
}
?>
