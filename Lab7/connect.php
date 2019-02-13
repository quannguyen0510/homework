<?php

$conn = mysqli_connect("localhost", "root", "quanga98", "DanhMuc");

function chuanHoa($str)
{
    $str = ucwords($str);
    $str1 = preg_replace('/[\s]+/mu', ' ', $str);
    $result = trim($str1);
    return $result;
}

if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: <br>" . mysqli_connect_error();
}