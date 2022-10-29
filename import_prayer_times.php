<?php

$config = parse_ini_file("config.ini", true);
$dbConfig = $config['db'];

$con = mysqli_connect($dbConfig['host'], $dbConfig['user'], $dbConfig['password']) or die('db connection !!!');
$con->select_db('igmg');

$igmgApiUrl = 'https://live.igmgapp.org:8091/api/Calendar/GetPrayerTimes?cityID=20038&from=19.07.2022&to=19.08.2022';

$ch = curl_init($igmgApiUrl);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    'X-API-Key: 50db7eaa4e0748e890920a910f84c4c9',
));
$response = curl_exec($ch);
curl_close ($ch);

if (curl_error($ch) != null) {
    exit('Igmg api can not be called');
}

$data = json_decode($response, true);
$data = $data['list'];

foreach ($data as $item) {

    $date = DateTime::createFromFormat('d.m.Y', $item['date']);
    $q = $con->query("select count(*) as cnt from prayer_times where `date` = " . $date->format('Y-m-d'));
    $r = $q->fetch_assoc();

    if ($r['cnt'] == 0) {
        // insert
        $query  = "
        INSERT INTO prayer_times 
            (cityName, `date`, fajr, sunrise, dhuhr, asr, maghrib, ishaa)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?)
        ON DUPLICATE KEY UPDATE
            fajr = fajr, 
            sunrise = sunrise, 
            dhuhr = dhuhr, 
            asr = asr, 
            maghrib = maghrib, 
            ishaa = ishaa
        ";
        $stmt = $con->prepare($query);
        $dateStr = $date->format('Y-m-d');
        $cityName = $item['cityName'];
        $fajr = $item['fajr'];
        $sunrise = $item['sunrise'];
        $dhuhr = $item['dhuhr'];
        $asr = $item['asr'];
        $maghrib = $item['maghrib'];
        $ishaa = $item['ishaa'];

        $stmt->bind_param(
            'ssssssss',
            $cityName,
            $dateStr,
            $fajr,
            $sunrise,
            $dhuhr,
            $asr,
            $maghrib,
            $ishaa
        );
        $stmt->execute();

    }
}


