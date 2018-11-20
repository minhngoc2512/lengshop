<?php
/**
 * Created by PhpStorm.
 * User: Minhngoc
 * Date: 11/04/2017
 * Time: 09:23
 */


class Model{
    private $host='localhost';
    private $user = 'root';
    private $password = '';
    private  $database  ='project_1';
    private $conn=null;
    function __construct()
    {
        $this->conn = new mysqli($this->host,$this->user,$this->password,$this->database);
        $this->conn->query("set names utf8");
    }

    protected function GetRecord($table,$option=array()){
        $select = isset($option['select'])? $option['select'] : ' * ';
        $where = isset($option['where'])? ' WHERE '. $option['where'] : '';
        $order_by = isset($option['order_by'])? ' ORDER BY' .$option['order_by']: '';
        $limit = isset($option['limit'])? ' LIMIT ' .$option['limit'] : '';
        $sql = "SELECT $select FROM $table $where $order_by $limit";
        $value = $this->conn->query($sql);
        $data=array();
        while($row = $value->fetch_assoc()){
            $data[]=$row;
        }
        return $data;
    }
    public function check($table,$value){
        $sql = "SELECT * FROM $table where name='$value'";
        $result = $this->conn->query($sql);
        if($result->num_rows>0){
            return false;
        }else{
            return true;
        }

    }
    protected function AddData($table,$value=array()){
        $name=$value['name'];
        $data='';
        if($this->check($table,$name)){
            foreach ($value as $result){
                $data.=",'$result''";
            }
            $sql ="INSERT INTO FROM $table VALUES (null $data)";
            $this->conn->query($sql);

            return true;
        }else{
            return false;
        }

    }

    protected function UpdateRecord($table,$value=array(),$id){
        $data ='';
        $i=0;

        foreach($value as $key =>$result){
            if($result!=null){
            if($i==0) {
                $data .= " $key='$result'";
                $i++;
            }
            $data.=", $key='$result'";

            }
        }
        $sql = "UPDATE $table SET $data WHERE id=$id";
        if($this->conn->query($sql)->num_rows>0){
            return true;
        }
        return false;

    }



    protected function DeleteImage($table,$data=array()){
        foreach ($data as $key =>$value){
            $sql = "DELETE FROM $table WHERE $key='$value'";
            $this->conn->query($sql);

        }

    }

    protected function DeleteProduct($table,$data=array()){
        foreach ($data as $key =>$value){
            $idPro=$this->GetRecord('products',['select'=>"id",'where'=>"cate_id='$value'"]);
            foreach ($idPro as $ValueidPro){
                $this->DeleteImage('image',['product_id'=>$ValueidPro['id']]);
            }

            $sql="DELETE FROM $table WHERE $key='$value'";
            $this->conn->query($sql);
        }
    }

    protected function DeleteCat($table,$data=array()){
        foreach ($data as $key =>$value){
            $this->DeleteProduct('products',['cate_id'=>$value]);


            $sql = "DELETE FROM $table WHERE $key='$value'";
            $this->conn->query($sql);

        }

    }
    protected function DeleteUs($id){
        $sql = "DELETE FROM user WHERE id=$id";
        $this->conn->query($sql);


    }
    protected function CheckLogin($data=array()){
        $name = $data['name'];
        $pass = md5($data['pass']);
        $sql = "SELECT * FROM user WHERE username='$name' AND password='$pass' AND level=1";
        $value = $this->conn->query($sql);
        if($value->num_rows>0){
            return true;
        }
        else{
            return false;
        }

    }
}
