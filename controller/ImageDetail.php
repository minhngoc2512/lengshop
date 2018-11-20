<?php
require_once './model/Model.php';


class ImageDetail extends Model
{
    function getImageDetail($id){
        $data=$this->GetRecord('image_detail',['where'=>"product_id= '$id'"]);
        return $data;
    }
}