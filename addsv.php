<!DOCTYPE html>
<html lang="en">
    <body>

        Insert Student

        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" class="border">
            ID<BR> <input type="text" name="id" value ="<?php echo $id; ?>"><BR>
            Full Name<BR> <input type="text" name="ho_ten" value ="<?php echo $ho_ten;?>"><BR>
            Year of Birth<BR> <input type="text" name="nam_sinh" value ="<?php echo $nam_sinh ?>"><BR>
            Email<BR> <input type="text" name="email" value ="<?php echo $email ?>"><BR>
            <input type="submit" name="submit" value="submit">
        </form> 

        <?php
            if($_SERVER["REQUEST_METHOD"] == "POST") {
                $id = $_POST["id"];
                $ho_ten = $_POST["ho_ten"];
                $nam_sinh = $_POST["nam_sinh"];
                $email = $_POST["email"];
    
                $MYSQL_ADDON_HOST = getenv('MYSQL_ADDON_HOST');
                $MYSQL_ADDON_PORT = getenv('MYSQL_ADDON_PORT');
                $MYSQL_ADDON_DB = getenv('MYSQL_ADDON_DB');
                $MYSQL_ADDON_USER = getenv('MYSQL_ADDON_USER');
                $MYSQL_ADDON_PASSWORD = getenv('MYSQL_ADDON_PASSWORD');
    
                $conn = mysqli_connect($MYSQL_ADDON_HOST, $MYSQL_ADDON_USER, $MYSQL_ADDON_PASSWORD, $MYSQL_ADDON_DB);
    
                if (!$conn) {
                    echo "\nError: Unable to connect to database.\n";
                } else {
                    echo "\nConnected to database successfully.\n";
                }
    
                $sql = "INSERT INTO masv_cua_ban_qlsv (id, ho_ten, nam_sinh, email) VALUES ('$id', '$ho_ten', '$nam_sinh', '$email')";
    
                if (mysqli_query($conn, $sql)) {
                    echo "\nStudent added successfully.";
                } else {
                    echo "\nERROR: Could not execute $sql. " . mysqli_error($conn);
                }
    
                mysqli_close($conn);
            }
        ?>
             <a href="index.php">Go back to homepage</a>
    </body>
</html>
