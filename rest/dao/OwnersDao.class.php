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

    function query($query,$params = []){
      $stmt = $this ->conn->prepare($query);
      $stmt ->execute($params);
      return $stmt;
    }
    // Reading all objects from Database 
  public function get_all(){
  $stmt = $this->query("SELECT * FROM owners");
  return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

        // Reading Individual objects from Database 
  public function get_by_id($owners_id){
  $stmt = $this->query("SELECT * FROM owners WHERE owners_id = :owners_id",["owners_id"=>$owners_id]);
  return $stmt->fetchAll(PDO::FETCH_ASSOC);
    
  }

    //Adding objects to Database 
  public function insert($owner){
    $stmt = $this->query("INSERT INTO owners(full_name , age) VALUES (':full_name',':age')",$owner);
    $owner['owners_id'] = $this->conn->lastInsertId();
    return $owner;
    }

     //Update owner records
    public function update($owners_id,$owner){
      $stmt = $this->queru("UPDATE owners SET full_name = ':full_name' , age = ':age' WHERE owners_id = :owners_id",array_merge(["owner_id"=>$owners_id]));
      echo "User updated";
    }

    //Deleting objects from Database
    public function delete($owners_id){
      $stmt = $this->query("DELETE FROM owners WHERE owners_id = :owners_id",["owners_id"=>$owners_id]);
      echo "User Deleted";

    }

}

?>