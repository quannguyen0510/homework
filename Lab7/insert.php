<html>
<head>
    <title>Add Data</title>
</head>

<body>
<a href="display.php">Home</a>
<br/><br/>

<form action="insert.php" method="post" name="form1">
    <table width="25%" border="0">
        <tr>
            <td>Ten Tinh</td>
            <td><input type="text" name="name" id="name"></td>
        </tr>
        <tr>
            <td>So hieu tinh</td>
            <td><input type="text" name="id"></td>
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

//including the database connection file
include_once("connect.php");

if (isset($_POST['Submit'])) {
    $name = $_POST['name'];
    $id = $_POST['id'];
    $name = chuanHoa($name);
    if (empty($name) || empty($id)) {
        if (empty($name)) {
            echo "Name field is empty.<br/>";
        }

        if (empty($id)) {
            echo "So hieu tinh is empty.<br/>";
        }

        echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
    } else {

        $result = mysqli_query($conn, "INSERT INTO DSTINH VALUES('$id','$name')");
        if (!$result) {
            echo "Tinh da ton tai!";
        } else {
            echo "Data added successfully.";
            echo "<br/><a href='display.php'>View Result</a>";
        }
    }
}
?>

