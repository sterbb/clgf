<?php
if(session_destroy()){
    session_unset();
    echo "<script>window.location.href='members'</script>";
}
?>