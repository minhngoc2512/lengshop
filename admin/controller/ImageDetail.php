<?php
require_once ('model/Model.php');
/**
 * Created by PhpStorm.
 * User: Minhngoc
 * Date: 18/04/2017
 * Time: 20:01
 */
class ImageDetail extends Model
{
    function AddImg($name,$productId){
        $this->AddData('image_detail',['name'=>$name,'product_id'=>$productId]);
    }



}