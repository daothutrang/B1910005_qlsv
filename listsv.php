<html lang="en">
    <body>
        <h2>List of Students</h2>
        <?php
            $MYSQL_ADDON_HOST = getenv('MYSQL_ADDON_HOST');
            $MYSQL_ADDON_PORT = getenv('MYSQL_ADDON_PORT');
            $MYSQL_ADDON_DB = getenv('MYSQL_ADDON_DB');
            $MYSQL_ADDON_USER = getenv('MYSQL_ADDON_USER');
            $MYSQL_ADDON_PASSWORD = getenv('MYSQL_ADDON_PASSWORD');
    
            $conn = mysqli_connect($MYSQL_ADDON_HOST, $MYSQL_ADDON_USER, $MYSQL_ADDON_PASSWORD, $MYSQL_ADDON_DB);
    
            if (!$conn) {
                echo "<p>Error: Unable to connect to database.</p>";
            } else {
                echo "<p>Connected to database successfully.</p>";
    
                $sql = "SELECT * FROM students";
    
                $result = mysqli_query($conn, $sql);
    
                if (mysqli_num_rows($result) > 0) {
                    echo "<table>";
                    echo "<tr><th>ID</th><th>Name</th><th>Email</th></tr>";
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr><td>" . $row["id"] . "</td><td>" . $row["name"] . "</td><td>" . $row["email"] . "</td></tr>";
                    }
                    echo "</table>";
                } else {
                    echo "<p>No results found.</p>";
                }
    
                mysqli_close($conn);
            }
        ?>
        <br>
        <a href="index.php">Return to index page</a>
    </body>
</html>
