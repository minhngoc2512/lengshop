<?php
require_once './model/Model.php';
class Category extends Model

{
    function GetAllCat(){
        $data=$this->GetRecord("cates");
        return $data;
    }
    function GetCateParent(){
        $data=$this->GetRecord('cates',['where'=>"parent_id = '0'"]);
        return $data;

    }
    function GetCateSecond($id){
        $data=$this->GetRecord('cates',['where'=>"parent_id = '$id'"]);
        return $data;
    }

}