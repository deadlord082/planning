<?php
class UserController
{
    public function login()
    {
        require __DIR__ . '/../views/user/login.php';
    }

    public function authenticate()
    {
        $email = $_GET["email"] ?? null;
        $password = $_GET["password"] ?? null;
        $user = bdd_request('SELECT id,email,password FROM users WHERE users.email = '.$email)[0];
        if($user != null){
            // TODO: hash mdp
            if($password == $user['password']){
                // TODO: faire un système de cookie/token
                require __DIR__ . '/../views/home.php';
            }
        }
        require __DIR__ . '/../views/user/login.php';
    }

    public function logout()
    {
        // TODO: del token
        require __DIR__ . '/../views/user/login.php';
    }

    public function register()
    {
        require __DIR__ . '/../views/user/register.php';
    }

    public function save()
    {
      $name = $_GET["name"] ?? null;
      $email = $_GET["email"] ?? null;
    //   TODO: hash password
      $password = $_GET["password"] ?? null;
      if($name != null and $email != null and $password != null){
        $teacher = bdd_request('INSERT INTO users (name, email, password) VALUES ("'.$name.'", "'.$email.'", "'.$password.'");');
        require __DIR__ . '/../views/home.php';
      }
    }
}
?>