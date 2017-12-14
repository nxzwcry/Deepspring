<?php

namespace Someline\Api\Controllers;

use Dingo\Api\Exception\DeleteResourceFailedException;
use Dingo\Api\Exception\StoreResourceFailedException;
use Dingo\Api\Exception\UpdateResourceFailedException;
use Prettus\Validator\Contracts\ValidatorInterface;
use Someline\Http\Requests\RoleCreateRequest;
use Someline\Http\Requests\RoleUpdateRequest;
use Someline\Repositories\Interfaces\RoleRepository;
use Someline\Validators\RoleValidator;

class RolesController extends BaseController
{

    /**
     * @var RoleRepository
     */
    protected $repository;

    /**
     * @var RoleValidator
     */
    protected $validator;

    public function __construct(RoleRepository $repository, RoleValidator $validator)
    {
        $this->repository = $repository;
        $this->validator = $validator;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->repository->all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  RoleCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(RoleCreateRequest $request)
    {

        $data = $request->all();

        $this->validator->with($data)->passesOrFail(ValidatorInterface::RULE_CREATE);


        $role = $this->repository->create($data);

        // throw exception if store failed
//        throw new StoreResourceFailedException('Failed to store.');

        // A. return 201 created
//        return $this->response->created(null);

        // B. return data
        return $role;

    }


    /**
     * Display the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return $this->repository->find($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  RoleUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     */
    public function update(RoleUpdateRequest $request, $id)
    {

        $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

        if ($request->has('permission_ids'))
        {
            $this->repository->setPermissions($request->input('permission_ids'), $id);
        }

        $role = $this->repository->update($request->except(['permission_ids']), $id);

        // throw exception if update failed
//        throw new UpdateResourceFailedException('Failed to update.');

        // Updated, return 204 No Content
        return $this->response->noContent();

    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deleted = $this->repository->delete($id);

        if ($deleted) {
            // Deleted, return 204 No Content
            return $this->response->noContent();
        } else {
            // Failed, throw exception
            throw new DeleteResourceFailedException('Failed to delete.');
        }
    }
}
