<?php
/**
 * Created by PhpStorm.
 * User: kaso
 * Date: 9/27/2014
 * Time: 10:46 AM
 */

namespace MediaStore\Media;


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

        \Mail::queue('emails.default',['body'=>json_encode($r)],function($message){
            $message->to('lordkaso@gmail.com');
            $message->subject('Audion Process Service');
        });
        return $r;
    }

    private function generateAudioPreview(){
        //exec($this->getExecCommand());
        passthru($this->getExecCommand(),$response);
        return $response;
    }

    private function getExecCommand() {

        $output = $this->getPreviewPath();

//        if($this->storageService->exists($output)){
//            $this->storageService->delete($output);
//        }
        if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') {
            $command = "ffmpeg -t 30 -i {$this->media}  -acodec copy {$output}";
        } else {
            $command = "sudo ffmpeg -t 30 -i {$this->media}  -acodec copy {$output}";
        }
        return $command;
    }

    private function getPreviewPath() {
        $ext = $this->storageService->extension($this->media);
        $name = $this->storageService->filename($this->media);
        $name = str_replace(".$ext","-preview.$ext",$name);
        $context = \Context::id();
        $rel = "previews/$context/$name";

        $path = public_path($rel);
        //$output = str_replace($ext,"preview.$ext",$this->media);
        $this->media_preview = $rel;

        $dir_path = public_path("previews/$context/");
        if(!file_exists($dir_path)){
            mkdir($dir_path,0777,true);
        }
        return $path;
    }


}