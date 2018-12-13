<?php

namespace CodePress\CodeUser\Tests;

use CodePress\CodeUser\Models\User;
use CodePress\CodeUser\Event\UserCreatedEvent;
use Illuminate\Support\Facades\Event;
use Mockery as m;

class UserCreatedEventTest extends AbstractTestCase{

    protected $event;

    public function setUp()
    {
        parent::setUp();
        $userMock = m::mock(User::class);
        $this->event = new UserCreatedEvent($userMock, 123456);
    }

    public function test_can_get_user(){
        $this->assertInstanceOf(User::class, $this->event->getUser());
    }


    public function test_can_set_user()
    {
        $userMock = m::mock(User::class);
        $result = $this->event->setUser($userMock);
        //$this->assertInstanceOf(UserCreatedEvent::class, $result);
        $this->assertInstanceOf(User::class, $this->event->getUser());
    }


    public function test_can_get_plainpassword(){
        $this->assertEquals(123456, $this->event->getPlainPassword());
    }

    public function test_can_set_plainpassword(){
        $result = $this->event->setPlainPassword(123456);
        $this->assertInstanceOf(UserCreatedEvent::class, $result);
        $this->assertEquals(123456, $this->event->getPlainPassword());
    }

    public function test_constructor(){
        $this->assertInstanceOf(User::class, $this->event->getUser());
        $this->assertEquals(123456, $this->event->getPlainPassword());
    }

    public function test_check_listener_registered_event(){
        $array = Event::getListeners(UserCreatedEvent::class);
        $this->assertCount(1, $array);
    }

}