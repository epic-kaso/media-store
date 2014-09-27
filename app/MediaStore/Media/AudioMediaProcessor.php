<?php
/**
 * Created by PhpStorm.
 * User: kaso
 * Date: 9/27/2014
 * Time: 10:46 AM
 */

namespace MediaStore\Media;


use Illuminate\Filesystem\Filesystem;

class AudioMediaProcessor implements MediaProcessor {

    protected $media_preview;
    private $media;
    /**
     * @var
     */
    private $filesystem;

    function __construct(Filesystem $filesystem)
    {
        $this->filesystem = $filesystem;
    }


    public function setMedia($media_path)
    {
        if($this->filesystem->exists($media_path)){
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

    public function process()
    {
        if(!$this->media)
            throw new \Exception('You mjust set the media path first using setMedia()');
       $response = $this->generateAudioPreview() == 0 ? true : false;
        return [
            'response' => $response,
            'media_url' => $this->media,
            'media_preview_url' => $this->media_preview
        ];
    }

    private function generateAudioPreview(){
        //exec($this->getExecCommand());
        passthru($this->getExecCommand(),$response);
        return $response;
    }

    private function getExecCommand() {

        $ext = $this->filesystem->extension($this->media);
        $output = str_replace($ext,"preview.$ext",$this->media);

        if($this->filesystem->exists($output)){
            $this->filesystem->delete($output);
        }

        $this->media_preview = $output;
        $command = "ffmpeg -t 30 -i {$this->media}  -acodec copy {$output}";
        return $command;//"ffmpeg -t 30 -acodec copy -i {$this->media} {$output}";
    }
}