<?php


use Larabook\Statuses\StatusRepository;
use Laracasts\TestDummy\Factory as TestDummy;
class StatusRepositoryTest extends \Codeception\TestCase\Test
{

    protected $repo;
    /**
    * @var \IntegrationTester
    */
    protected $tester;

    protected function _before()
    {
        $this->repo = new StatusRepository;
    }

    protected function _after()
    {
    }

    /** @test */
    public function it_gets_all_statuses_for_a_user()
    {
    $user = TestDummy::times(2)->create('Larabook\Users\User');
        TestDummy::times(2)->create('Larabook\Statuses\Status',[
            'user_id'=>$user[0]->id
        ]);
        TestDummy::times(2)->create('Larabook\Statuses\Status',[
            'user_id'=>$user[1]->id
        ]);
        $statusesForUser = $this->repo->getAllForUser($user[0]->id);
        $this->assertCount(2,$statusesForUser);
    }

}