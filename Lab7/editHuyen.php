<?php

include_once("connect.php");
if (isset($_POST['update'])) {
    $name = $_POST['name'];
    $id = $_POST['id'];
    $tinh = $_GET['tinh'];
    $name = chuanHoa($name);
    if (empty($name)) {
        if (empty($name)) {
            echo "Ten Huyen is empty.<br/>";
        }

        echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
    } else {
        $result = mysqli_query($conn, "UPDATE DSHuyen SET DSHuyen.name='$name' WHERE DSHuyen.id=$id ");
        header("location:displayHuyen.php?tinh=" . $tinh);
    }
}
?>
<?php

$id = $_GET['id'];

//selecting data associated with this particular id
$result1 = mysqli_query($conn, "SELECT * FROM DSHuyen WHERE DSHuyen.id='$id'");

while ($res = mysqli_fetch_array($result1)) {
    $name = $res['name'];
}

?>
<html>
<head>
    <title>Edit Data</title>
</head>

<body>
<a href="displayHuyen.php?tinh=<?php echo $_GET['tinh'] ?>">Home</a>
<br/><br/>

<form name="form" method="post" action="editHuyen.php?id=<?php echo $_GET['id'] ?>&tinh=<?php echo $_GET['tinh'] ?>">
    <table border="0">
        <tr>
            <td>Ten Huyen</td>
            <td><input type="text" name="name" value="<?php echo $name; ?>"></td>
        </tr>
        <tr>
            <td><input type="hidden" name="id" value="<?php echo $_GET['id']; ?>"></td>
            <td><input type="submit" name="update" value="Update"></td>
        </tr>
    </table>
</form>
</body>
</html>