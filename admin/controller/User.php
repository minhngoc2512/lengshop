<?php
require_once ('model/Model.php');

/**
 * Created by PhpStorm.
 * User: Minhngoc
 * Date: 11/04/2017
 * Time: 23:09
 */

class User extends Model{

    function GetAUser($id){
        $data = $this->GetRecord('user',['where'=>"id='$id'"]);
        return $data;
    }
    function GetAllUser(){
        $data = $this->GetRecord('user');
        return $data;
    }
    function AddUser($name,$pass,$email,$level){
        $data = $this->AddData('user',['name'=>$name,'password'=>$pass,'email'=>$email,'level'=>$level]);
        return $data;

    }
    function UpdateUser($id,$name,$pass,$email,$level){
        $data = array();
        $data['name']=!empty($name)?$name:null;
        $data['password']=!empty($pass)?md5($pass):null;
        $data['email']=!empty($email)?$email:null;
        $data['level']=!empty($level)?$level:null;
        if($this->UpdateRecord('user',$data,$id)){
            return true;
        }else{
            return false;
        }

    }
    function DeleteUser($id){
        $this->DeleteUs($id);
     }
     function CheckUser($name,$pass){
        if($this->CheckLogin(['name'=>$name,'pass'=>$pass])){

            return true;
        }else{
          return false;
        }

     }

}
