<?php

namespace Someline\Repositories\Eloquent;

use Someline\Models\Foundation\User;
use Someline\Presenters\UserPresenter;
use Someline\Repositories\Criteria\RequestCriteria;
use Someline\Repositories\Interfaces\UserRepository;
use Someline\Validators\UserValidator;
use Prettus\Validator\Exceptions\ValidatorException;
use Prettus\Validator\Contracts\ValidatorInterface;
use Log;

/**
 * Class UserRepositoryEloquent
 * @package namespace Someline\Repositories\Eloquent;
 */
class UserRepositoryEloquent extends BaseRepository implements UserRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return User::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

        return UserValidator::class;
    }

    /**
     * Specify Presenter class name
     *
     * @return string
     */
    public function presenter()
    {
        return UserPresenter::class;
    }

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

    /**
     * @param array|Collection $userIds
     * @return $this
     */
    public function byUserIds($userIds)
    {
        $this->model = $this->model->whereIn('user_id', $userIds);
        return $this;
    }

    /**
     * @param int $roleId
     * @param int $userId
     * @return $this
     */
    public function setRole($roleId, $userId)
    {
        $this->model = $this->model->findOrFail($userId);
        $roles = $this->model->roles;
        $this->model->detachRoles($roles);  //删除已记录角色
        $this->model->attachRole($roleId);
        return $this;
//        dd($roles);
    }

}
