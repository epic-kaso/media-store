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
            $itm->title = $media->title;
            $itm->img_url = $media->album_art->url('medium');
            $itm->mp3 = $media->preview_path;
            $data[] = $itm;

        }
        $item = new stdClass();
        $item->img_url = 'img/wizkid-ayo.jpg';
        $item->mp3 = 'audio/demo1.mp3';
        $item->title = Str::limit('Wizkid Ayo',28);
        $data[] = $item;

        $item = new stdClass();
        $item->img_url = 'img/psquare.jpg';
        $item->mp3 = 'audio/demo1.mp3';
        $item->title = Str::limit('Psquare- Double Trouble',28);

        $data[] = $item;

        $item = new stdClass();
        $item->img_url = 'img/twoface.jpg';
        $item->mp3 = 'audio/demo2.mp3';
        $item->title = Str::limit('2Face- Ascension',28);

        $data[] = $item;

        $item = new stdClass();
        $item->img_url = 'img/cover.jpg';
        $item->mp3 = 'audio/demo3.mp3';
        $item->title = Str::limit('Brymo - Fe mi',28);

        $data[] = $item;

        $post_url = $this->repo->getPostRouteFromContext($this->account_context->name());

        return View::make('pages.index',['media'=>$data,'post_url'=>$post_url]);
    }

}
