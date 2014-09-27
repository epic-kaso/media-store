<?php namespace MediaStore\Context\SignUpContext;
    use MediaStore\Context\Context;

    /**
 * Created by PhpStorm.
 * User: kaso
 * Date: 9/26/2014
 * Time: 11:29 PM
 */

class SignupContext implements Context{

    protected $model;
    protected $route;

    /**
     * set the model that should be used as the context
     * @param $user_type
     * @return mixed
     */
    public function set($user_type)
    {
        $repo = \App::make('MediaStore\Repositories\User\RoleRepository');

        $this->model =  $repo->getRoleByName($user_type);
    }

    /**
     * checks to see if a context is available
     * @return bool
     */
    public function has()
    {

        if(!$this->model) return false;
        return true;
    }

    /**
     * returns the models ID
     * @return mixed
     */
    public function id()
    {

        return $this->model->id;
    }

    public function name(){
        return $this->model->name;
    }
    /**
     * returns the models table name
     * @return mixed
     */
    public function table_name()
    {
        return 'roles';
    }

    /**
     * returns the contextual column name;
     * @return mixed
     */
    public function column_name()
    {
        return 'role_id';
    }

    public function getRoute() {
        return $this->route;
    }

    public function setRoute($route){
        $this->route = $route;
    }
}