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

    /**
     * @var Model
     */
    protected $model;

    /**
     * @var Context
     */
    protected $scope;


    /**
     * @param Model $model
     * @param Context $scope
     */
    public function __construct(Model $model, Context $scope)
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

}