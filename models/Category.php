<?php

namespace app\models;


use app\core\Model;

class Category extends Model
{

    public function __construct()
    {
        parent::__construct();
        $this->table = "categories";
    }

    public function validate()
    {
        $this->validation->input('category')->required();
        return $this->commitValidation();
    }

    public function deleteValidation()
    {
        $this->validation->input('id')->required();
        return $this->commitValidation();
    }
}
