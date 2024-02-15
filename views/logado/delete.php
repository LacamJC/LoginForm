<?php
 
    require_once '../../connection.php';
    require_once '../../models/Usuario.php';
   
    session_start();
//    echo $_SESSION['user']->getId();
    
    try{
        $id = $_GET['id'];
        if($id == $_SESSION['user']->getId()){
            echo "You cannot delete your own profile.";
            echo "<script>window.history.back()</script>";
            exit();
        }else{
            $sql = 'DELETE FROM users WHERE id = ? LIMIT 1';
            $stmt = $conn->prepare($sql);
            $stmt->execute([$id]);

            if($stmt->rowCount() > 0)
            {
                echo "Successfull !"; 
                echo "<script>window.history.back()</script>";
            }else{
                echo "Failed on delete row";
                echo "<script>window.history.back()</script>";
            }
        }
    }catch(PDOException $e){
        echo "Error: ". $e->getMessage();
    }finally{
        $conn = null;
    }
    
    
?>