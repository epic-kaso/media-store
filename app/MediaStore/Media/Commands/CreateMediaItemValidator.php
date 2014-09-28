<?php
/**
 * Created by PhpStorm.
 * User: kaso
 * Date: 9/27/2014
 * Time: 12:37 PM
 */

namespace MediaStore\Media\Commands;


use Laracasts\Validation\FormValidationException;
use MediaStore\Context\Context;

class CreateMediaItemValidator {


    protected $rules;

    function __construct(Context $context)
    {
        $this->rules = [
            'album_art' => 'required|image',
            'file' => 'required',
            'title'=>"required|unique:media_items,title,NULL,id,{$context->column_name()},{$context->id()}",
            'price'=>'required|numeric'
        ];
    }

    public function validate(CreateMediaItemCommand $command){
        $data = [
            'album_art'=>$command->album_art,
            'file'=>$command->file,
            'title'=>$command->title,
            'price'=>$command->price
        ];
        $validation = \Validator::make($data,$this->rules);
        if($validation->fails()){
            throw new FormValidationException('Validation failed',$validation->errors());
        }
        return true;
    }
} 