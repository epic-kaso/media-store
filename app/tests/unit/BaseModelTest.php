<?php

class BaseModelTest extends \PHPUnit_Framework_TestCase
{
    protected $baseModel;
    protected function setUp()
    {

        $baseModel = new BaseModel;
        $baseModel::$rules = ['name'=>'required'];
        $this->baseModel = $baseModel;
    }

    protected function tearDown()
    {
    }

    // tests
    public function testValidationReturnsTrueOnSuccess()
    {
        $this->baseModel->name = "Hello World";

        $response = $this->baseModel->validate();
        $this->assertTrue($response,"Should return true, validates successfully");
    }

    public function testValidationSetsErrorsOnFailure(){
        $response = $this->baseModel->validate();
        $this->assertFalse($response,"Should return false,validation fails");

        $this->assertNotNull($this->baseModel->getErrors());
    }

}