<?php
require_once './model/Model.php';


class Product extends Model
{

    function GetAllPro()
    {
        $data = $this->GetRecord('products');
        return $data;
    }

    function getPagination($numberPage)
    {
        $data = $this->GetRecord('products', ['limit' => "$numberPage,6"]);
        return $data;
    }

    function getPaginationByCate_id($id, $numberPage)
    {
        $data = $this->GetRecord('products', ['where' => "cate_id=$id", 'limit' => "$numberPage,6"]);
        return $data;
    }

    function GetAPro($id)
    {
        $data = $this->GetRecord("products", ['where' => "id='$id'"]);
        return $data;
    }

    function GetCate_id($id)
    {
        $data = $this->GetRecord('products', ['where' => "cate_id='$id'"]);
        return $data;
    }

    function GetAProName($name)
    {
        $data = $this->GetRecord("products", ['where' => "name='$name'"]);
        return $data;
    }

    function GetType($type)
    {

        $data = $this->GetRecord("products", ['where' => "type='$type'"]);
        return $data;

    }

    function search($name)
    {

        $data = $this->GetRecord('products', ['where' => 'name', 'like' => $name]);
        return $data;

    }


}