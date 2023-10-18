<!DOCTYPE html>
<html>
    <head>
        <title>Subjects</title>
    </head>
    <body>
        <!-- form for adding subjects -->
        <form action="addsubjects.php" method = "post">
            <!--
                Make a form to create a new role in this table

                +-------------+-----------------+------+-----+---------+----------------+
                | Field       | Type            | Null | Key | Default | Extra          |
                +-------------+-----------------+------+-----+---------+----------------+
                | SubjectID   | int(4) unsigned | NO   | PRI | NULL    | auto_increment |
                | Subjectname | varchar(20)     | NO   |     | NULL    |                |
                | Teacher     | varchar(20)     | NO   |     | NULL    |                |
                +-------------+-----------------+------+-----+---------+----------------+

                remember to check if the teacher exists (idk how to do that)
            -->
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