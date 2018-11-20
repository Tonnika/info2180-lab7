<?php
$country =$_GET['country'];
$all = $_GET['all'];

$host = getenv('IP');
$username = getenv('C9_USER');
$password = '';
$dbname = 'world';

$conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
if($all == "true"){
    $pstring =$conn->query( "SELECT * FROM countries");
    $results = $pstring->fetchAll(PDO::FETCH_ASSOC);
    echo '<ul>';
    foreach ($results as $row) {
         echo '<li>' . $row['name'] . ' is ruled by ' . $row['head_of_state'] . '</li>';
    }
}
else{
    $pstring ="SELECT * FROM countries WHERE name LIKE '%".$country."%'";
    $results = $pstring->fetchAll(PDO::FETCH_ASSOC);
    echo '<ul>';
    foreach ($results as $row) {
        if($row['name']==$country){
         echo '<li>' . $row['name'] . ' is ruled by ' . $row['head_of_state'] . '</li>';
    }
}
}
