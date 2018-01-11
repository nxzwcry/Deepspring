<?php

namespace Someline\Transformers;

use Someline\Models\Foundation\Role;

/**
 * Class RoleTransformer
 * @package namespace Someline\Transformers;
 */
class RoleTransformer extends BaseTransformer
{

    /**
     * Transform the Role entity
     * @param Role $model
     *
     * @return array
     */
    public function transform(Role $model)
    {
        return [
            'id' => (int) $model->id,

            /* place your other model properties here */
            'name' => $model->name,
            'display_name' => $model->display_name,
            'permissions' => $model->permissons()->get(['id', 'display_name']),
            'description' => $model->description,
        ];
    }
}
