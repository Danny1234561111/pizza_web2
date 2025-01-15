<?php


$data = [];
for ($i = 1; $i <= 3; $i++) {
    $data[] = [
        'name' => 'Название ' . $i,
        'value' => 'Содержание ' . $i,
        'email' => 'user' . $i . '@example.com',
    ];
}


return [
    'data' => $data,
];
