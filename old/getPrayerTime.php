<?php

$config = parse_ini_file("config.ini", true);
$dbConfig = $config['db'];

$con = mysqli_connect($dbConfig['host'], $dbConfig['user'], $dbConfig['password']) or die('db connection !!!');
$con->select_db('igmg');

$date = new DateTime();
if (isset($_GET['date'])) {
    $date = DateTime::createFromFormat('d.m.Y', $_GET['date']);
}

$dateString = $date->format('Y-m-d');
$q = $con->prepare("select * from prayer_times where `date` = ?" );
$q->bind_param('s', $dateString);
$q->execute();

echo json_encode($q->get_result()->fetch_assoc());

