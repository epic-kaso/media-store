<?php
/**
 * Created by PhpStorm.
 * User: kaso
 * Date: 9/27/2014
 * Time: 10:46 AM
 */

namespace MediaStore\Media;


use GrahamCampbell\Flysystem\FlysystemManager;
use MediaStore\Services\StorageService;

class AudioMediaProcessor implements MediaProcessor {

    protected $media_preview;
    protected $relative_media;
    private $media;
    /**
     * @var
     */
    private $storageService;

    function __construct(StorageService $storageService)
    {
        $this->storageService = $storageService;
    }


    public function setMedia($media_path)
    {
        $this->relative_media = $media_path;
        if($media_path = $this->storageService->has($media_path)){
            $this->media = $media_path;
        }else{
            throw new \InvalidArgumentException('Media Path invalid');
        }
    }

    public function getMedia()
    {
        return $this->media;
    }

    public function getMediaType()
    {
        return "Audio";
    }

    /**
     * @return \stdClass with properties response, media_url and media_preview_url
     * @throws \Exception
     */
    public function process()
    {
        if(!$this->media)
            throw new \Exception('You must set the media path first using setMedia()');
       $response = $this->generateAudioPreview() == 0 ? true : false;
        $r = new \stdClass();
        $r->response = $response;
        $r->media_url = $this->media;
        $r->media_preview_url = $this->media_preview;
        return $r;
    }

    private function generateAudioPreview(){
        //exec($this->getExecCommand());
        passthru($this->getExecCommand(),$response);
        return $response;
    }

    private function getExecCommand() {

        $ext = $this->storageService->extension($this->media);
        $output = str_replace($ext,"preview.$ext",$this->media);

        if($this->storageService->exists($output)){
            $this->storageService->delete($output);
        }

        $this->media_preview = str_replace($ext,"preview.$ext",$this->relative_media);;
        $command = "ffmpeg -t 30 -i {$this->media}  -acodec copy {$output}";
        return $command;
    }


}