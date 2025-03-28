<?php 

// Biến môi trường, dùng chung toàn hệ thống
// Khai báo dưới dạng HẰNG SỐ để không phải dùng $GLOBALS

define('BASE_URL'       , 'http://localhost/Admin_ban_sach/Agile/');

// duong dam vao admin
define('BASE_URL_ADMIN'       , 'http://localhost/Admin_ban_sach/Agile/admin/');

define('DB_HOST'    , 'localhost');
define('DB_PORT'    , 3306);
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME'    , 'admin_ban_sach');  // Tên database

define('PATH_ROOT'    , __DIR__ . '/../');
