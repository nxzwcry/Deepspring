<?php

namespace Someline\Transformers;

use Someline\Models\Foundation\Permission;

/**
 * Class PermissionTransformer
 * @package namespace Someline\Transformers;
 */
class PermissionTransformer extends BaseTransformer
{

    /**
     * Transform the Permission entity
     * @param Permission $model
     *
     * @return array
     */
    public function transform(Permission $model)
    {
        return [
            'id' => (int) $model->id,

            /* place your other model properties here */
            'name' => $model->name,

            'created_at' => (string) $model->created_at,
            'updated_at' => (string) $model->updated_at
        ];
    }
}
