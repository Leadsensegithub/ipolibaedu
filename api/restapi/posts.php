<?php
// Dummy data for posts
$posts = [
    ["id" => 1, "title" => "Hello World", "content" => "This is a post content."],
    ["id" => 2, "title" => "Another Post", "content" => "This is another post content."],
];

// Handle the request method
switch ($_SERVER['REQUEST_METHOD']) {
    case 'GET':
        echo json_encode($posts);
        break;
    default:
        http_response_code(405);
        echo json_encode(["message" => "Method not allowed."]);
        break;
}
