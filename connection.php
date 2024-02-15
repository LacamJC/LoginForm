<?php



$username = 'root';
$password = 'b1D551AD-D6aH2FHgcGGd1b2d-G5DfHa';
$dbName = 'railway';
$port = '14490';
$host = 'monorail.proxy.rlwy.net';


//  $username = 'ramajo';
//  $password = '123456';
//  $dbName = 'LoginForm';
//  $port = '3306';
//  $host = '127.0.0.1';
try{
    $conn = new PDO('mysql:host='.$host.';port='.$port.';dbname='.$dbName, $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
//    
    
//    
    
        $sql = 'SHOW TABLES';
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $tableExists = false;
    $tableToCheck = 'users';
    $rootExists = false;

    foreach($resultados as $table){
        if($table['Tables_in_' . $dbName] == $tableToCheck){
            $tableExists = true;
            break;
        }
    }
    
   if(!$tableExists)
   {
       $sqlCreateTable='
            CREATE TABLE users (
                id INT AUTO_INCREMENT PRIMARY KEY,
                user_username varchar(50) NOT NULL,
                user_password varchar(8) NOT NULL,
                user_name varchar(50) NOT NULL,
                user_age int NOT NULL,
                user_sex varchar(10),
                adm TINYINT(1)
            )';
       try{
           $stmtCreateTable = $conn->prepare($sqlCreateTable);
           $stmtCreateTable->execute();
           echo "Table users criada com sucesso";
       }catch(PDOException $e){
           echo "Erro ao criar tabela: " . $e->getMessage();
       }
   }else{
//       echo "A tabela já existe";
       
   }
   
   try{
       
       $sqlSearchRoot = 'SELECT id FROM users WHERE user_username = :username';
       $stmtSearchRoot = $conn->prepare($sqlSearchRoot);
       $stmtSearchRoot->bindParam(':username', $rootUsername, PDO::PARAM_STR);
       $rootUsername = 'Root';
       $stmtSearchRoot->execute();
       
       if($stmtSearchRoot->rowCount() > 0){
//           echo "Usuaroi root já existe";
       }else{
//           echo "Usuario root nao existe";  
           try{
               $sqlInsertRoot = "INSERT INTO users VALUES(1,'Root','000000','Root Manager',00,'M',1)";
               $stmtInsertRoot= $conn->prepare($sqlInsertRoot);
               $stmtInsertRoot->execute();
               
               $sqlInsertDefault = "INSERT INTO users VALUES(2,'JbDefault', '123456', 'James Baxter', 22, 'M', 0)";
               $stmtInsertDefault = $conn->prepare($sqlInsertDefault);
               $stmtInsertDefault->execute();
//               echo "Usuario root e default inserido com sucesso";
           }catch(PDOException $e){
               echo "Erro ao inserir usuario root no banco de dados: " . $e->getMessage();
           }
       }
       
       

   }catch(PDOException $e){
       echo "Erro ao inserir usuario root". $e;
       
   }
} catch(PDOException $e){
    die("Não foi possível se conectar com o banco de dados.");
}
