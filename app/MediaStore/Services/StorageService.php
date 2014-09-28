<?php
/**
 * Created by PhpStorm.
 * User: kaso
 * Date: 9/27/2014
 * Time: 11:34 PM
 */

namespace MediaStore\Services;


use GrahamCampbell\Flysystem\FlysystemManager;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class StorageService {

    private $filesystem;

    function __construct(FlysystemManager $filesystem)
    {
        $this->filesystem = $filesystem;
    }

    public function has($media_path) {
        $local = $this->filesystem->getConnectionConfig('local');
        if($this->exists($media_path)){
            return $local['path']."/$media_path";
        }else{
            return false;
        }
    }

    public function extension($media){
        return \File::extension($media);
    }

    public function exists($output,$connection = 'local') {
        if($connection == 'local'
            && $this->filesystem->has($output)
            && !$this->filesystem->connection($connection)->has($output)){
            $this->createLocalCopy($output);
        }
        return $this->filesystem->connection($connection)->has($output);
    }

    public function delete($output,$connection = 'local') {
        return $this->filesystem->connection($connection)->delete($output);
    }


    private function createLocalCopy($media){
        if($this->filesystem->connection('local')->has($media))
            return $media;
        $media_content = $this->filesystem->get($media);
        $this->filesystem->connection('local')->put($media,$media_content);
        return $media;
    }

    public function cleanUp($media){
        if($this->filesystem->getDefaultConnection() !== 'local'
            && $this->filesystem->has($media)){
            $this->filesystem->connection('local')->delete($media);
        }
    }

    public function store(UploadedFile $uploadedFile,$mediapartner_id){
        $file_type =  \Str::slug($uploadedFile->getMimeType());
        $file_name = \Str::random(30);
        $ext = $uploadedFile->getClientOriginalExtension();
        $path = "$mediapartner_id/$file_type/$file_name.$ext";


        $this->filesystem->put($path,file_get_contents($uploadedFile->getPathname()));

        return $path;
    }

    public function storePath($path,$scope){
        if(!$this->filesystem->has($path))
            $this->filesystem->put($path,file_get_contents($path));
        return $path;
    }

    public function filename($media) {
        $f = new \SplFileInfo($media);
        return $f->getFilename();
    }

} 