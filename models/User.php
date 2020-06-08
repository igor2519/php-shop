<?php

class User{
public static function register($name, $email, $password){

    
    $db = Db::getConnection();
    $query =  " INSERT INTO `user` ( `name`, `email`, `password`, `role`) VALUES (:name, :email, :password ,' ')";


    $result = $db->prepare($query);
    $result->bindParam(':name', $name, PDO::PARAM_STR);
    $result->bindParam(':email', $email, PDO::PARAM_STR);
    $result->bindParam(':password', $password, PDO::PARAM_STR);

    return $result->execute();

}


    public static function checkName($name)
    {
        if (strlen($name) >= 2) {
            return true;
        }

        return false;
    }

    
    public static function checkEmail($email)
    {
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return true;
        }

        return false;
    }

    
    public static function checkPassword($password)
    {
        if (strlen($password) >= 6) {
            return true;
        }

        return false;
    }
    public static function checkPhone($phone)
     {
        if (strlen($phone) >= 10) {
            return true;
        }

        return false;
    //     $pattern = "/^[+][38][0-9]{3}[0-9]{8}$/";
    //     if (preg_match($pattern, $phone)) {
    //         return true;
    //     }
    //     return false;
    }

    public static function checkEmailExists($email)
    {
        $db = Db::getConnection();

        $query = "SELECT COUNT(*) FROM user WHERE email = :email";

        $result = $db->prepare($query);
        $result->bindParam(':email', $email, PDO::PARAM_STR);
        $result->execute();

        if ($result->fetchColumn()) 
            return true;
        
        return false;
    }
    public static function checkUserData($email, $password)
    {
        $db = Db::getConnection();

        $query = "SELECT * FROM user WHERE email = :email AND password=:password";

        $result = $db->prepare($query);
        $result->bindParam(':email', $email, PDO::PARAM_STR);
        $result->bindParam(':password', $password, PDO::PARAM_STR);
        $result->execute();

        $user = $result->fetch();
        if ($user) {
            
                return $user['id'];
            
        }

        return false;
    }
    public static function auth($userId)
    {
     
        $_SESSION['user'] = $userId;
    }


    public static function checkLogged()
    {
        if (isset($_SESSION['user'])) {
            return $_SESSION['user'];
        }

        header("Location: /user/login");
    }


 
    public static function isGuest()
    {
        
        if (isset($_SESSION['user'])) {
            return false;
        }

        return true;
    }

  
    public static function getUserById($id)
    {
        if ($id) {
            $db = Db::getConnection();

            $query = 'SELECT * FROM user WHERE id = :id';

            $result = $db->prepare($query);
            $result->bindParam(':id', $id, PDO::PARAM_INT);

            $result->execute();

            return $result->fetch();
        }
    }

   
    public static function edit($id, $name, $password)
    {
        $db = Db::getConnection();

        $query = "UPDATE user SET name = :name, password = :password WHERE id = :id";

        $result = $db->prepare($query);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        $result->bindParam(':name', $name, PDO::PARAM_STR);
        $result->bindParam(':password', $password, PDO::PARAM_STR);

        return $result->execute();
    }


    // public static function editUserPassword($userId, $password_new)
    // {
    //     $password = password_hash($password_new, PASSWORD_DEFAULT);
    //     $db = DataBase::getConnection();

    //     $sql = 'UPDATE user SET password = :password WHERE id = :userId';

    //     $result = $db->prepare($sql);
    //     $result->bindParam(':userId', $userId, PDO::PARAM_STR);
    //     $result->bindParam(':password', $password, PDO::PARAM_STR);

    //     return $result->execute();
    // }
}


