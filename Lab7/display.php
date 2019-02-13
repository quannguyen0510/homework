<?php
include("connect.php");
?>

<html>
<head>
    <title>Danh sach Tinh</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>
<body>
<form method="post" action="delete.php">
    <table border="1">
        <tr>
            <th>Ten Tinh</th>
            <th>So Hieu Tinh</th>
            <th>Edit</th>
            <th><input type="checkbox" id="selAl">Select All</th>
            <th>So Huyen</th>
        </tr>
        <?php
        $res = mysqli_query($conn, "SELECT DSTinh.id, DSTinh.name, COUNT(DSHuyen.id) AS total FROM DSHuyen RIGHT JOIN DSTinh ON(DSHuyen.tinhid=DSTinh.id) GROUP BY DSTinh.name ORDER BY total DESC");
        while ($row = mysqli_fetch_array($res)) {
            echo "<tr>";
            echo "<td><a href=\"displayHuyen.php?tinh=$row[name]\">". $row['name'] ."</a></td>";
            echo "<td>". $row['id'] ."</td>";
            echo "<td><a href=\"edit.php?id=$row[id]\">Edit</a></td>";
            echo "<td>"; ?><input type="checkbox" name="checkbox[]"
                                  value="<?php echo $row['id']; ?>" /><?php echo "</td>";
            echo "<td>" . $row['total'] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
        ?>
        <br>
        <a href='insert.php'>Add new data</a>
        <input type='submit' name='delete' onclick="return confirm('Are you sure?')" value='Delete'>
</form>
<script>
    $("#selAl").click(function () {
        $('input:checkbox').not(this).prop('checked', this.checked);
    });
</script>
<form action="search.php" method="post">
    <input type="text" name="value" placeholder="Value To Search"><br><br>
    <input type="submit" name="search" value="Search"><br><br>
</form>
<br>
</body>
</html>
