<?php

class Role extends BaseModel {
	protected $fillable = ['name','description'];
    public static $rules = ['name'=>'required|unique:roles'];


    public static function addNew($name,$description){
        $role = new static(['name'=>$name,'description'=>$description]);
        if($role->save()){
            return $role;
        }else{
            return false;
        }
    }
}