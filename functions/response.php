<?php
function ok() {
    http_response_code(200);
    exit(json_encode(['message' => "Operation successful"]));
}

function bad() {
    http_response_code(400);
    exit(json_encode(['message' => "Operation not possible"]));
}

function unauthorized() {
    http_response_code(401);
    exit(json_encode(['message' => "No user with the provided credential"]));
}

function notaccettable() {
    http_response_code(406);
    exit(json_encode(['message' => "Data provided not acceptable"]));
}