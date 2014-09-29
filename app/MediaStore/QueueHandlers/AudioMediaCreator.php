<?php
/**
 * Created by PhpStorm.
 * User: kaso
 * Date: 9/27/2014
 * Time: 10:52 PM
 */

namespace MediaStore\QueueHandlers;


use MediaStore\Media\AudioMediaProcessor;
use MediaStore\Repositories\Media\MediaRepository;

class AudioMediaCreator {
    protected $current_media;


    /**
     * @var MediaRepository
     */
    private $mediaRepository;
    /**
     * @var AudioMediaProcessor
     */
    private $audioMediaProcessor;

    function __construct(MediaRepository $mediaRepository,AudioMediaProcessor $audioMediaProcessor)
    {
        $this->mediaRepository = $mediaRepository;
        $this->audioMediaProcessor = $audioMediaProcessor;
    }

    /**
     * @param $job
     * @param $data array needs that 'media_id' be set;
     */
    public function fire($job,$data){
        $path = $data['path'];
        $media_id = $data['media_id'];

        $audioProcessor = $this->audioMediaProcessor;
        $repo  = $this->mediaRepository;

        $audioProcessor->setMedia($path);
        $response = $audioProcessor->process();
        $repo->updateFileInfo($media_id,$path,$response->media_preview_url);
        $job->delete();
        //$storageService = \App::make('MediaStore\Services\StorageService');
        // $preview_path = $storageService->storePath($response->media_preview_url,$scope_id);
    }

//    public function getMediaFilePath($media_id){
//        $media = $this->mediaRepository->find($media_id);
//        $this->current_media = $media;
//        return $media->getFilePath();
//    }
//    public function createPreviewFile($media_path){
//        $this->audioMediaProcessor->setMedia($media_path);
//        $reply = $this->audioMediaProcessor->process();
//        if($reply->response)
//            $this->updateCurrentMediaWithPreviewPath($reply->media_preview_url);
//        throw new Exception('Error Occured with creating preview');
//    }
//
//    public function updateCurrentMediaWithPreviewPath($preview_path){
//        if(!$this->current_media)
//            throw new Exception('Media File Must be Defined before updating');
//        $response = $this->mediaRepository->update($this->current_media->id,[
//            $this->mediaRepository->previewPath => $preview_path
//        ]);
//        return $response;
//    }
} 