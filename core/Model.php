<?php

namespace app\core;

class Model extends DB
{
    public $validation;
    public $session;

    public function __construct()
    {
        parent::__construct();
        $this->validation = new validation();
        $this->session = AppSessionHandler::getInstanse();
    }

    public function getAllRecords()
    {
        return $this->select("*")->getAll();
    }

    public function createRecord($records, $successPath, $failPath, $imageName = "")
    {
        $errors = $this->validate();
        if (empty($errors) && $this->store($records, $imageName)) {
            $this->session->{"$this->table" . "Success"} = "Proccess done successfully";
            Helper::redirect(Helper::$controllersPagesPath . $successPath);
        } else {
            $this->returnDataWithSession($records);
            Helper::redirect(Helper::$controllersPagesPath . $failPath);
        }
    }

    public function updateRecord($records, $id, $successPath, $failPath)
    {
        $errors = $this->validate();
        if (empty($errors) && $this->edit($records, $id)) {
            $this->session->{"$this->table" . "Success"} = "Proccess done successfully";
            Helper::redirect(Helper::$controllersPagesPath . $successPath);
        } else {
            $this->returnDataWithSession($records);
            Helper::redirect(Helper::$controllersPagesPath . "$failPath?id={$id}");
        }
    }

    public function deleteRecord($id, $successPath, $failPath)
    {
        $errors = $this->deleteValidation();
        if (empty($errors) && $this->remove($id)) {
            $this->session->{"$this->table" . "Success"} = "Proccess done successfully";
            Helper::redirect(Helper::$controllersPagesPath . $successPath);
        } else {
            $this->session->{"$this->table" . "Success"} = "Something went wrong sorry";
            Helper::redirect(Helper::$controllersPagesPath . $failPath);
        }
    }

    public function returnDataWithSession($data)
    {
        $result = [];
        foreach ($data as $value) {
            $result["$value"] = $_POST["$value"];
        }
        $this->session->{"$this->table" . "Data"} = $result;
    }

    public function commitValidation()
    {
        $errors = $this->validation->showErorr();
        $this->session->start();
        $this->session->{"$this->table" . "Errors"} = $errors;
        return $errors;
    }

    public function store($data, $imageName = "")
    {
        $result = [];
        foreach ($data as $value) {
            $result["$value"] = $_POST["$value"];
        }
        if ($imageName != "") {
            $result['image'] = $imageName;
        }
        return $this->insert($result)->excute();
    }

    public function getByID($id)
    {
        return $this->select("*")->where('id', '=', $id)->getRow();
    }

    public function edit($data, $id)
    {
        $result = [];
        foreach ($data as $value) {
            $result["$value"] = $_POST["$value"];
        }
        return $this->update($result)->where('id', "=", $id)->excute();
    }

    public function remove($id)
    {
        return $this->delete()->where('id', '=', $id)->excute();
    }
}
