<?php

namespace app\models;

use app\core\AppSessionHandler;
use app\core\DB;
use app\core\Helper;
use app\core\validation;

class User extends DB
{
    public $validation;
    public $session;
    public function __construct()
    {
        parent::__construct();
        $this->table = "users";
        $this->validation = new validation();
        $this->session = AppSessionHandler::getInstanse();
    }

    public function register()
    {
        $errors = $this->validate();
        if (empty($errors) && $this->store()) {
            $this->session->userEmail = $_POST['email'];
            Helper::redirect(Helper::$controllersSitePagesPath . "index.php");
        } else {
            $this->session->registerData = [
                'name' => $_POST['name'],
                'email' => $_POST['email'],
            ];
            Helper::redirect(Helper::$controllersSitePagesPath . "register.php");
        }
    }

    public function login()
    {
        $this->validation->input('email')->email();
        $this->validation->input('password')->min(4);
        $errors = $this->validation->showErorr();
        $this->session->start();
        $this->session->loginErrors = $errors;
        if (empty($errors) && $this->isValidUser()) {
            $this->session->userEmail = $_POST['email'];
            Helper::redirect(Helper::$controllersSitePagesPath . "index.php");
        } else {
            $this->session->loginData = [
                'email' => $_POST['email']
            ];
            if (!$this->isValidUser() && isset($_POST['password'])) {
                $this->session->password_credintials = "password don't match your email";
            }
            Helper::redirect(Helper::$controllersSitePagesPath . "login.php");
        }
    }

    // public function redirectIfNotAuth()
    // {
    //     $this->session->start();
    //     if (!isset($this->session->userEmail)) {
    //         Helper::redirect(Helper::$adminPagesPath . 'login.php');
    //     }
    // }

    public function redirectIfAuth()
    {
        $this->session->start();
        if (isset($this->session->userEmail)) {
            Helper::redirect(Helper::$controllersSitePagesPath . 'index.php');
        }
    }

    public function logout()
    {
        $this->session->kill();
        Helper::redirect(Helper::$controllersSitePagesPath . 'index.php');
    }

    public function store()
    {
        return $this->insert([
            'name' => $_POST['name'],
            'email' => $_POST['email'],
            'password' => password_hash($_POST['password'], PASSWORD_BCRYPT),
            'is_admin' => 0
        ])->excute();
    }

    public function isValidUser()
    {
        $email = $_POST['email'];
        $user = $this->select('*')->where('email', '=', $email)->getRow();
        if (isset($user)) {
            return password_verify($_POST['password'], $user['password']) && $user['is_admin'] == 0;
        }
        return false;
    }

    private function validate()
    {
        $this->validation->input('name')->string();
        $this->validation->input('email')->email();
        $this->validation->input('password')->min(4);
        $this->validation->input('confirm_password')->min(4);
        $errors = $this->validation->showErorr();
        if ($_POST['password'] !== $_POST['confirm_password']) {
            $errors['password_match'] = "the password don't match";
        }
        $this->session->start();
        $this->session->registerErrors = $errors;
        return $errors;
    }
}
