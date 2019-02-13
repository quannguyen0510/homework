<a href="displayHuyen.php?tinh=<?php echo $_GET['tinh'] ?>">Page Huyen</a>
<?php
include_once("connect.php");

if (isset($_POST['search'])) {
    $tinh = $_GET['tinh'];
    $value = $_POST['value'];
    echo "<br>";
    if (strlen($value) > 0) {
        $query = "SELECT DSHuyen.name, DSHuyen.id, DSHuyen.tinhid FROM DSHuyen JOIN DSTinh ON(DSHuyen.tinhid=DSTinh.id) WHERE DSHuyen.name LIKE '%" . $value . "%' AND DSTinh.name='$tinh'";
        $result = mysqli_query($conn, @$query);
        if (mysqli_num_rows($result) > 0) {
            echo "<table border='1'>";
            echo "<tr>";
            echo "<th>Ten huyen</th>";
            echo "<th>So hieu huyen</th>";
            echo "<th>So hieu tinh</th>";
            echo "<th>Edit</th>";
            echo "</tr>";
            while ($row = mysqli_fetch_array($result)) {
                echo "<tr>";
                echo "<td>" . $row['name'] . "</td>";
                echo "<td>" . $row['id'] . "</td>";
                echo "<td>" . $row['tinhid'] . "</td>";
                echo "<td><a href='edit.php?id=$row[id]'>Edit</a></td>";
                echo "<tr/>";
            }
        } else {
            echo "Found no result";
        }
    } else {
        echo "Please fill value input!";
    }
}


