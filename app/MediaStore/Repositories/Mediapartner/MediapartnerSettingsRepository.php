<?php
/**
 * Created by PhpStorm.
 * User: kaso
 * Date: 10/1/2014
 * Time: 12:07 PM
 */

namespace MediaStore\Repositories\Mediapartner;


use MediaStore\Context\Context;
use MediaStore\Repositories\CrudRepository;
use MediaStore\Repositories\TenantRepository;

class MediapartnerSettingsRepository
    extends TenantRepository
    implements CrudRepository {

    public function __construct(\MediapartnerSetting $model, Context $scope)
    {
        $this->model = $model;
        $this->scope = $scope;
    }

    public function create($data = [])
    {
        $data[$this->scope->column_name()] = $this->scope->id();
        $settings = $this->model->create($data);
        return $settings;
    }

    public function update($id, $data = [])
    {
        $model = $this->getFirstByThroughColumn('id',$id);
        $data[$this->scope->column_name()] = $this->scope->id();
        $data['id'] = $id;
        return $model->update($data);
    }

    public function delete($id)
    {
        $model = $this->getFirstByThroughColumn('id',$id);
        return $model->delete();
    }

    public function read($id)
    {
       return $this->getFirstByThroughColumn('id',$id);
    }

    public function get(){
        $settings = $this->model
            ->where($this->scope->column_name(),$this->scope->id())
            ->first();
        return $settings;
    }

    public function buildSettings($business_logo = null,
                         $business_background_color = null,
                         $business_name = null,
                         $business_tagline = null){
        $data = [
            'business_name'=>$business_name,
            'business_tagline'=>$business_tagline,
            'business_background_color'=>$business_background_color,
            'business_logo'=>$business_logo,
            $this->scope->column_name()=>$this->scope->id()
        ];

        $settings = $this->get();

        if(!$settings){
            $settings = $this->create($data);
        }else{
            if(is_null($business_logo))
                unset($data['business_logo']);
            $settings->update($data);
        }

        return $settings;
    }

}