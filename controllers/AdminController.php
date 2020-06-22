<?php


class AdminController
{
    public function actionIndex($page = 1)
    {
        $userId = User::checkLogged();
        $user = User::getUserById($userId);
        $userPagination = [];
        $userPagination = User::getListUserInPage($page);
        $total = User::getTotalUserInPage($userPagination);
        $pagination = new Pagination($total, $page, User::SHOW_BY_DEFAULT, 'page-');
        require_once(ROOT . '/views/admin/index.php');
        return true;
    }

    public function actionUpdate($id)
    {
        $userId = User::checkLogged();
        $user = User::getUserById($userId);
        $userList = User::getUsersSelectById($id);
        if (isset($_POST['submit'])) {

            $options['text'] = $_POST['text'];

            if (!empty($_POST['status'])) {
                if (!empty($_POST['status'])) {
                    $options['status'] = 1;
                } else {
                    $options['status'] = 0;
                }
            }

            if ($_POST['submit']) {
                $options['admin_is'] = 1;
            }

            $success = false;
            if (User::updateUserById($id, $options)) {
                $success[] = 'Данный было изменено';
            }
        }

        require_once(ROOT . '/views/admin/update.php');
        return true;
    }
}
