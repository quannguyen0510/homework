<?php

include("connect.php");

if (isset($_POST['update'])) {

    $name = $_POST['name'];
    $id = $_POST['id'];
    $name = chuanHoa($name);
    if (empty($name)) {
        echo "Ten Tinh is empty.<br/>";

    } else {

        $result = mysqli_query($conn, "UPDATE DSTinh SET name='$name' WHERE id=$id");
        if (!$result) {
            echo "Tinh da ton tai";
        } else {
            header("Location: display.php");
        }
    }
}
?>
<?php
//getting id from url
$id = $_GET['id'];

//selecting data associated with this particular id
$result = mysqli_query($conn, "SELECT * FROM DSTinh WHERE id=$id");

while ($res = mysqli_fetch_array($result)) {
    $name = $res['name'];
    $id = $res['id'];

}
?>
<html>
<head>
    <title>Edit Data</title>
</head>

<body>
<a href="display.php">Home</a>
<br/><br/>

<form name="form1" method="post" action="edit.php">
    <table border="0">
        <tr>
            <td>Ten Tinh</td>
            <td><input type="text" name="name" value="<?php echo $name; ?>"></td>
        </tr>
        <tr>
            <td><input type="hidden" name="id" value=<?php echo $_GET['id']; ?>></td>
            <td><input type="submit" name="update" value="Update"></td>
        </tr>
    </table>
</form>
</body>
</html>