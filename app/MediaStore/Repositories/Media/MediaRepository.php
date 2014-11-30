<?php
/**
 * Created by PhpStorm.
 * User: kaso
 * Date: 9/26/2014
 * Time: 3:01 PM
 */

namespace MediaStore\Repositories\Media;


use MediaStore\Repositories\CrudRepository;

interface MediaRepository extends CrudRepository {

    public function all(array $with = array());
    public function find($id, array $with = array());
    public function getByPage($page = 1, $limit = 10, $with = array());
    public function getFirstBy($key, $value, array $with = array());
    public function getManyBy($key, $value, array $with = array());
    public function createFromMediaCommand($command,$file_path = null,$file_preview_path = null);
    public function updateFileInfo($media_id,$file_path = null,$file_preview_path = null);

    public function getBySlug($slug);
} 