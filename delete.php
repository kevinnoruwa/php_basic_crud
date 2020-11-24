<?php
      require("database/connection.php");
    
      if($_SERVER["REQUEST_METHOD"] == "GET"  && isset($_GET["id"])) {
          $id = $_GET["id"];
        
        try {
            $sql = $pdo->prepare('DELETE FROM users WHERE id = :id');
            $sql->execute(["id"=>$id]);   
            
            echo "<script>location.href='/read.php?show=all'</script>";
            
        } catch (PDOException $e) {
            echo  $e->getMessage();
        } 
} else {
    echo "<script>location.href='/read.php?show=all'</script>";
    die();
}
    
    
?>

