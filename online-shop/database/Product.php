<?php

//fetch product data
class Product
{
    public $db = null;

    public function __construct(DBController $db){
        if(!isset($db->con)){
            return null;
        }
        $this->db = $db;
    }

    //fetch product data using getData()
    public function getData($table = 'products'){
        $result = $this->db->con->query("SELECT * FROM {$table}");

        $resultArray = array();

        //fetch product data one by one
        while($item = mysqli_fetch_array($result,MYSQLI_ASSOC)){
            $resultArray[] = $item;
        }

        //print_r($resultArray);
        return $resultArray;
    }

    //get product by item_id
    public function getProduct($item_id = null, $table = 'products'){
        if(isset($item_id)){
            $result = $this->db->con->query("SELECT * FROM {$table} WHERE item_id = {$item_id}");

            $resultArray = array();

            //fetch product data one by one
            while($item = mysqli_fetch_array($result,MYSQLI_ASSOC)){
                $resultArray[] = $item;
            }

            //print_r($resultArray);
            return $resultArray;
        }
    }
}