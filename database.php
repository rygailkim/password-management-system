<?php

Class Database {

    private $server = "mysql:host=localhost;dbname=password-management-system";
    private $user = "root";
    private $pass = "";
    private $options = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC);
    protected $con;

    public function openConnection()
    {
        try
        {
            $this->con = new PDO($this->server, $this->user, $this->pass, $this->options);
            return $this->con;

        } catch(PDOException $e)
        {
            echo "Error: ". $e->getMessage();
        }
    }

    public function closeConnection()
    {
        $this->con = null;
    }

    public function getUsers(){
        $connection = $this->openConnection();
        $stmt = $connection->prepare("SELECT * FROM users");
        $stmt->execute();
        $users = $stmt->fetchAll();
        $userCount = $stmt->rowCount();

        if($userCount > 0){
            return $users;
        } else {
            return 0;
        }

    }

    public function login()
    {
        if(isset($_POST['submit'])){
            
            $password = md5($_POST['password']);
            $username = $_POST['username'];
            
            //login success
            $connection = $this->openConnection();
            $stmt = $connection->prepare("SELECT * FROM users WHERE username = ? AND password = ?");
            $stmt->execute([$username, $password]);
            $total = $stmt->rowCount();

            if($total > 0){
                echo "Login Success!";
            } else {
                echo "Login Failed!";
            }
        }
    }

    public function check_user_exist($username)
    {
        $connection = $this->openConnection();
        $stmt = $connection->prepare("SELECT * FROM users WHERE username = ?");
        $stmt->execute([$username]);
        $total = $stmt->rowCount();

        return $total;
    }

    public function add_user()
    {
        if(isset($_POST['register'])){
            $username = $_POST['username'];
            $password = md5($_POST['password']);

            if($this->check_user_exist($username) == 0)
            {
                $connection = $this->openConnection();
                $stmt = $connection->prepare("INSERT INTO users(`username`, `password`) VALUES(?,?)");
                $stmt->execute([$username, $password]);
            } else {
                echo "user already exists";
            }
        }
    }
}

$database = new Database();