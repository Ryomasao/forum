<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ThreadTest extends TestCase
{
    /**
     * すべてのユーザーは/threadを参照できること
     *
     * @return void
     */
    public function test_all_user_can_access_thread()
    {
        $response = $this->get('/thread');
        $response->assertStatus(200) ;

    }

    /**
     * すべてのユーザーは、/threadにアクセスすると、Threadの一覧が見えること
     *
     * @return void
     */
    public function test_all_user_can_view_thread()
    {
        //Threadがあって
        $thread = factory('App\Thread')->create();

        //Threadの一覧を表示するURLにアクセスすると
        $response = $this->get('/thread');
        
        //Threadの内容が見えるんだよ
        $response->assertSee($thread->body)
                 ->assertSee($thread->title);
    }

}
