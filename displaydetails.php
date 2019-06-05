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
echo "<b>DROP DOWN VALUES FOR ZID'S:</b>";
echo "<form  action='member.php' method='GET'>";
$sql = "select distinct zid from members;";
$result = $conn->query($sql);

if ($result -> rowCount() > 0)
echo "<select name='zid'>";
foreach ($result as $row)
{
        echo "<option name =' ".$row['zid']." '>".$row['zid']."</option>";
        }
echo "</select>";
echo "<input type='submit'>";
echo "</form>";

?>


