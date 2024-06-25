<?php
// Dummy data for users
$users = [
    ["id" => 1, "name" => "John Doe", "email" => "john@example.com"],
    ["id" => 2, "name" => "Jane Doe", "email" => "jane@example.com"],
];

// Handle the request method
switch ($_SERVER['REQUEST_METHOD']) {
    case 'GET':
        echo json_encode($users);
        break;
    default:
        http_response_code(405);
        echo json_encode(["message" => "Method not allowed."]);
        break;
}
