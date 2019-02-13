<?php
include('connect.php');
if (isset($_POST['search'])) {
    $value = $_POST['value'];
    echo "<a href='display.php'>Go home</a>";
    echo "<br>";
    if (strlen($value) > 0) {
        $result = mysqli_query($conn, "select * from dstinh where name like '%$value%'");
        if (mysqli_num_rows($result) > 0) {
            echo "<table border='1'>";
            echo "<tr>";
            echo "<th>Ten tinh</th>";
            echo "<th>So hieu tinh</th>";
            echo "<th>Edit</th>";
            echo "</tr>";
            while ($row = mysqli_fetch_array($result)) {
                echo "<tr>";
                echo "<td>" . $row['name'] . "</td>";
                echo "<td>" . $row['id'] . "</td>";
                echo "<td><a href='edit.php?id=$row[id]'>Edit</a></td>";
                echo "<tr/>";
            }
        } else {
            echo "Found no result";
        }
    } else {
        echo "Please fill value input";
    }
}