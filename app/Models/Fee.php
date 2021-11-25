<?php

namespace App\Models;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class Fee extends Model
{
    protected $table = 'feetype';
    protected $db = 'mysql';
    /*
    |--------------------------------------------------------------------------
    | get
    |--------------------------------------------------------------------------
    */
    public function getFeeType(){
        $query = "select * from $this->table";
        return DB::connection($this->db)->select($query);
    }
    /*
    |--------------------------------------------------------------------------
    |  - Deleted
    |--------------------------------------------------------------------------
  
    public function getDeletedFeeType(){
        $query = "select * from $this->table";
        return DB::connection($this->db)->select($query);
    }
      */
    /*
    |--------------------------------------------------------------------------
    |  - Add
    |--------------------------------------------------------------------------
    */
    public function addNewFeeType($data){
        $roleID = DB::connection($this->db)->table($this->table)
        ->insertGetId([
            'name'    => $data['name'],
            'dname' => $data['dname'],
            'code' => $data['code'],
        ]);
    }
}
