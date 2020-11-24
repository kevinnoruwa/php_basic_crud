<?php
      require("database/connection.php");
    


    
// handling the PUT REQUEST
    if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_GET["id"]) && $_POST["_method"] == "PUT") {
            $f_name = $_POST["f_name"];
            $l_name = $_POST["l_name"];
            $age = $_POST["age"];
            $id = $_GET["id"];
            try {
                $sql = $pdo->prepare(
                    'UPDATE users SET first_name = :f_name,
                    last_name = :l_name,
                    age = :age
                    WHERE id = :id');

                    $sql->execute(["f_name" => $f_name, 
                    "l_name" => $l_name, 
                    "age" => $age, 
                    "id" => $id]);
                    echo "<script>location.href='/read.php?show=one&id={$id}'</script>";     
            } catch (PDOException $e) {
                echo  $e->getMessage();
            }
    }
     
    
    if(isset($_GET["id"])){

        $id = $_GET["id"];

        try {
            $sql = $pdo->prepare(
                'SELECT * FROM users WHERE id = :id'
            );

            $sql->execute(["id"=>$id]);


            $results = $sql->fetchAll(PDO::FETCH_OBJ);

        } catch(PDOException $e) {
            $e->getMessage();

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
    <form action="/update.php?id=<?php echo $results[0]->id;?>"  method="post">
        <input type="hidden"  name="_method" value="PUT">
        <label for="">First name</label> <br>
        <input value="<?php echo $results[0]->first_name;?>" type="text" name="f_name"> <br>
        <label for="">Last name</label> <br>
        <input value="<?php echo $results[0]->last_name;?>" type="text" name="l_name"> <br>
        <label for="">Age</label> <br>
        <input value="<?php  echo $results[0]->age;?>" type="text" name="age"> <br>
        <button>Save</button>
    </form>
    <a href="/read.php?show=all">go back</a>
</body>
</html>