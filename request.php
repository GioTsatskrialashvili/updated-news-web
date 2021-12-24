<?php

$id = 5;
$status = 'success';

$response = ['id' => $id, 'status' => $status];

// array -> JSON string
// json_encode($array)

// JSON -> array
// json_decode($json)

echo json_encode($response);