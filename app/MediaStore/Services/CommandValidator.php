<?php
/**
 * Created by PhpStorm.
 * User: kaso
 * Date: 10/1/2014
 * Time: 5:37 PM
 */

namespace MediaStore\Services;


use Laracasts\Validation\FormValidationException;

abstract class CommandValidator {

    public function validate($command){
        $data = get_object_vars($command);
        $validation = \Validator::make($data,$this->getRules());
        if($validation->fails()){
            throw new FormValidationException('Validation failed',
                $validation->errors());
        }
        return true;
    }

    abstract protected  function getRules();
}