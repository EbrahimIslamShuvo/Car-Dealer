<?php
require_once('conection.php');
echo 'ho';

if (isset($_GET['email'])) {
    // Sanitize the input
    $email = mysqli_real_escape_string($con, $_GET['email']);

    // Prepare the DELETE statement
    $query = "DELETE FROM user WHERE email = ?";
    $stmt = mysqli_prepare($con, $query);

    // Bind the parameter
    mysqli_stmt_bind_param($stmt, "s", $email);

    // Execute the statement
    mysqli_stmt_execute($stmt);
    echo 'ami';

    // Check if the deletion was successful
    if (mysqli_stmt_affected_rows($stmt) > 0) {
        echo ' lol';
        echo '<script>
                alert("Delete successful");
                window.location.href = "/CAR DEALER/admin.php";
              </script>';
    } else {
        echo ' na';
        echo '<script>
                alert("Failed to delete");
                window.location.href = "/CAR DEALER/admin.php";
              </script>';
    }

    // Close the statement
    mysqli_stmt_close($stmt);
}
else{
    echo 'jamela here';
}
?>