<?php
/**
 * Created by PhpStorm.
 * User: kaso
 * Date: 10/1/2014
 * Time: 5:37 PM
 */

namespace MediaStore\Mediapartner\Settings;


use MediaStore\Services\CommandValidator;

class CreateSettingsValidator extends CommandValidator {

    protected $rules = [
        'business_logo' => 'image',
        'business_background_color' => '',
        'business_name' => 'required',
        'business_tagline'=>'required'
    ];

    protected function getRules()
    {
        return $this->rules;
    }
}