<?php

namespace Tests\Api;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class RoleTest extends BaseApiTestCase
{

    public function testGetAllRoles()
    {
        $this->withOAuthTokenTypePassword();
        $this->getApi('roles');
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

    public function testCreateRole()
    {
        $this->withOAuthTokenTypePassword();
        $this->postApi('roles', [
            'name' => 'teacher',
            'display_name' => '中教老师',
        ]);
        $this->printResponseData();
        $this->assertResponseOk();
    }

    public function testUpdateRole()
    {
        $this->withOAuthTokenTypePassword();
        $this->putApi('roles/2', [
//            'description' => '所有权限拥有者',
            'permission_ids' => [1,],
        ]);
        $this->printResponseData();
        $this->assertResponseNoContent();
    }

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
