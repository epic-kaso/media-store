<?php

	use Laracasts\Validation\FormValidationException;
	use MediaStore\Media\Commands\CreateMediaItemCommand;
	use MediaStore\Repositories\Media\MediaRepository;

	class MediaItemsController extends \BaseController {
        /**
         * @var MediaRepository
         */
        private $mediaRepository;

        function __construct(MediaRepository $mediaRepository)
        {
            $this->mediaRepository = $mediaRepository;
        }


        /**
	 * Display a listing of the resource.
	 * GET /mediaitems
	 *
	 * @return Response
	 */
	public function index()
	{
        $medias = $this->mediaRepository->all();

        return  View::make('media_items.index',compact('medias'));
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /mediaitems/create
	 *
	 * @return Response
	 */
	public function create()
	{
        return View::make('media_items.create');
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /mediaitems
	 *
	 * @return Response
	 */
	public function store()
	{
		try{
            $response = $this->execute(CreateMediaItemCommand::class);
        }catch (FormValidationException $ex){
            Flash::error($ex->getErrors());
                return Redirect::back()->withInput()->withErrors($ex->getErrors());
        }
        return $response->id;

	}

	/**
	 * Display the specified resource.
	 * GET /mediaitems/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$media = $this->mediaRepository->find($id);
		if(!$media)
			App::abort(404);

		return View::make('media_items.show',compact('media'));
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /mediaitems/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$media = $this->mediaRepository->find($id);
		if(!$media)
			App::abort(404);

		return View::make('media_items.edit',compact('media'));
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /mediaitems/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /mediaitems/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$object  = $this->mediaRepository->find($id);
		if(!$object) {
			return Redirect::back()->withError('Invalid Media Id');
		}
		$this->mediaRepository->delete($id);
		Flash::message('Deleted successfully');
		return Redirect::back()->withStatus('Deleted successfully');
	}

}