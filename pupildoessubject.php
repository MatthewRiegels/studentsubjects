<!DOCTYPE html>
<html>
    <head>
        <title>Pupil Studies</title>
    </head>
    <body>
        <form action=".php" method = "post">
            thing: <input type="text" name="thing"><br>
            <input type="submit" value="">
        </form>

        <select name = "student">
        <?php
        include_once('connection.php');
        $stmt = $conn->prepare("SELECT * FROM TblUsers WHERE Role = 0 ORDER BY Surname ASC");
        $stmt->execute();


        while ($row = $stmt->fetch(PDO::FETCH_ASSOC))
        {
            echo('<option value='.$row["UserID"].'>'.$row["Surname"].', '.$row["Forename"].'</option>');
        }
        ?>
        </select>

    </body>
</html>