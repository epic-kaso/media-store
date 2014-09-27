<?php
/**
 * Created by PhpStorm.
 * User: kaso
 * Date: 9/27/2014
 * Time: 10:45 AM
 */

    namespace MediaStore\Media;

interface MediaProcessor {

    public function setMedia($media_path);
    public function getMedia();
    public function getMediaType();
    public function process();
} 