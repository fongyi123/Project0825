<?php
    $url = "https://opendata.cwb.gov.tw/api/v1/rest/datastore/F-D0047-091?Authorization=CWB-0EF10C78-E76B-49E3-BD74-05B21416C3F5&format=JSON";  // Your json data url
    $data = file_get_contents($url);  // PHP get data from url
    $json = json_decode($data, true);  // Decode json data
    // 處理取得的 json 資料
    var_dump($json['records']['locations'][0]['location']);
    
?>