<?php
$conn = mysqli_connect('localhost', 'root', 'quanga98');

if (!$conn) {
    die("Create database fail: <br>" . mysqli_connect_error());
} else {
    mysqli_set_charset($conn, 'utf8');
}

$sql = "CREATE DATABASE DanhMuc";

if (mysqli_query($conn, $sql)) {
    echo 'Create database success!<br>';


    mysqli_select_db($conn, 'DanhMuc');


    $sql = "CREATE TABLE DSTinh (
id CHAR(4) NOT NULL PRIMARY KEY,
name VARCHAR(255) NOT NULL,
UNIQUE  KEY(name)
)";

    $sql1 = "CREATE TABLE DSHuyen (
id CHAR(4) PRIMARY KEY,
name VARCHAR(255) NOT NULL,
tinhid CHAR(4) NOT NULL,
UNIQUE KEY(name,tinhid),
foreign key (tinhid) references DSTinh(id) ON DELETE CASCADE 
)";


    if (mysqli_query($conn, $sql)) {
        echo " Create table DSTinh success <br>";
    } else {
        echo " Create table DSTinh fail: <br>" . mysqli_error($conn);
    }

    if (mysqli_query($conn, $sql1)) {
        echo " Create table DSHuyen success <br>";
    } else {
        echo " Create table DSHuyen fail: <br>" . mysqli_error($conn);
    }

} else {
    echo "Create database fail: <br>" . mysqli_error($conn);
}
echo "<br>";
mysqli_close($conn);
?>


<?php
$servername = "localhost";
$username = "root";
$password = "quanga98";
$dbname = "DanhMuc";


$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Connection failed: <br>" . mysqli_connect_error());
}

mysqli_close($conn);
?>





