<?php


class PagesControllerTest extends \Codeception\TestCase\Test
{
   /**
    * @var \FunctionalTester
    */
    protected $tester;

    protected function _before()
    {
    }

    protected function _after()
    {
    }

    // tests
    public function testHomePage()
    {
        $this->tester->amOnPage('/');
    }

}