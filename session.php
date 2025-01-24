

<?php 
session_start();
 $t = time();

// Check if user is logged in
if ($_SESSION['login_user'] == "") {
    printf("<script>location.href='../index.php'</script>");
    exit(); // Stop further execution
}
if (!isset($_SESSION['login_user'])) {
    printf("<script>location.href='../index.php'</script>");
    exit(); // Stop further execution
}

// Session timeout check
if (isset($_SESSION['logged']) && ($t - $_SESSION['logged'] > 1800)) {
    session_destroy();
    session_unset();
    printf("<script>location.href='../index.php'</script>");
    exit(); // Stop further execution
} else {
    $_SESSION['logged'] = time();
}
?>