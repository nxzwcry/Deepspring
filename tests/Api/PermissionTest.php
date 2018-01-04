<?php

namespace Tests\Api;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class PermissionTest extends BaseApiTestCase
{

    public function testGetAllPermissions()
    {
        $this->withOAuthTokenTypePassword();
        $this->getApi('permissions');
        $this->printResponseData();
        $this->assertJsonStructure([
            'data' => [
                '*' => [
                    'id',
                    'name',
                ],
            ]
        ]);
    }

//    public function testGetCurrentUser()
//    {
//        $this->withOAuthTokenTypePassword();
//        $this->getApi('users/me');
//        $this->printResponseData();
//        $this->assertResponseOk();
//    }
//
//    public function testGetSingleUser()
//    {
//        $this->withOAuthTokenTypePassword();
//        $this->getApi('users/1');
//        $this->assertResponseOk();
//    }

    public function testCreatePermissions()
    {
        $this->withOAuthTokenTypePassword();
        $this->postApi('permissions', [
            'name' => 'test',
            'display_name' => '测试权限',
        ]);
        $this->printResponseData();
        $this->assertResponseOk();
    }

//    public function testUpdateUser()
//    {
//        $this->withOAuthTokenTypePassword();
//        $this->putApi('users/2', [
//            'name' => 'Harry Potter',
//        ]);
//        $this->printResponseData();
//        $this->assertResponseNoContent();
//    }
//
//    public function testDeleteUser()
//    {
//        $user = \Someline\Models\Foundation\User::find(3);
//        if (!$user) {
//            $user = factory(\Someline\Models\Foundation\User::class, 1)->make();
//            $user->user_id = 3;
//            $user->save();
//        }
//
//        $this->withOAuthTokenTypePassword();
//        $this->deleteApi('users/3');
//        $this->printResponseData();
//        $this->assertResponseNoContent();
//    }

}
