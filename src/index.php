<?php
$conn = new mysqli('db', 'webuser', 'webpass', 'webapp');
echo "<h1>Danh sach san pham</h1>";
if ($conn->connect_error) { die("<p>Loi ket noi DB: ".$conn->connect_error."</p>"); }
echo "<p style='color:green'>Da ket noi CSDL thanh cong!</p>";
$conn->query("CREATE TABLE IF NOT EXISTS products (id INT AUTO_INCREMENT PRIMARY KEY, ten VARCHAR(100), gia INT)");
if ($conn->query("SELECT COUNT(*) c FROM products")->fetch_assoc()['c'] == 0) {
  $conn->query("INSERT INTO products (ten,gia) VALUES ('Tai nghe',250000),('Op lung',45000),('Den LED',180000)");
}
$res = $conn->query("SELECT * FROM products");
echo "<table border='1' cellpadding='8'><tr><th>ID</th><th>Ten</th><th>Gia</th></tr>";
while ($r = $res->fetch_assoc()) echo "<tr><td>{$r['id']}</td><td>{$r['ten']}</td><td>{$r['gia']}</td></tr>";
echo "</table>";
