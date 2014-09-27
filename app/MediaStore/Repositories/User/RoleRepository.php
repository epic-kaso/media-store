<?php
/**
 * Created by PhpStorm.
 * User: kaso
 * Date: 9/26/2014
 * Time: 11:32 PM
 */

namespace MediaStore\Repositories\User;


use MediaStore\Repositories\AbstractRepository;
use Role;

class RoleRepository extends AbstractRepository {


    /**
     * @var Role
     */
    protected $model;

    const ADMIN = 'Admin';
    const Consumer = 'Consumer';
    const Owner = 'Owner';
    const MediaPartner = 'MediaPartner';

    function __construct(Role $role)
    {

        $this->model = $role;
    }

    public function getRoleIdByName($name){
        $role = $this->getFirstBy('name',$name);
        if(!$role)
            throw new \Exception('Invalid Role Name');
        return $role->id;
    }

    public function getRoleByName($name){
        $role = $this->getFirstBy('name',$name);
        if(!$role)
            throw new \Exception('Invalid Role Name');
        return $role;
    }
}