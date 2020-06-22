<?php


class SiteController
{
    public function actionIndex($page = 1)
    {
        $userPagination = [];
        $userPagination = User::getListUserInPage($page);
        $total = User::getTotalUserInPage($userPagination);
        $pagination = new Pagination($total, $page, User::SHOW_BY_DEFAULT, 'page-');

        require_once(ROOT . '/views/site/index.php');

        return true;
    }
}
