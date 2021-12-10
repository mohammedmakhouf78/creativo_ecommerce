<?php

namespace app\models;


use app\core\Model;

class ProductImages extends Model
{
    public function __construct()
    {
        parent::__construct();
        $this->table = "product_images";
    }

    public function validate()
    {
        $this->validation->input('product_id')->integer();

        return $this->commitValidation();
    }

    public function deleteValidation()
    {
        $this->validation->input('id')->required();
        return $this->commitValidation();
    }

    public function insertAndHandleImage()
    {
        for ($i = 0; $i < count($_FILES['image']['name']); $i++) {
            move_uploaded_file($_FILES['image']['tmp_name'][$i], "../../../assets/images/products/" . $_FILES['image']['name'][$i]);
            $this->createRecord(
                ['product_id'],
                "product_images/all.php",
                "product_images/create.php",
                $_FILES['image']['name'][$i]
            );
        }
    }
}
