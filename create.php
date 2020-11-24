<?php
      require("database/connection.php");
    
    if($_SERVER["REQUEST_METHOD"] == "POST") {
            $f_name = $_POST["f_name"];
            $l_name = $_POST["l_name"];
            $age = $_POST["age"];

            try {
                $sql = $pdo->prepare( "INSERT INTO users (first_name, last_name, age)
                VALUES (:f_name, :l_name, :age)");


               $sql -> execute(['f_name' => $f_name,  'l_name' => $l_name, 'age' => $age]);
               echo "inserted user: {$f_name}  {$l_name}";

               $id = $pdo->lastInsertId();

               echo "<script>location.href='/read.php?show=one&id={$id}'</script>";

            } catch (PDOException $e) {
                echo  $e->getMessage();
            }

    }
      

    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="create.php" method="post">
        <label for="">First name</label> <br>
        <input type="text" name="f_name"> <br>
        <label for="">Last name</label> <br>
        <input type="text" name="l_name"> <br>
        <label for="">Age</label> <br>
        <input type="text" name="age"> <br>

        <button>Save</button>
    
    </form>
   
</body>
</html>