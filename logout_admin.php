<?php
session_start();
session_destroy();
echo "<script>alert('Berhasil Logout.');document.location.href='admin/login_admin.php'</script>";
?>