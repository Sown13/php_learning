<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        require_once "./config/config.php";

      

        if($_SERVER["REQUEST_METHOD"] == "GET"){
            $id =  trim($_GET["id"]);
            if($id > 0) {
                $SQL_query = "SELECT * FROM persons WHERE Personid = ?";
                if( $SQL_statement = mysqli_prepare($connection, $SQL_query)){
                    mysqli_stmt_bind_param($SQL_statement, "i", $param_id);
                    $param_id = $id;
                    mysqli_stmt_execute($SQL_statement);
                    if($result = mysqli_stmt_get_result($SQL_statement)) {
                        if(mysqli_num_rows($result) == 1) {
                            $row = mysqli_fetch_array($result);
                            echo " First name: " . $row['FirstName'] . "</br>";
                            echo " Last name: " . $row['LastName'] . "</br>";
                            echo " Age: " . $row['Age'] . "</br>";
                            echo " Address: " . $row['Address'] . "</br>";
                        } else echo "Something wrong, this person is not exist";
                    }
                };
            }

        }

      
    ?>
</body>
</html>