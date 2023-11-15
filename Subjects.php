<!DOCTYPE html>
<html>
    <head>
        <title>Subjects</title>
    </head>
    <body>
        <a href="index.html">back to the homepage</a><br><br>
        <!-- form for adding subjects -->
        <form action="addsubjects.php" method = "post">
            Subject name:<input type="text" name="subjectname"><br>
            Teacher name:<input type="text" name="teachername"><br>
            <input type="submit" value="Add Subject">
        </form>

        <!-- show all subjects -->
        <?php
        include_once('connection.php');
        $stmt = $conn->prepare("SELECT * FROM TblSubjects");
        $stmt->execute();
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            echo($row["Subjectname"] . ": " . $row["Teacher"] . "<br>");
        }
        ?>
    </body>
</html>