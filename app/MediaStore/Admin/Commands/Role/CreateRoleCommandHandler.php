<?php namespace MediaStore\Admin\Commands\Role;

use Laracasts\Commander\CommandHandler;
use Laracasts\Validation\FormValidationException;
use Role;

/**
 * Class CreateRoleCommandHandler
 * Responsible for handling the actual creation of roles in the system.
 * @package MediaStore\Admin\Commands\Role
 */
class CreateRoleCommandHandler implements CommandHandler {


    /**
     * Handle the command.
     *
     * @param object $command
     * @throws FormValidationException
     * @return mixed
     */
    public function handle($command)
    {
        $role = Role::addNew($command->role_name,$command->role_description);
        if(!$role){
            throw new FormValidationException("Couldnt save role",$role->getErrors());
        }
        return $role;
    }

}