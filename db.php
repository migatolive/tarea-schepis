<?php
$host = 'c586ehe1mt2hev.cluster-czrs8kj4isg7.us-east-1.rds.amazonaws.com';
$db = 'd61ri71qg43qlc';
$user = 'u672r2sk53qnmv';
$port = '5432';
$password = 'p349c98c568e5488a652df9a15bb255ef528f510e30c94f821cc6fe8443adb8fe';

try {
    $conn = new PDO("pgsql:host=$host;port=$port;dbname=$db", $user, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Error de conexión: " . $e->getMessage();
}
?>