<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
<?php 
    require_once './config/config.php';

    $firstName = $lastName = $age = $address = "";
    $firstNameError = $lastNameError = $ageError = $addressError = "";

    if ($_SERVER['REQUEST_METHOD'] == "POST"){
            
        $firstName = $_POST['firstName'];
        $lastName = $_POST['lastName'];
        $age = $_POST['age'];
        $address = $_POST['address'];
        if(empty($fname)) {
            $fnameError = "Please enter first name";
        }
    
        if(empty($lname)) {
            $lnameError = "Please enter last name";
        }
    
        if(empty($age)) {
            $ageError = "Please enter age";
        }
    
        if(empty($address)) {
            $addressError = "Please enter address";
        }
    
        if(empty($firstNameError) && empty($lastNameError) && empty($ageError) && empty($addressError)){
            $SQL_QUERY = "INSERT INTO persons(FirstName, LastName, Age, Address) VALUES (?,?,?,?)";

            if($SQL_statement = mysqli_prepare($connection, $SQL_QUERY)){
                mysqli_stmt_bind_param($SQL_statement, "ssis", $param_firstName, $param_lastName, $param_age, $param_address);
                $param_firstName = $firstName;
                $param_lastName = $lastName;
                $param_age = $age;
                $param_address = $address;
                if(mysqli_stmt_execute($SQL_statement)){
                  // Records created successfully. Redirect to landing page
                    header("location: index.php");
                    exit();
                } else {
                    echo "Oops! Something went wrong. Please try again later.";
                }
            }
        }
    }

?>
<div class="container">
    <div>
        <form method="POST" action="" class="row g-3">
            <div class="col-md-6">
                <label for="inputFirstName" class="form-label">First Name</label>
                <input type="text" class="form-control" id="inputEmail4" name="firstName"  placeholder="Son">
            </div>
            <div class="col-md-6">
                <label for="inputLastName" class="form-label">Last Name</label>
                <input type="text" class="form-control" id="inputLastName" name="lastName" placeholder="Nguyen"> 
            </div>
            <div class="col-12">
                <label for="inputAge" class="form-label">Age</label>
                <input type="text" class="form-control" id="inputAge" placeholder="18" name="age">
            </div>
            <div class="col-12">
                <label for="inputAddress" class="form-label">Address</label>
                <input type="text" class="form-control" id="inputAddress" placeholder="Some where" name="address">
            </div>
            <div class="col-12">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="gridCheck">
                    <label class="form-check-label" for="gridCheck">
                        Check me out
                    </label>
                </div>
            </div>
            <div class="col-12">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>

