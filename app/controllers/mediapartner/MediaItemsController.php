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
		//
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
		//
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
		//
	}

}