<?php


class OwnersDao { 
    private $conn;

    //Constructor class
    public function __construct(){
    $servername = "localhost";
    $username = "root";
    $password = "2206";
    $schema = "pet_clinic";
 
    $this->conn = new PDO("mysql:host=$servername;dbname=$schema", $username, $password);
    $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    // Reading all objects from Database 
 public function get_all(){
    $stmt = $this->conn->prepare("SELECT * FROM owners");
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
        
    }

        // Reading Individual objects from Database 
 public function get_by_id($owners_id){
  $stmt = $this->conn->prepare("SELECT * FROM owners WHERE owners_id = :owners_id");
  $stmt->execute(['owners_id' =>$owners_id]);
  $result =  $stmt->fetchAll(PDO::FETCH_ASSOC);
  return @reset($result);
      
  }

    //Adding objects to Database 
 public function insert($owner){
    $stmt = $this->conn-> prepare("INSERT INTO owners(full_name , age) VALUES (':full_name',':age')");
    $stmt ->execute(['full_name'=>$full_name , 'age'=>$age]);
    $owner['owners_id'] = $this->conn->lastInsertId();
    return $owner;
    }

    //Deleting objects from Database
    public function delete($owners_id){
      $stmt = $this->conn-> prepare("DELETE FROM owners WHERE owners_id = :owners_id");
      $stmt->bindParam(':owners_id',$owners_id); //SQL INJECTION PREVENTION 
      $stmt ->execute();

    }

    //Update owner records
    public function update($owners_id,$full_name,$age){
      $stmt = $this->conn-> prepare("UPDATE owners SET full_name = ':full_name' , age = ':age' WHERE owners_id = :owners_id");
      $stmt ->execute(['owners_id'=>$owners_id ,'full_name'=>$full_name , 'age'=>$age]);
    }
}

?>