<?php
    use MediaStore\Services\PaymentProcessingService;

    /**
 * Created by PhpStorm.
 * User: kaso
 * Date: 10/7/2014
 * Time: 2:58 PM
 */

class MediaPurchaseController extends \BaseController {

    /**
     * @var PaymentProcessingService
     */
    private $paymentProcessingService;

    public function __construct(PaymentProcessingService $paymentProcessingService){

        $this->paymentProcessingService = $paymentProcessingService;
    }
    public function postBuy(MediaItem $mediaItem){

        $token = Input::get('stripeToken');
        $email = Input::get('stripeEmail');
        $currency = "ngn";
        $price = $mediaItem->price < 100 ? 100 * 100 : $mediaItem->price * 100; //Amount in kobo

        try {
            $this->paymentProcessingService
                ->createStripPayment($price,$currency,$token,$email);
            return $mediaItem->download();

        } catch(Stripe_CardError $e) {
            echo $e->getMessage();
        }

    }
} 