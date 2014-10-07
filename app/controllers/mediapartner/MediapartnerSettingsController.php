<?php

	use MediaStore\Mediapartner\Settings\CreateSettingsCommand;
	use MediaStore\Repositories\Mediapartner\MediapartnerSettingsRepository;

	class MediapartnerSettingsController extends \BaseController {

		/**
		 * @var MediapartnerSettingsRepository
		 */
		private $settingsRepository;

		public function __construct(MediapartnerSettingsRepository $settingsRepository)
		{
			$this->settingsRepository = $settingsRepository;
		}


		/**
	 * Display a listing of the resource.
	 * GET /mediapartnersettings
	 *
	 * @return Response
	 */
	public function index()
	{
		$settings = $this->settingsRepository->get();
		if(is_null($settings)){
			return Redirect::route('media-partner.settings.create');
		}
		return View::make('mediapartners_settings.index',compact('settings'));
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /mediapartnersettings/create
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('mediapartners_settings.edit');
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /mediapartnersettings
	 *
	 * @return Response
	 */
	public function store()
	{
		$data = Input::only([
			'business_name',
			'business_background_color',
			'business_name',
			'business_tagline'
		]);
		$data['business_logo'] = Input::file('business_logo');
		//try{
			$this->execute(CreateSettingsCommand::class,$data);
		//}catch (\Exception $e){
			//dd(->getMessage());
		//}
		return Redirect::route('media-partner.settings.index')
			->withNotice('Successfully Saved!');
	}



	/**
	 * Remove the specified resource from storage.
	 * DELETE /mediapartnersettings/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}