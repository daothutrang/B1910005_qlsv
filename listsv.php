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
                $sql = "SELECT * FROM users";
                $result = mysqli_query($conn, $sql);
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<td>" . $row["id"] . "</td>";
                        echo "<td>" . $row["name"] . "</td>";
                        echo "<td>" . $row["email"] . "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<p>No results found.</p>";
                }
                mysqli_close($conn);
            }
        ?>
    </table>
    <a href="index.php">Back to index</a>
    </body>
</html>
