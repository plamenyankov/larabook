<?php 
$I = new FunctionalTester($scenario);
$I->am('a Larabook member');
$I->wantTo('post a status');
$I->signIn();
$I->amOnPage('statuses');
$I->postAStatus('My first post');
$I->seeCurrentUrlEquals('/statuses');
$I->see('My first post');

