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
    public function test_all_user_can_access_threads()
    {
        $response = $this->get('/thread');
        $response->assertStatus(200) ;

    }

    /**
     * すべてのユーザーは、/threadにアクセスすると、Threadの一覧が見えること
     *
     * @return void
     */
    public function test_all_user_can_view_threads()
    {
        //Threadがあって
        $thread = factory('App\Thread')->create();

        //Threadの一覧を表示するURLにアクセスすると
        $response = $this->get('/thread');
        
        //Threadの内容が見えるんだよ
        $response->assertSee($thread->body)
                 ->assertSee($thread->title);
    }

    /**
     * すべてのユーザーは、/thread/{id}にアクセスすると、idに対応するthreadが参照できること
     *
     * @return void
     */
    public function test_all_user_can_view_thread()
    {
        //Threadがあって
        $thread = factory('App\Thread')->create();

        //Threadを表示するURLにアクセスすると
        $response = $this->get('/thread/'.$thread->id);
        
        //Threadの内容が見えるんだよ
        $response->assertSee($thread->body)
                 ->assertSee($thread->title);
    }

    /**
     * （本当はログインした）ユーザは、Threadを作成することができる。
     *
     * @return void
     */
    public function test_user_can_post_thread()
    {
        //Threadがあって
        $thread = factory('App\Thread')->make();

        //Threadを表示するURLにアクセスすると、threadが作成されて
        $this->post('/thread', $thread->toArray());

        //thread/thread_id にアクセスすると個別ページがみえる
        $this->get('/thread/'.$thread->id)
             ->assertSee($thread->title)
             ->assertSee($thread->body);
        
    }

    /**
     * Thread投稿時にtitleが未入力だとValidationError
     *
     * @return void
     */
    public function test_thread_require_title()
    {
        //titleがnullのThreadがあって
        $thread = factory('App\Thread')->make(['title' => null]);

        //Threadを表示するURLにアクセスすると、threadを作成しようとして
        $this->post('/thread', $thread->toArray())
        //バリデーションに引っかかって、セッションに'title'というキーでエラーが書かれる
             ->assertSessionHasErrors('title');
        
    }

    /**
     * Thread投稿時にtitleが未入力だとValidationError
     *
     * @return void
     */
    public function test_thread_require_body()
    {
        //titleがnullのThreadがあって
        $thread = factory('App\Thread')->make(['body' => null]);

        //Threadを表示するURLにアクセスすると、threadを作成しようとして
        $this->post('/thread', $thread->toArray())
        //バリデーションに引っかかって、セッションに'title'というキーでエラーが書かれる
             ->assertSessionHasErrors('body');
        
    }
}
