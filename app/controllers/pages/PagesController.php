<?php
    use MediaStore\Context\SignUpContext\SignupContext;
    use MediaStore\Repositories\Media\MediaRepository;

    /**
	@class PagesController
	Manages tha static pages
*/

class PagesController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

    private $account_context;
    private $repo;
    private $mediaRepository;

    function __construct(SignupContext $account_context,MediaRepository $mediaRepository)
    {
        $this->mediaRepository = $mediaRepository;
        $this->account_context = $account_context;
        $this->repo = App::make('MediaStore\Repositories\User\UserRepository');
    }

    public function index(){
        $medias = $this->mediaRepository->all();

        $data = [];

        foreach($medias as $media){
            $itm = new stdClass();
            $itm->id = $media->id;
            $itm->title = $media->title;
            $itm->img_url = $media->album_art->url('medium');
            $itm->mp3 = $media->preview_path;
            $itm->price = $media->price;
            $itm->description = $media->description;
            $data[] = $itm;
        }

        $post_url = $this->repo
            ->getPostRouteFromContext($this->account_context->name());

        return View::make('pages.index',['media'=>$data,'post_url'=>$post_url]);
    }

}
