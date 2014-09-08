<?php
/**
 * Created by PhpStorm.
 * User: kaso
 * Date: 9/7/2014
 * Time: 10:06 AM
 */

class BaseModel extends \Eloquent {
    protected $errors;

    public static $rules = [];

    public static function boot(){
         static::saving(function($model){
            return $model->validate();
         });
        parent::boot();
    }
    public function validate(){
        $validation = Validator::make($this->attributes,static::$rules);
        if($validation->passes())
            return true;
        $this->errors = $validation->errors();
        return false;
    }

    public function getErrors(){
        return $this->errors;
    }
} 