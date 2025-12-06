<?php

class DB
{

    private $connection;

    private $servername = "localhost";

    private $username = "root";

    private $password = "";

    public $name;

    public $username_form;

    public $mobile;

    public $ID;

    public $location_Forward;





    public function __construct()
    {

        try {
            $this->connection = new PDO("mysql:host=$this->servername;dbname=test", $this->username, $this->password);

            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {

            echo "Connection failed: " . $e->getMessage();
        }
    }



    public function Insert($name, $username_form, $mobile, $location_Forward)
    {

        $this->name = $name;

        $this->$username_form = $username_form;

        $this->location_Forward = $location_Forward;


        $this->mobile = $mobile;

        $query = "INSERT INTO users (name, Username, Mobile) VALUES (:name,:username,:mobile)";

        $stmt = $this->connection->prepare($query);

        $stmt->bindParam(':name', $this->name);
        $stmt->bindParam(':username', $this->$username_form);
        $stmt->bindParam(':mobile', $this->mobile);

        $stmt->execute();


        header("Location:$this->location_Forward");
    }

    public function Update($ID, $name, $username_form, $mobile)
    {
        try {

            $this->ID = $ID;
            $this->name = $name;
            $this->username_form = $username_form;
            $this->mobile = $mobile;

            $query = "UPDATE users 
          SET name = :name, Username = :username, Mobile = :mobile 
          WHERE ID = :id";

            $stmt = $this->connection->prepare($query);

            $stmt->bindParam(':name', $this->name);
            $stmt->bindParam(':username', $this->username_form);
            $stmt->bindParam(':mobile', $this->mobile);
            $stmt->bindParam(':id', $this->ID);

            $stmt->execute();

            echo "Updated";
        } catch (PDOException $e) {

            echo $e->getMessage();
        }
    }

    public function Delete($ID)
    {


        $this->ID = $ID;

        $query = "DELETE FROM  users WHERE ID = :id";

        $stmt = $this->connection->prepare($query);

        $stmt->bindParam(':id', $this->ID);

        $stmt->execute();


        echo "Deleted";
    }

    public function Read()
    {

        $query = "SELECT * FROM users ";

        $stmt = $this->connection->prepare($query);

        $stmt->execute();

        $users = $stmt->fetchAll(PDO::FETCH_OBJ);

        return $users;
    }

    public function random_user()
    {

        $query = "SELECT MIN(ID) AS ID FROM users;";
        $stmt = $this->connection->prepare($query);
        $stmt->execute();
        $lessID = $stmt->fetchAll(PDO::FETCH_OBJ);

        var_dump($lessID);


        $query = "SELECT MAX(ID) AS ID FROM users;";
        $stmt = $this->connection->prepare($query);
        $stmt->execute();
        $greaterID = $stmt->fetchAll(PDO::FETCH_OBJ);

        var_dump($greaterID);



        $greaterID_r = (int)$greaterID[0]->ID;
        $lessID_r = (int)$lessID[0]->ID;

        $IDRAND = rand($lessID_r, $greaterID_r);

        echo $IDRAND;
    }
}
