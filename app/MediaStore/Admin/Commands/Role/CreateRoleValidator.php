<?php
/**
 * Created by PhpStorm.
 * User: kaso
 * Date: 9/7/2014
 * Time: 11:07 AM
 */

namespace MediaStore\Admin\Commands\Role;


use Laracasts\Validation\FormValidationException;

class CreateRoleValidator {

    protected $rules = [
        'role_name'=>'required'
    ];

    public function validate(CreateRoleCommand $command){
       $response =  \Validator::make(get_object_vars($command),$this->rules);
        if($response->passes())
            return true;
        else
            throw new FormValidationException("Role Validation Failded",$response->errors());
    }
} 