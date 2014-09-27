<?php
/**
 * Created by PhpStorm.
 * User: kaso
 * Date: 9/26/2014
 * Time: 2:39 PM
 */

namespace MediaStore\Context;


class MediaPartnerContext implements Context {

    private $model;
    private $table_name = "users";
    private $column_name = "mediapartner_id";

    /**
     * set the model that should be used as the context
     * @param $model
     * @return mixed
     */
    public function set($model)
    {
        $this->model = $model;
    }

    /**
     * checks to see if a context is available
     * @return bool
     */
    public function has()
    {
        if(!$this->model) return false;
        return true;
    }

    /**
     * returns the models ID
     * @return mixed
     */
    public function id()
    {
        if($this->has())
            return $this->model->id;
        throw new \Exception('Context Object not set yet');
    }

    /**
     * returns the models table name
     * @return mixed
     */
    public function table_name()
    {
        return $this->table_name;
    }

    /**
     * returns the contextual column name;
     * @return mixed
     */
    public function column_name()
    {
        return $this->column_name;
    }
}