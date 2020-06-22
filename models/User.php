<?php

class User
{

    const SHOW_BY_DEFAULT = 3;

    /**
     * @param integer $id 
     */
    public static function getUsersSelectById($id)
    {
        $db = Db::getConnection();

        $sql = 'SELECT * FROM user WHERE id = :id';

        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);

        $result->setFetchMode(PDO::FETCH_ASSOC);

        $result->execute();

        return $result->fetch();
    }

    /**
     * @param integer $id 
     * @param array $options array
     */
    public static function updateUserById($id, $options)
    {
        $db = Db::getConnection();

        $sql = "UPDATE user SET text = :text, status = :status, admin_is = :admin_is WHERE id = :id";

        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        $result->bindParam(':text', $options['text'], PDO::PARAM_STR);
        $result->bindParam(':status', $options['status'], PDO::PARAM_INT);
        $result->bindParam(':admin_is', $options['admin_is'], PDO::PARAM_INT);

        return $result->execute();
    }

    /**
     * @param type string $name
     * @param type string $fullname
     * @param type string $email
     * @param type string $text
     */

    public static function taskFor($name, $fullname, $email, $text)
    {

        $db = Db::getConnection();

        $sql = 'INSERT INTO user (name, fullname, email, text) '
            . 'VALUES (:name, :fullname, :email, :text)';

        $result = $db->prepare($sql);
        $result->bindParam(':name', $name, PDO::PARAM_STR);
        $result->bindParam(':fullname', $fullname, PDO::PARAM_STR);
        $result->bindParam(':email', $email, PDO::PARAM_STR);
        $result->bindParam(':text', $text, PDO::PARAM_STR);
        return $result->execute();
    }

    /**
     * @param string $username
     * @param string $password
     * @return mixed : ingeger user id or false
     */
    public static function checkUserData($username, $password)
    {
        $db = Db::getConnection();

        $sql = 'SELECT * FROM user WHERE username = :username AND password = :password';

        $result = $db->prepare($sql);
        $result->bindParam(':username', $username, PDO::PARAM_INT);
        $result->bindParam(':password', $password, PDO::PARAM_INT);
        $result->execute();

        $user = $result->fetch();
        if ($user) {
            return $user['id'];
        }

        return false;
    }

    /**
     * @param string $username
     * @param string $password
     */
    public static function auth($userId)
    {
        $_SESSION['user'] = $userId;
    }

    /**
     * Admin
     */

    public static function checkLogged()
    {
        if (isset($_SESSION['user'])) {
            return $_SESSION['user'];
        }

        header("Location: /user/login");
    }

    /**
     * Validate
     */

    public static function checkName($name)
    {
        if (strlen($name) >= 3) {
            return true;
        }
        return false;
    }

    public static function checkPassword($password)
    {
        if (strlen($password) >= 3) {
            return true;
        }
        return false;
    }

    public static function checkFullname($fullname)
    {
        if (strlen($fullname) >= 3) {
            return true;
        }
        return false;
    }

    public static function checkText($text)
    {
        if (strlen($text) >= 10) {
            return true;
        }
        return false;
    }

    /**
     * Validate email
     */
    public static function checkEmail($email)
    {
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return true;
        }
        return false;
    }

    public static function checkEmailExists($email)
    {

        $db = Db::getConnection();

        $sql = 'SELECT COUNT(*) FROM user WHERE email = :email';

        $result = $db->prepare($sql);
        $result->bindParam(':email', $email, PDO::PARAM_STR);
        $result->execute();

        if ($result->fetchColumn())
            return true;
        return false;
    }



    public static function checkUsername($username)
    {
        if (filter_input(INPUT_POST, $username, FILTER_SANITIZE_SPECIAL_CHARS)) {
            return true;
        }
        return false;
    }

    public static function checkUsernameExists($username)
    {

        $db = Db::getConnection();

        $sql = 'SELECT COUNT(*) FROM user WHERE username = :username';

        $result = $db->prepare($sql);
        $result->bindParam(':username', $username, PDO::PARAM_STR);
        $result->execute();

        if ($result->fetchColumn())
            return true;
        return false;
    }

    /**
     * Returns user by id
     * @param integer $id
     */
    public static function getUserById($id)
    {
        if ($id) {
            $db = Db::getConnection();
            $sql = 'SELECT * FROM user WHERE id = :id';

            $result = $db->prepare($sql);
            $result->bindParam(':id', $id, PDO::PARAM_INT);

            $result->setFetchMode(PDO::FETCH_ASSOC);
            $result->execute();


            return $result->fetch();
        }
    }


    public static function getListUserInPage($page = 1)
    {
        $limit = User::SHOW_BY_DEFAULT;
        $offset = ($page - 1) * self::SHOW_BY_DEFAULT;

        $db = Db::getConnection();

        $sql = 'SELECT id, name, fullname, status, text, email, admin_is FROM user' . ' ORDER BY id DESC LIMIT :limit OFFSET :offset';

        $result = $db->prepare($sql);
        $result->bindParam(':limit', $limit, PDO::PARAM_INT);
        $result->bindParam(':offset', $offset, PDO::PARAM_INT);

        $result->execute();

        $i = 0;
        $user = [];
        while ($row = $result->fetch()) {
            $user[$i]['id'] = $row['id'];
            $user[$i]['name'] = $row['name'];
            $user[$i]['fullname'] = $row['fullname'];
            $user[$i]['status'] = $row['status'];
            $user[$i]['text'] = $row['text'];
            $user[$i]['email'] = $row['email'];
            $user[$i]['admin_is'] = $row['admin_is'];
            $i++;
        }
        return $user;
    }

    public static function getTotalUserInPage($userPagination)
    {
        $db = Db::getConnection();
        $sql = 'SELECT count(id) AS count FROM user';
        $result = $db->prepare($sql);
        $result->bindParam(':id', $userPagination, PDO::PARAM_INT);
        $result->execute();
        $row = $result->fetch();
        return $row['count'];
    }
}
