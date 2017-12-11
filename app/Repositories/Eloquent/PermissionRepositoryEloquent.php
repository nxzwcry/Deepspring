<?php

namespace Someline\Repositories\Eloquent;

use Someline\Repositories\Criteria\RequestCriteria;
use Someline\Repositories\Interfaces\PermissionRepository;
use Someline\Models\Foundation\Permission;
use Someline\Validators\PermissionValidator;
use Someline\Presenters\PermissionPresenter;

/**
 * Class PermissionRepositoryEloquent
 * @package namespace Someline\Repositories\Eloquent;
 */
class PermissionRepositoryEloquent extends BaseRepository implements PermissionRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Permission::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

        return PermissionValidator::class;
    }


    /**
    * Specify Presenter class name
    *
    * @return mixed
    */
    public function presenter()
    {

        return PermissionPresenter::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
