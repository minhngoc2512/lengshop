<?php
require_once 'model/Model.php';


class Category extends Model
{
        function AddCat($name,$parent_id){

            if($this->AddData('cates',['name'=>"$name",'parent_id'=>$parent_id])){
                return true;
            }else{
                return false;
            }

        }
        function GetAllCat(){
            $data=$this->GetRecord("cates");
            return $data;
        }
        function GetACat($id){
            $data=$this->GetRecord('cates',['where'=>"id = '$id'"]);
            return $data;

        }
        function UpdateCat($id,$name,$parent_id){
            $data= array();
            $data['name']=!empty($name)?$name:null;
            $data['parent_id']=!empty($parent_id)?$parent_id:null;
            if($this->UpdateRecord("cates",['id'=>"$id",'name'=>"$name",'parent_id'=>"$parent_id"])){
                return true;
            }else{
                return false;
            }

        }
        function DelCat($id){
            $this->DeleteCat('cates',['id'=>$id]);
        }
}

