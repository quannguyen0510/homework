<?php
include('connect.php');
if(isset($_POST['deleteHuyen']))
{
    $tinh = $_GET['tinh'];
    $checkbox = $_POST['checkboxH'];
    while (list ($key, $val) = @each ($checkbox)){
        mysqli_query($conn, "DELETE FROM DSHuyen WHERE DSHuyen.id=$val");
    }
}

echo "
<script>
    window.location.href ='displayHuyen.php?tinh='+'$tinh';
</script>"
;
?>
