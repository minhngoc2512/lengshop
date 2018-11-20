<?php
require_once ('model/Model.php');
/**
 * Created by PhpStorm.
 * User: Minhngoc
 * Date: 11/04/2017
 * Time: 23:09
 */
class Product extends model{
    function GetAllPro(){
        $data = $this->GetRecord('products');
        return $data;
    }
    function GetAPro($id){
        $data = $this->GetRecord("products",['where'=>"id='$id'"]);
        return $data;
    }
    function GetAProName($name){
        $data = $this->GetRecord("products",['where'=>"name='$name'"]);
        return $data;
    }
    function DeletePro($id){
        $this->DeleteProduct("products",['id'=>$id]);


    }
    function  AddPro($name,$price,$image,$cate_id,$display,$ram,$cpu,$gpu,$power,$intro,$type){
        $data = $this->AddData('products',['name'=>$name,'price'=>$price,'image'=>$image,'cate_id'=>$cate_id,'display'=>$display,'ram'=>$ram,'cpu'=>$cpu,'gpu'=>$gpu,'power'=>$power,'intor'=>$intro,'type'=>$type]);
        if($data==true){
            return true;
        }
        return false;
    }
    function UpdatePro($id,$name=null,$price=null,$image=null,$cate_id=null,$display=null,$ram=null,$cpu=null,$gpu=null,$power=null,$intro=null,$type=null){
        $data= array();
        $data['name']=!empty($name)?$name:null;
        $data['price']=!empty($price)?$price:null;
        $data['image']=!empty($image)?$image:null;
        $data['cate_id']=!empty($cate_id)?$cate_id:null;
        $data['display']=!empty($display)?$display:null;
        $data['ram']=!empty($ram)?$ram:null;
        $data['cpu']=!empty($cpu)?$cpu:null;
        $data['gpu']=!empty($gpu)?$gpu:null;
        $data['power']=!empty($power)?$power:null;
        $data['intro']=!empty($intro)?$intro:null;
        $data['type']=!empty($type)?$type:null;
        $this->UpdateRecord('products',$data);
    }

    function CheckName($name){

        if($this->check('products',$name)){
            return true;
        }
        return false;


    }

}
