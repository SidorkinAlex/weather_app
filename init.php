<?php


$longopts  = array(
    "token::",     // Обязательное значение
);

$options = getopt("",$longopts);
$options['token'] = $options['token'] ?? "";
$data = '{
  "saveFormat": "json",
  "yandexAPIToken": "'. $options['token'] .'",
  "corYandexURL": "https://api.weather.yandex.ru/v2/forecast",
  "defaultLat": "52.97083676499036",
  "defaultLon": "36.06436555767063"
}';
file_put_contents('config.json',$data);
echo "ok";

