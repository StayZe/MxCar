<?php

$data = [
    [
        'id' => 1,
        'points' => 5,
        'name' => 'Ferrari',
        'position' => 5,
        'season' => 2021,
    ]
];

header('Content-Type: application/json');
echo json_encode($data);
die();