<html>
<head>
    <title>Add Data</title>
</head>

<body>
<a href="displayHuyen.php?tinh=<?php echo $_GET['tinh'] ?>">Home</a>
<br/><br/>
<form action="insertHuyen.php?tinh=<?php echo $_GET['tinh'] ?>" method="post" name="form1">
    <table width="25%" border="0">
        <tr>
            <td>Ten Huyen</td>
            <td><input type="text" name="name"></td>
        </tr>
        <tr>
            <td>So hieu huyen</td>
            <td><input type="text" name="id"></td>
        </tr>
        <tr>
            <td>So hieu tinh</td>
            <td><input type="text" name="tinhid"></td>
        </tr>
        <tr>
            <td></td>
            <td><input type="submit" name="Submit" value="Add"></td>
        </tr>
    </table>
</form>
</body>
</html>
<?php

include("connect.php");

if (isset($_POST['Submit'])) {
    $tinh = $_GET['tinh'];
    $name = $_POST['name'];
    $id = $_POST['id'];
    $tinhid = $_POST['tinhid'];
    $name = chuanHoa($name);
    if (empty($name) || empty($id) || empty($tinhid)) {
        if (empty($name)) {
            echo "Ten huyen is empty.<br/>";
        }

        if (empty($id)) {
            echo "So hieu huyen is empty.<br/>";
        }

        if (empty($tinhid)) {
            echo "So hieu tinh is empty.<br/>";
        }
        echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
    } else {
        $result = mysqli_query($conn, "INSERT INTO DSHuyen VALUES('$id','$name','$tinhid')");
        if ($result) {
            echo "Data added successfully.";
            echo "<br/><a href=\"displayHuyen.php?tinh=$tinh\">View result</a>";
        } else {
            echo "Huyen da ton tai";
            echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
        }
    }
}
?>

