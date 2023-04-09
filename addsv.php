<!DOCTYPE html>
<html lang="en">
    <body>

        Insert Student

        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" class="border">
            ID<BR> <input type="number" name="id" value =""><BR>
            Full Name<BR> <input type="text" name="name" value =""><BR>
            Year of Birth<BR> <input type="number" name="year_of_birth" value =""><BR>
            Email<BR> <input type="text" name="email" value =""><BR>
            <input type="submit" name="submit" value="submit">
        </form> 

        <?php
            if($_SERVER["REQUEST_METHOD"] == "POST") {
                $id = $_POST["id"];
                $name = $_POST["name"];
                $year_of_birth = $_POST["year_of_birth"];
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
    
                $sql = "INSERT INTO masv_cua_ban_qlsv (id, ho_ten, nam_sinh, email) VALUES ('$id', '$name', '$year_of_birth', '$email')";
    
                if (mysqli_query($conn, $sql)) {
                    echo "\nStudent added successfully.";
                } else {
                    echo "\nERROR: Could not execute $sql. " . mysqli_error($conn);
                }
    
                mysqli_close($conn);
            }
        ?>
        
        <a href="index.php">Back to index</a>
    </body>
</html>
