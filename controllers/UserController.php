<?php


class UserController
{

    public function actionLogin()
    {
        $username = '';
        $password = '';

        if (isset($_POST['submit'])) {
            $username = $_POST['username'];
            $password = $_POST['password'];

            $errors = false;

            if (!User::checkUsername($username)) {
                $errors[] = 'Неправильный логин';
            }
            if (!User::checkPassword($password)) {
                $errors[] = 'Пароль не должен быть короче 3-ти символов';
            }

            $userId = User::checkUserData($username, $password);

            if ($userId == false) {
                $errors[] = 'Неправильные данные Пороль/Логин';
            } else {
                User::auth($userId);
                header("Location: /admin/");
            }
        }

        require_once(ROOT . '/views/user/login.php');

        return true;
    }

    public function actionLogout()
    {
        unset($_SESSION["user"]);
        header("Location: /");
    }

    public function actionTask()
    {

        $name = '';
        $fullname = '';
        $email = '';
        $text = '';
        $result = false;

        if (isset($_POST['submit'])) {
            $name = $_POST['name'];
            $fullname = $_POST['fullname'];
            $email = $_POST['email'];
            $text = $_POST['text'];

            $errors = false;
            $success = false;

            //error

            if (!User::checkName($name)) {
                $errors[] = 'Имя не должно быть не короче 3-х символов';
            }

            if (!User::checkFullname($fullname)) {
                $errors[] = 'Фамилия не должно быть не короче 3-х символов';
            }

            if (!User::checkText($text)) {
                $errors[] = 'Текст задачи не должно быть не короче 10-х символов';
            }

            if (!User::checkEmail($email)) {
                $errors[] = 'Неправильный email';
            }


            if (User::checkEmailExists($email)) {
                $errors[] = 'Такой email уже используется';
            }

            // success

            if ($errors == false) {
                $success[] = 'Данный было добавлено !!!';
            }


            if ($errors == false) {
                $result = User::taskFor($name, $fullname, $email, $text);
            }
        }

        require_once(ROOT . '/views/user/task.php');

        return true;
    }
}
