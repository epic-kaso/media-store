<?php
    use MediaStore\Context\SignUpContext\SignupContext;
    use MediaStore\Repositories\Media\MediaRepository;
    use MediaStore\Services\PaymentProcessingService;

    /**
 * Created by PhpStorm.
 * User: kaso
 * Date: 11/29/2014
 * Time: 8:19 PM
 */

class MediaPageController extends BaseController {
    /**
     * @var SignupContext
     */
    private $account_context;
    /**
     * @var MediaRepository
     */
    private $mediaRepository;
    /**
     * @var PaymentProcessingService
     */
    private $paymentProcessingService;

    private $repo;

    function __construct(SignupContext $account_context,
                         MediaRepository $mediaRepository,
                         PaymentProcessingService $paymentProcessingService)
    {
        $this->account_context = $account_context;
        $this->mediaRepository = $mediaRepository;
        $this->paymentProcessingService = $paymentProcessingService;
        $this->repo = App::make('MediaStore\Repositories\User\UserRepository');
    }

    public function getIndex($slug)
    {
        $mediaItem  = $this->mediaRepository->getBySlug($slug);

        if(!$mediaItem)
            App::abort(404,'Media Item not found');

        $itm = new stdClass();
        $itm->id = $mediaItem->id;
        $itm->title = $mediaItem->title;
        $itm->img_url = $mediaItem->album_art->url('thumb');
        $itm->mp3 = $mediaItem->preview_path;
        $itm->price = $mediaItem->price;
        $itm->description = $mediaItem->description;
        $itm->slug = $mediaItem->slug;
        $itm->cover_img = $mediaItem->album_art->url('normal');

        $mediastore_javascript = json_encode(
            [
            'stripe_key' => $this->paymentProcessingService->getStripeJSKey(),
            'stripe_base_url'=> '/buy/item/'
            ]
        );

        $post_url = $this->repo
                         ->getPostRouteFromContext(
                             $this->account_context->name()
                         );

        return View::make('pages.media-item',
            compact('mediastore_javascript','post_url')
        )->with('mediaItem',$itm);
    }
}