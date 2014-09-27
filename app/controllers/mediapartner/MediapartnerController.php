<?php
/**
 * Created by PhpStorm.
 * User: kaso
 * Date: 9/27/2014
 * Time: 11:18 AM
 */

class MediapartnerController extends MediapartnerBaseController {

    public function dashboard(){
        return View::make('mediapartners.dashboard');
    }

    private function media_process(){
//            $processor = App::make('MediaStore\Media\AudioMediaProcessor');
//            //dd(base_path('public/audio/demo1.mp3'));
//            $processor->setMedia(base_path('public/audio/demo1.mp3'));
//            echo json_encode($processor->process());
        echo 'Media Partner Dashboard';
    }
} 