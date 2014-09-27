<?php
/**
 * Created by PhpStorm.
 * User: kaso
 * Date: 9/26/2014
 * Time: 3:01 PM
 */

namespace MediaStore\Repositories\Media;


interface MediaRepository {

    public function all(array $with = array());
    public function find($id, array $with = array());
    public function getByPage($page = 1, $limit = 10, $with = array());
    public function getFirstBy($key, $value, array $with = array());
    public function getManyBy($key, $value, array $with = array());
} 