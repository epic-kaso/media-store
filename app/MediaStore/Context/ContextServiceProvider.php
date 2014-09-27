<?php
/**
 * Created by PhpStorm.
 * User: kaso
 * Date: 9/26/2014
 * Time: 2:43 PM
 */

namespace MediaStore\Context;


use Illuminate\Support\ServiceProvider;
use MediaStore\Context\SignUpContext\SignupContext;

class ContextServiceProvider extends ServiceProvider {

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->SetupMediaPartnerContext();
        $this->setUpSignUpContext();
    }

    protected function SetupMediaPartnerContext()
    {
        $this->app['context'] = $this->app->share(function ($app) {
            return new MediaPartnerContext();
        });


        $this->app->bind('MediaStore\Context\Context', function ($app) {
            return $app['context'];
        });
    }

    private function setUpSignUpContext(){
        $this->app['signup_context'] = $this->app->share(function ($app) {
            return new SignupContext();
        });


        $this->app->bind('MediaStore\Context\SignUpContext\SignupContext', function ($app) {
            return $app['signup_context'];
        });
    }
}