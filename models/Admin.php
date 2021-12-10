<?php

namespace app\models;

use app\core\AppSessionHandler;
use app\core\Helper;
use app\core\Model;

class Admin extends Model
{
    public $session;
    public static $instance = null;
    public function __construct()
    {
        parent::__construct();
        $this->table = "users";
        $this->session = AppSessionHandler::getInstanse();
    }

    public static function getInstanse()
    {
        if (self::$instance == null) {
            self::$instance = new Admin();
        }
        return self::$instance;
    }

    public function getAdmins()
    {
        return $this->select("*")->where("is_admin", "=", "1")->getAll();
    }

    public function checkAuth()
    {
        $admins = $this->getAdmins();
        foreach ($admins as $admin) {
            if ($admin['email'] === $_POST['email'] && $admin['password'] === $_POST['password']) {
                return true;
            }
        }
        return false;
    }

    public function redirectIfNotAuth()
    {
        $this->session->start();
        if (!isset($this->session->admin['email'])) {
            Helper::redirect(Helper::$adminPagesPath . 'users/login.php');
        }
    }

    public function redirectIfAuth()
    {
        $this->session->start();
        if (isset($this->session->admin['email'])) {
            Helper::redirect(Helper::$adminPagesPath . 'home/index.php');
        }
    }

    public function logout()
    {
        $this->session->kill();
        Helper::redirect(Helper::$controllersPagesPath . 'users/login.php');
    }
}
