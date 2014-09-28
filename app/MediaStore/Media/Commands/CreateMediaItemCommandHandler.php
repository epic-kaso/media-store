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
        \Queue::push(function($job) use($media,$path) {
            $this->audioMediaProcessor->setMedia($path);
            $response = $this->audioMediaProcessor->process();
            $preview_path = $this->storageService->storePath($response->media_preview_url,$this->scope->id());
            $this->mediaRepository->updateFileInfo($media->id,$path,$preview_path);
            $job->delete();
        });
    }


}