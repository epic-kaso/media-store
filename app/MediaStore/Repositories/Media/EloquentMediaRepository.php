<?php
/**
 * Created by PhpStorm.
 * User: kaso
 * Date: 9/26/2014
 * Time: 3:00 PM
 */

namespace MediaStore\Repositories\Media;


use Illuminate\Database\Eloquent\Model;
use MediaStore\Context\Context;
use MediaStore\Repositories\TenantRepository;

/**
 * Class EloquentMediaRepository
 * @package MediaStore\Repositories
 */
class EloquentMediaRepository extends TenantRepository implements MediaRepository {

    public $previewPath = "file_preview_path";
    /**
     * @var Model
     */
    protected $model;

    /**
     * @var Context
     */
    protected $scope;


    /**
     * @param Model|\MediaItem $model
     * @param Context $scope
     */
    public function __construct(\MediaItem $model, Context $scope)
    {
        $this->model = $model;
        $this->scope = $scope;
    }

    /**
     * Return all projects
     *
     * @param array $with
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function all(array $with = array())
    {
        return $this->allThroughColumn($with);
    }

    /**
     * Return a single project
     *
     * @param array $with
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function find($id, array $with = array())
    {
        return $this->findThroughColumn($id, $with);
    }

    /**
     * Get Results by Page
     *
     * @param int $page
     * @param int $limit
     * @param array $with
     * @return \StdClass Object with $items and $totalItems for pagination
     */
    public function getByPage($page = 1, $limit = 10, $with = array())
    {
        return $this->getByPageThroughColumn($page, $limit, $with);
    }

    /**
     * Search for a single result by key and value
     *
     * @param string $key
     * @param mixed $value
     * @param array $with
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function getFirstBy($key, $value, array $with = array())
    {
        return $this->getFirstByThroughColumn($key, $value, $with);
    }

    /**
     * Search for many results by key and value
     *
     * @param string $key
     * @param mixed $value
     * @param array $with
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getManyBy($key, $value, array $with = array())
    {
        return $this->getManyByThroughColumn($key, $value, $with);
    }

    public function create($data = [])
    {
        $data[$this->scope->column_name()] = $this->scope->id();
        $media = $this->model->create($data);
        return $media;
    }

    public function update($id,$data = [])
    {
        $modl = $this->model->find($id);
        return $modl->update($data);
    }

    public function delete($id)
    {
        $m = $this->find($id);
        return $m->delete();
    }

    public function read($id)
    {
        return $this->find($id);
    }

    public function createFromMediaCommand($command,$file_path = null,$file_preview_path = null){
        $media = $this->model->create([
            'title'=>$command->title,
            'description'=>$command->description,
            'price'=>$command->price,
            'album_art'=>$command->album_art,
            'group_id'=>$command->group_id,
            $this->scope->column_name() =>$this->scope->id(),
            'file_path'=>$file_path,
            'preview_path'=>$file_preview_path
        ]);

        $this->createSlug($command, $media);

        return $media;
    }

    public function updateFileInfo($media_id,$file_path = null,$file_preview_path = null){
        $media = $this->find($media_id);
        if(!is_null($file_path)) {
            $media->file_path = $file_path;
        }
        if(!is_null($file_preview_path)) {
            $media->preview_path = $file_preview_path;
        }

        $media->save();
    }

    public function getBySlug($slug){
        $mediaItem = $this->model
                        ->where('slug',$slug)
                        ->first();
        return $mediaItem;
    }

    /**
     * @param $command
     * @param $media
     */
    protected function createSlug($command, $media)
    {
        $media->slug = \Str::slug($command->title) . '-' . $media->id;
        $media->save();
    }
}