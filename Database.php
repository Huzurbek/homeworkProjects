<?php
class Database {
    public $pdo;
    function __construct()
    {
        $this->pdo=new PDO("mysql:host=localhost; dbname=test","root","root");
    }
    //Get User by Email:
    public function get_user_by_email($email){
        $statement=$this->pdo->prepare("SELECT * FROM level_2 WHERE email=:email");
        $statement->execute([
            'email'=>$email
        ]);
        $result=$statement->fetch(PDO::FETCH_ASSOC);
        return $result;
    }
    //Get one by id:
    public function getOneById($id){
        $statement=$this->pdo->prepare("SELECT * FROM level_2 WHERE id=:id");
        $statement->bindParam(':id',$id);
        $statement->execute();
        $result=$statement->fetch(PDO::FETCH_ASSOC);
        return $result;
    }
    //Get All:
    public function getAll(){
        $sql = "SELECT * FROM level_2";
        $statement = $this->pdo->prepare($sql);
        $statement->execute();
        $results = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $results;
    }
    //Add User:
    public function store($table, $data)
    {
        $keys = array_keys($data);
        $stringOfKeys = implode(',', $keys);
        $placeholders = ":" . implode(', :', $keys);
        $sql = "INSERT INTO $table ($stringOfKeys) VALUES ($placeholders)";
        $statement = $this->pdo->prepare($sql);
        $statement->execute($data);
    }
    //Update:
    public function update( $data)
    {
        $fields = '';
        foreach($data as $key => $value) {
            $fields .= $key . "=:" . $key . ",";
        }
        $fields = rtrim($fields, ',');
        $sql = "UPDATE level_2 SET $fields WHERE id=:id";
        $statement = $this->pdo->prepare($sql);
        $result=$statement->execute($data);
        return $result;
    }
    //Delete:
    public function delete($id)
    {
        $sql = "DELETE FROM level_2 WHERE id=:id";
        $statement = $this->pdo->prepare($sql);
        $statement->bindParam(":id", $id);
        $statement->execute();
    }

    /*public function add_user($email,$password,$role=false){
        $statement=$this->pdo->prepare("INSERT INTO level_2 (email,password,is_admin) VALUES (:email,:password,:is_admin)");
        $result=$statement->execute([
            'email'=>$email,
            'password'=>password_hash($password,PASSWORD_DEFAULT),
            'is_admin'=>$role
        ]);
        return $result;
    }*/
    //Login in:
    public function login($email,$password){
        $user=$this->get_user_by_email($email);
        if(empty($user)){
            $this->flash_message('danger','Incorrect Email');
            $this->redirect_to('page_login.php');
        }elseif (!password_verify($password,$user['password'])){
            $this->flash_message('danger','Incorrect Password');
            $this->redirect_to('page_login.php');
        }
            $_SESSION['user']=$user;
            $this->redirect_to('users.php');

    }
    //Check Status of Admin:
    public function is_admin($user){
          return $user['is_admin'];
    }

    //Flash Message:
    public function flash_message($name,$message){
        $_SESSION[$name]=$message;
    }
    //Redirect to other page:
    public function redirect_to($path){
            header("Location:{$path}");
            exit;
    }
    //Display Flash Message:
    public function display_flash_message($name){
        if(isset($_SESSION[$name])){
            echo "<div class=\"alert alert-{$name} text-dark\" role=\"alert\">{$_SESSION[$name]}</div>";
            unset($_SESSION[$name]);
        }
    }
    //Upload Image:
    public function uploadImage($image){
        $extension=pathinfo($image['name'],PATHINFO_EXTENSION);
        $filename=uniqid().".".$extension;
        move_uploaded_file($image['tmp_name'],"img/demo/avatars/".$filename);

        return $filename;
    }
    //Set status:
    public function setStatus($status){
        $result='';
        if($status=='Онлайн'){
            $result='success';
        }elseif ($status=='Отошел'){
            $result='warning';
        }elseif ($status=='Не беспокоить'){
            $result='danger';
        }
        return $result;
    }

    //Loged user Id
    public function is_author($logged_user_id,$edit_user_id){
            if($logged_user_id==$edit_user_id){
                return true;
            }
    }

}
?>