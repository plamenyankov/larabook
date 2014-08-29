<?php 
$I = new FunctionalTester($scenario);
$I->wantTo('follow other user');

$I->haveAnAccount(['username'=>'OtherUser']);
$I->signIn();

$I->click('Browse Users');
$I->click('OtherUser');
$I->seeCurrentUrlEquals('/@OtherUser');

$I->click('Follow OtherUser');
$I->seeCurrentUrlEquals('/@OtherUser');
$I->see('Unfollow OtherUser');

$I->click('Unfollow OtherUser');
$I->seeCurrentUrlEquals('/@OtherUser');
$I->see('Follow OtherUser');
//$I->dontSee('Follow OtherUse');