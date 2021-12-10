<?php

namespace app\models;


use app\core\Model;

class Brand extends Model
{
    public function __construct()
    {
        parent::__construct();
        $this->table = "brands";
    }

    public function validate()
    {
        $this->validation->input('brand')->required();
        return $this->commitValidation();
    }

    public function deleteValidation()
    {
        $this->validation->input('id')->required();
        return $this->commitValidation();
    }
}
