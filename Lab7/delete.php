<?php
include('connect.php');
if(isset($_POST['delete']))
{
    $checkbox = $_POST['checkbox'];
    while (list ($key, $value) = @each ($checkbox)){
        mysqli_query($conn, "DELETE FROM DSTinh WHERE id=$value");
    }
}
?>

<script type="text/javascript">
    window.location.href = "display.php";
</script>
