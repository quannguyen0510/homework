<?php
include("connect.php");
$tinh = $_GET['tinh'];
echo "Ten tinh: ".$tinh;
$query = "SELECT DSHuyen.name, DSHuyen.id, DSHuyen.tinhid FROM DSHuyen JOIN DSTinh ON(DSHuyen.tinhid=DSTinh.id) WHERE DSTinh.name='$tinh'";
$result = mysqli_query($conn, @$query);

?>
<html>
<head>
    <title>Danh sach Huyen</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>
<body>
<form method="post" action="deleteHuyen.php?tinh=<?php echo $_GET['tinh']?>">
    <br>
    <a href="display.php">Home</a>
    <br/>
    <table border="1">
        <tr>
            <th>Ten Huyen</th>
            <th>So hieu Huyen</th>
            <th>So Hieu Tinh</th>
            <th>Edit</th>
            <th><input type="checkbox" id="selAl">Select All</th>
        </tr>
        <?php
        while ($row = mysqli_fetch_array($result)) {
            echo "<tr>";
            echo "<td>" . $row['name'] . "</td>";
            echo "<td>" . $row['id'] . "</td>";
            echo "<td>" . $row['tinhid'] . "</td>";
            echo "<td><a href=\"editHuyen.php?id=$row[id]&tinh=$_GET[tinh]\">Edit</a></td>";
            echo "<td>"; ?><input type="checkbox" name="checkboxH[]"
                                  value="<?php echo $row['id']; ?>" /><?php echo "</td>";
            echo "</tr>";
        }
        echo "</table>";

        ?>
        <br>
        <?php
        echo "<br/><a href=\"insertHuyen.php?tinh=$tinh\">Add new data</a>";
        ?>
        <input type='submit' name='deleteHuyen' onclick="return confirm('Are you sure?')" value='Delete'>
</form>
<script>
    $("#selAl").click(function () {
        $('input:checkbox').not(this).prop('checked', this.checked);
    });
</script>
<form action="searchHuyen.php?tinh=<?php echo $_GET['tinh']?>" method="post">
    <input type="text" name="value" placeholder="Value To Search"><br><br>
    <input type="submit" name="search" value="Search"><br><br>
</form>
<br>
</body>
</html>
