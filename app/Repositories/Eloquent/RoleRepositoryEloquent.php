<?php

namespace Someline\Repositories\Eloquent;

use Someline\Repositories\Criteria\RequestCriteria;
use Someline\Repositories\Interfaces\RoleRepository;
use Someline\Models\Foundation\Role;
use Someline\Validators\RoleValidator;
use Someline\Presenters\RolePresenter;

/**
 * Class RoleRepositoryEloquent
 * @package namespace Someline\Repositories\Eloquent;
 */
class RoleRepositoryEloquent extends BaseRepository implements RoleRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Role::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

        return RoleValidator::class;
    }


    /**
    * Specify Presenter class name
    *
    * @return mixed
    */
    public function presenter()
    {

        return RolePresenter::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
