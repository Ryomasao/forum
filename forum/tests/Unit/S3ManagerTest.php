<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class S3ManagerTest extends TestCase
{


    protected $target;

    /**
     * 各メソッドのテスト毎に実行される共通の初期設定
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();

        $this->target = new \App\Services\S3Manager;
    }

    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_putFile()
    {
        $path = storage_path('app/test.txt');

        $result = $this->target->putFile($path);

        dd($result);

        $this->assertTrue($result);
    
    }

    public function test_putFile2()
    {
        $result = $this->target->putFile2();

        dd($result);

        $this->assertTrue($result);
    
    }

    public function test_publishUrl()
    {
        $result = $this->target->publishUrl();

        dd($result);

        $this->assertTrue($result);
    
    }

    public function test_getToken()
    {
        $result = $this->target->getToken();

        dd($result);

        $this->assertTrue($result);
    
    }


}
