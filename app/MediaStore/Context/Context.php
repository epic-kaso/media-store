<?php namespace MediaStore\Context;
/**
 * Created by PhpStorm.
 * User: kaso
 * Date: 9/26/2014
 * Time: 2:36 PM
 */

interface Context {

    /**
     * set the model that should be used as the context
     * @param $model
     * @return mixed
     */
    public function set($model);

    /**
     * checks to see if a context is available
     * @return bool
     */
    public function has();

    /**
     * returns the models ID
     * @return mixed
     */
    public function id();

    /**
     * returns the models table name
     * @return mixed
     */
    public function table_name();

    /**
     * returns the contextual column name;
     * @return mixed
     */
    public function column_name();
} 