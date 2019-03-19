<?php namespace App\Tests;
use App\Tests\AcceptanceTester;

class TypeFormCest
{

    public function tryToCreateNewTypes(AcceptanceTester $I)
    {
        $types = $I->grabEntitiesFromRepository('App\Entity\Type');
        $numTypesBefore = count($types);


        $I->amOnPage('/type/new');
        $I->fillField('#type_name', 'M.Sc.');
        $I->fillField('#type_level', 9);
        $I->click('Save');

        $I->amOnPage('/type/new');
        $I->fillField('#type_name', 'Ph.D.');
        $I->fillField('#type_level', 10);
        $I->click('Save');

        $types = $I->grabEntitiesFromRepository('App\Entity\Type');
        $numTypesAfter = count($types);
        $expectedResult = $numTypesBefore + 2;

        $I->assertEquals($expectedResult, $numTypesAfter);


    }
}
