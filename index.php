<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
     integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    <?php
        require_once "./config/config.php";
        
        $SQL_SHOW_PERSONS = "SELECT * FROM persons";

        if($result = mysqli_query($connection, $SQL_SHOW_PERSONS)){
            if(mysqli_num_rows($result) > 0) {
                echo "List of persons: <br/>";
                echo "<table class='table'>";
                echo "        <thead>";
                echo "          <tr>";
                echo "            <th scope='col'>#</th>";
                echo "            <th scope='col'>First</th>";
                echo "            <th scope='col'>Last</th>";
                echo "            <th scope='col'>Age</th>";
                echo "            <th scope='col'>Address</th>";
                echo "          </tr>";
                echo "        </thead>";
                echo "<tbody?>";
            }
// php check case sensitive for sql column names
            while($row = mysqli_fetch_array($result)){
                echo "<tr>";
                echo  "<th scope='row'>". $row['Personid'] ."</a></th>";
                echo  "<td>". "<a href='./detail.php?id=". $row['Personid']."'>". $row['FirstName'] . "</a>" . "</td>";
                echo  "<td>". $row['LastName']."</td>";
                echo  "<td>". $row['Age']."</td>";
                echo  "<td>". $row['Address']."</td>";
                echo  "</tr>";
            }
            echo "</tbody>";
            echo "</table>";
        }
    ?>

    
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" 
        crossorigin="anonymous"></script>
</html>