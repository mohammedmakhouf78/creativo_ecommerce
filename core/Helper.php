<?php

namespace app\core;

use app\models\Admin;

class Helper
{
    public static $controllersPagesPath = "../../../views/admin/pages/";
    public static $adminPagesPath = "../";
    public static $controllersSitePagesPath = "../../../views/site/pages/";
    public static function redirect($path)
    {
        header("location: $path");
    }

    public static function formInput($table, $name, $session)
    {
        $data = isset($session->{"$table" . "Data"}[$name]) ? $session->{"$table" . "Data"}[$name] : "";
        $errorMsg = "";
        if (isset($session->{"$table" . "Errors"})) {
            $errorMsg = $session->{"$table" . "Errors"}[$name] ?? "";
        }

        $controller = <<<END
            <div class="form-group">
                <label for="$name">$name</label>
                <input type="text" class="form-control" placeholder="Enter $name" id="$name" name="$name" value="$data">
                <p class="text-danger">
                        $errorMsg
                </p>
            </div>
        END;

        return $controller;
    }

    public static function formTextArea($table, $name, $session)
    {
        $data = isset($session->{"$table" . "Data"}[$name]) ? $session->{"$table" . "Data"}[$name] : "";
        $errorMsg = "";
        if (isset($session->{"$table" . "Errors"})) {
            $errorMsg = $session->{"$table" . "Errors"}[$name] ?? "";
        }

        $controller = <<<END
            <div class="form-group">
                <label for="$name">$name</label>
                <textarea name="$name" id="$name" class="form-control" placeholder="Enter $name" cols="30" rows="10" >$data</textarea>
                <p class="text-danger">
                        $errorMsg
                </p>
            </div>
        END;

        return $controller;
    }

    public static function formInputUpdate($table, $name, $session, $data)
    {
        // $data = "$table" . "Data"[$name];
        $errorMsg = "";
        if (isset($session->{"$table" . "Errors"})) {
            $errorMsg = $session->{"$table" . "Errors"}[$name] ?? "";
        }
        $controller = <<<END
            <div class="form-group">
                <label for="$name">$name</label>
                <input type="text" class="form-control" placeholder="Enter $name" id="$name" name="$name" value="$data">
                <p class="text-danger">
                        $errorMsg
                </p>
            </div>
        END;

        return $controller;
    }

    public static function formTextAreaUpdate($table, $name, $session, $data)
    {
        $errorMsg = "";
        if (isset($session->{"$table" . "Errors"})) {
            $errorMsg = $session->{"$table" . "Errors"}[$name] ?? "";
        }

        $controller = <<<END
            <div class="form-group">
                <label for="$name">$name</label>
                <textarea name="$name" id="$name" class="form-control" placeholder="Enter $name" cols="30" rows="10" >$data</textarea>
                <p class="text-danger">
                        $errorMsg
                </p>
            </div>
        END;

        return $controller;
    }

    public static function formSelect($table, $name, $session, $arr = [], $vName = "")
    {
        $errorMsg = "";
        if (isset($session->{"$table" . "Errors"})) {
            $errorMsg = $session->{"$table" . "Errors"}[$name] ?? "";
        }
        $label = explode("_", $name)[0];
        $controller = <<<END
            <div class="form-group">
                <label for="$name">$label</label>
                <select class="form-control" name="$name" id="$name">
                    <option selected disabled>Select $label</option>
        END;
        foreach ($arr as $value) {
            $controller .= "<option value='{$value['id']}'>{$value[$vName]}</option>";
        }

        $controller .= <<<END
                </select>
                <p class="text-danger">
                        $errorMsg
                </p>
            </div>
        END;

        return $controller;
    }


    public static function formSelectUpdate($table, $name, $session, $arr = [], $vName = "", $data)
    {
        $errorMsg = "";
        if (isset($session->{"$table" . "Errors"})) {
            $errorMsg = $session->{"$table" . "Errors"}[$name] ?? "";
        }
        $label = explode("_", $name)[0];
        $controller = <<<END
            <div class="form-group">
                <label for="$name">$label</label>
                <select class="form-control" name="$name" id="$name">
        END;
        foreach ($arr as $value) {
            if ($value['id'] == $data) {
                $controller .= "<option selected value='{$value['id']}'>{$value[$vName]}</option>";
            } else {
                $controller .= "<option value='{$value['id']}'>{$value[$vName]}</option>";
            }
        }

        $controller .= <<<END
                </select>
                <p class="text-danger">
                        $errorMsg
                </p>
            </div>
        END;

        return $controller;
    }

    public static function formMultiImage($table, $name, $session)
    {
        $errorMsg = "";
        if (isset($session->{"$table" . "Errors"})) {
            $errorMsg = $session->{"$table" . "Errors"}[$name] ?? "";
        }
        $controller = <<<END
        <div class="input-group">
            <input type="file" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01" name="image[]" multiple="multiple">
            <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
            <p class="text-danger">
                $errorMsg
            </p>
        </div>
        END;

        return $controller;
    }
}
