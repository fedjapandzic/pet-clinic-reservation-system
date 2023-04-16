<?php
require_once __DIR__ . '/../../config.php';


class BaseDao
{
    protected $conn;
    protected $table_name;

    //Constructor

    public function __construct($table_name)
    {
        $this->table_name = $table_name;
        $host = Config::$host;
        $username = Config :: $username;
        $password = Config::$password;
        $schema = Config::$database;
        $port = Config::$port;
        $this->conn = new PDO("mysql:host=$host;dbname=$schema", $username, $password);
    $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    //Method to read all objects from the database

    public function get_all(){
        $stmt = $this->conn->prepare("SELECT * FROM ".$this->table_name);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    //Method to read object from database by ID
    public function get_by_id($id){
        $stmt = $this->conn->prepare("SELECT * FROM " . $this->table_name . " WHERE id=:id");
        $stmt->execute(['id'=>$id]);
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return reset($result);
    }

    //Add record to database
    public function add($entity){
        $columns = implode(", ", array_keys($entity));
        $values = implode(", :", array_keys($entity));
        $placeholders = implode(", ", array_fill(0, count($entity), "?"));
      
        $query = "INSERT INTO ".$this->table_name." (".$columns.") VALUES (".$placeholders.")";
        $stmt = $this->conn->prepare($query);
        $stmt->execute(array_values($entity));
      
        $entity['id'] = $this->conn->lastInsertId();
        return $entity;
      }

    //Method to update record in the database

    public function update($id , $entity, $id_column = "id"){
        $query = "UPDATE ".$this->table_name." SET ";
    foreach($entity as $name => $value){
      $query .= $name ."= :". $name. ", ";
    }
    $query = substr($query, 0, -2);
    $query .= " WHERE ${id_column} = :id";

    $stmt= $this->conn->prepare($query);
    $entity['id'] = $id;
    $stmt->execute($entity);
    return $entity;
  }

    //Delete record from the database
    public function delete($id){
        $stmt = $this->conn->prepare("DELETE FROM " . $this->table_name . " WHERE id = :id");
        $stmt->bindParam(':id',$id);
        $stmt->execute();
    }

    protected function query($query,$params = []){
        $stmt = $this ->conn->prepare($query);
        $stmt ->execute($params);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    protected function query_unique($query, $params){
        $results = $this->query($query, $params);
        return reset($results);
    }
}
?>