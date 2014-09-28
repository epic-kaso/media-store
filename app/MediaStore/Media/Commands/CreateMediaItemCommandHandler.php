<?php namespace MediaStore\Media\Commands;

use Codeception\Module\Queue;
use Laracasts\Commander\CommandHandler;
use MediaStore\Context\Context;
use MediaStore\Media\AudioMediaProcessor;
use MediaStore\Repositories\Media\MediaRepository;
use MediaStore\Services\StorageService;

class CreateMediaItemCommandHandler implements CommandHandler {
    /**
     * @var MediaRepository
     */
    private $mediaRepository;
    /**
     * @var Context
     */
    private $scope;
    /**
     * @var StorageService
     */
    private $storageService;
    /**
     * @var AudioMediaProcessor
     */
    private $audioMediaProcessor;

    function __construct(MediaRepository $mediaRepository,
                         Context $scope,
                        StorageService $storageService,
                        AudioMediaProcessor $audioMediaProcessor)
    {

        $this->mediaRepository = $mediaRepository;
        $this->scope = $scope;
        $this->storageService = $storageService;
        $this->audioMediaProcessor = $audioMediaProcessor;
    }


    /**
     * Handle the command.
     *
     * @param object $command
     * @return boolean
     */
    public function handle($command)
    {
        $media = $this->mediaRepository->createFromMediaCommand($command);
        $this->processUpload($command,$media);
        return $media;
    }

    private function processUpload($command,$media){
        $path = $this->storageService->store($command->file,$this->scope->id());
        $this->mediaRepository->updateFileInfo($media->id,$path);
        $scope_id = $this->scope->id();
        $media_id= $media->id;

       // \Queue::push(function($job) use($media_id,$path,$scope_id) {
            $audioProcessor = \App::make('MediaStore\Media\AudioMediaProcessor');
            $storageService = \App::make('MediaStore\Services\StorageService');
            $repo  = \App::make('MediaStore\Repositories\Media\MediaRepository');

            $audioProcessor->setMedia($path);
            $response = $audioProcessor->process();
           // $preview_path = $storageService->storePath($response->media_preview_url,$scope_id);
            $repo->updateFileInfo($media_id,$path,$response->media_preview_url);
            //$job->delete();
       // });
    }


}