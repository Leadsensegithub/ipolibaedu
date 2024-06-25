<?php
header("Content-Type: application/json; charset=UTF-8");

// Get the URL path
$url = isset($_GET['url']) ? $_GET['url'] : '';
$url = rtrim($url, '/');
$url = filter_var($url, FILTER_SANITIZE_URL);
$url = explode('/', $url);

// Route the request
if (isset($url[0]) && $url[0] == 'restapi') {
    if (isset($url[1]) && $url[1] == 'v1') {
        if (isset($url[2])) {
            switch ($url[2]) {
                case 'users':
                    include_once 'restapi/v1/users.php';
                    break;
                case 'posts':
                    include_once 'restapi/v1/posts.php';
                    break;
                default:
                    http_response_code(404);
                    echo json_encode(["message" => "Endpoint not found."]);
                    break;
            }
        } else {
            http_response_code(404);
            echo json_encode(["message" => "Endpoint not found."]);
        }
    } else {
        http_response_code(404);
        echo json_encode(["message" => "API version not found."]);
    }
} else {
    http_response_code(404);
    echo json_encode(["message" => "Invalid API request."]);
}
