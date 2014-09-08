<?php
use \FunctionalTester;

class RolesCest
{
    public function _before(FunctionalTester $I)
    {
    }

    public function _after(FunctionalTester $I)
    {
    }

    // tests
    public function tryToTestRoleCreation(FunctionalTester $I)
    {
        $I->am('an admin');
        $I->amOnPage('roles/create');
        $I->see('Role Name:');

        $I->fillField('role_name','Admin');
        $I->fillField('role_description','Site Administrator');
        $I->click('Create');

        $I->see('Successfully created role');

        $I->see('Admin');
    }
}