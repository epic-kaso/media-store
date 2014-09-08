<?php namespace MediaStore\Admin\Commands\Role;

class CreateRoleCommand {
    public $role_name;
    public $role_description;

    /**
     */
    public function __construct($role_name,$role_description)
    {
        $this->role_name = $role_name;
        $this->role_description = $role_description;
    }

}