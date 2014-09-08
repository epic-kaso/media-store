<?php

    use Laracasts\Validation\FormValidationException;
    use MediaStore\Admin\Commands\Role\CreateRoleCommand;

    class RolesController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /roles
	 *
	 * @return Response
	 */
	public function index()
	{
        $roles = Role::all();
        return View::make('Roles.index',compact('roles'));
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /roles/create
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('Roles.create');
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /roles
	 *
	 * @return Response
	 */
	public function store()
	{
        try {
            $this->execute(CreateRoleCommand::class);
        }catch (FormValidationException $e){
            return Redirect::back()->withErrors($e->getErrors());
        }
        Flash::success('successfully created role');
        return Redirect::route('roles.index');
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /roles/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$role = Role::findOrFail($id);
        $role->destroy($id);
        Flash::success('successfully deleted role');
        return Redirect::route('roles.index');
	}

}