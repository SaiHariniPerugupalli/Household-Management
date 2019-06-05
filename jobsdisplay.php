<html>
<head>
<title>DISPLAYING DETAILS</title>
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
echo "<table style='border: solid 1px black;'>";
echo "<h3>JOB DETAILS DISPLAY:</h3>";
echo "<tr><th>aid</th><th>pay</th><th>hours</th><th>workplace</th></tr>";

class TableRows extends RecursiveIteratorIterator { 
    function __construct($it) { 
        parent::__construct($it, self::LEAVES_ONLY); 
    }

    function current() {
        return "<td style='width:150px;border:1px solid black;'>" . parent::current(). "</td>";
    }

    function beginChildren() { 
        echo "<tr>"; 
    } 

    function endChildren() { 
        echo "</tr>" . "\n";
    } 
} 

$servername = "students";
$username = "z1829025";
$password = "1996May04";
$dbname = "z1829025";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $conn->prepare("SELECT aid, pay, hours, workplace FROM job"); 
    $stmt->execute();

    // set the resulting array to associative
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC); 
    foreach(new TableRows(new RecursiveArrayIterator($stmt->fetchAll())) as $k=>$v) { 
        echo $v;
    }
}
catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}
$conn = null;
echo "</table>";
?>
</body>
</html>
