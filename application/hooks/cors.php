<?php
function add_cors_headers() {
    $CI =& get_instance();
    $CI->output
        ->set_header("Access-Control-Allow-Origin: *")
        ->set_header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE")
        ->set_header("Access-Control-Allow-Headers: Content-Type, Content-Length, Accept-Encoding, X-Requested-With, Authorization");
}
