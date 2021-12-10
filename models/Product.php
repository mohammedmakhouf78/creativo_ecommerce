<?php

namespace app\models;


use app\core\Model;

class Product extends Model
{
    public function __construct()
    {
        parent::__construct();
        $this->table = "products";
    }

    public function validate()
    {
        $this->validation->input('name')->required();
        $this->validation->input('price')->float();
        $this->validation->input('count')->integer();
        $this->validation->input('description')->required();
        $this->validation->input('brand_id')->integer();
        $this->validation->input('category_id')->integer();

        return $this->commitValidation();
    }

    public function deleteValidation()
    {
        $this->validation->input('id')->required();
        return $this->commitValidation();
    }
}
