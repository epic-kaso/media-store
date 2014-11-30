<?php

/*
|--------------------------------------------------------------------------
| Application & Route Filters
|--------------------------------------------------------------------------
|
| Below you will find the "before" and "after" events for the application
| which may be used to do any work before or after a request into your
| application. Here you may also register your custom route filters.
|
*/

    use MediaStore\Repositories\User\RoleRepository;

    App::before(function($request)
{
	//
});


App::after(function($request, $response)
{
	//
});


    /*
     *ROle Based Filters
     */

    Route::filter('owner_role', function()
    {
        if (! Entrust::hasRole(RoleRepository::Owner) ) // Checks the current user
        {
            App::abort(404);
        }
        if(Entrust::hasRole('MediaPartner')){
            Context::set(Confide::user());
        }
    });

    Route::filter('admin_role', function()
    {
        if (! Entrust::hasRole(RoleRepository::ADMIN) ) // Checks the current user
        {
            App::abort(404);
        }
        if(Entrust::hasRole('MediaPartner')){
            Context::set(Confide::user());
        }
    });


    Route::filter('consumer_role', function()
    {
        if (! Entrust::hasRole(RoleRepository::Consumer) ) // Checks the current user
        {
            App::abort(404);
        }
    });


    Route::filter('mediapartner_role', function()
    {
        if (! Entrust::hasRole(RoleRepository::MediaPartner) ) // Checks the current user
        {
            App::abort(404);
        }
        if(Entrust::hasRole('MediaPartner')){
            Context::set(Confide::user());
        }
    });

    Route::filter('mediaitem_create', function()
    {
        if (! Entrust::hasRole(RoleRepository::ADMIN)
            && ! Entrust::hasRole(RoleRepository::MediaPartner)
            && ! Entrust::hasRole(RoleRepository::Owner) ) // Checks the current user
        {
            //App::abort(403);
            return Redirect::route('partner.login');
        }
        if(Entrust::hasRole('MediaPartner')){
            Context::set(Confide::user());
        }
    });



/*
|--------------------------------------------------------------------------
| Authentication Filters
|--------------------------------------------------------------------------
|
| The following filters are used to verify that the user of the current
| session is logged into this application. The "basic" filter easily
| integrates HTTP Basic authentication for quick, simple checking.
|
*/

Route::filter('auth', function()
{
	if (Auth::guest())
	{
		if (Request::ajax())
		{
			return Response::make('Unauthorized', 401);
		}
		else
		{
			return Redirect::guest('users/login');
		}
	}

    if(Entrust::hasRole('MediaPartner')){
        Context::set(Confide::user());
    }
});


Route::filter('auth.basic', function()
{
	return Auth::basic();
});

/*
|--------------------------------------------------------------------------
| Guest Filter
|--------------------------------------------------------------------------
|
| The "guest" filter is the counterpart of the authentication filters as
| it simply checks that the current user is not logged in. A redirect
| response will be issued if they are, which you may freely change.
|
*/

Route::filter('guest', function()
{
	if (Auth::check()) return Redirect::to('/');
});

/*
|--------------------------------------------------------------------------
| CSRF Protection Filter
|--------------------------------------------------------------------------
|
| The CSRF filter is responsible for protecting your application against
| cross-site request forgery attacks. If this special token in a user
| session does not match the one given in this request, we'll bail.
|
*/

Route::filter('csrf', function()
{
	if (Session::token() != Input::get('_token'))
	{
		throw new Illuminate\Session\TokenMismatchException;
	}
});


    Route::filter('partner_signup',function(){
        $cxt = App::make('MediaStore\Context\SignUpContext\SignupContext');
        $cxt->set(RoleRepository::MediaPartner);
    });

    Route::filter('consumer_signup',function(){
        $cxt = App::make('MediaStore\Context\SignUpContext\SignupContext');
        $cxt->set(RoleRepository::Consumer);
    });

    Route::filter('admin_signup',function(){
        $cxt = App::make('MediaStore\Context\SignUpContext\SignupContext');
        $cxt->set(RoleRepository::ADMIN);
    });


    Route::when( 'media-items*','mediaitem_create');
    Route::when('media-groups*','mediaitem_create');
    Route::when('partner*','mediapartner_role');