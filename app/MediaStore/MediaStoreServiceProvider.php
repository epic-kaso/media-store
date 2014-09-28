<?php namespace MediaStore;
use Illuminate\Support\ServiceProvider;
use MediaStore\Repositories\Media\EloquentMediaRepository;

/**
 * Created by PhpStorm.
 * User: kaso
 * Date: 9/26/2014
 * Time: 9:36 PM
 */

class MediaStoreServiceProvider extends ServiceProvider{


    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->mediaRepoBind();
    }

    private function mediaRepoBind(){
        $this->app->bind('MediaStore\Repositories\Media\MediaRepository',function($app){
            return $app->make('MediaStore\Repositories\Media\EloquentMediaRepository');
        });
    }
}