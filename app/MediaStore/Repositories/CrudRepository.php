<?php
/**
 * Created by PhpStorm.
 * User: kaso
 * Date: 9/27/2014
 * Time: 10:30 PM
 */

namespace MediaStore\Repositories;


interface CrudRepository {
    public function create($data = []);
    public function update($id,$data = []);
    public function delete($id);
    public function read($id);
} 