<?php
    require("database/connection.php");
    

    if($_GET["show"] == "all") {
          try {
              $sql = $pdo->prepare('SELECT * FROM users');
              $sql -> execute();
              

              $results = $sql->fetchAll(PDO::FETCH_OBJ);

              
          } catch(PDOException $e){
              echo $e->getMessage();
          }
          

    } 
    
    
    
   if($_GET["show"] == "one" && isset($_GET["id"])){

        $id = $_GET["id"];

        try {
        $sql = $pdo->prepare('SELECT * FROM users WHERE id = :id');
            $sql -> execute(["id" => $id]);
            

            $results = $sql->fetchAll(PDO::FETCH_OBJ);

            
        } catch(PDOException $e){
            echo $e->getMessage();
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
    <table>
   <?php foreach($results as $user){ ?>
        <tr>
            <td> <?php echo $user->id; ?></td>
            <td> <?php echo $user->first_name; ?></td>
            <td> <?php echo $user->last_name; ?></td>
            <td> <?php echo $user->age; ?></td>
            <td>
                <a href="/update.php?id=<?php echo $user->id; ?>">edit</a>
            </td> 
            <td>
                <a onclick="confirm()"  href="/delete.php?id=<?php echo $user->id; ?>">delete</a>
            </td> 
        </tr>
    <?php }?>
   </table>
   
</body>
</html>