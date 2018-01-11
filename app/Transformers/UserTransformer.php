<?php

namespace Someline\Transformers;

use Someline\Models\Foundation\User;

/**
 * Class UserTransformer
 * @package namespace Someline\Transformers;
 */
class UserTransformer extends BaseTransformer
{

    /**
     * Transform the User entity
     * @param User $model
     *
     * @return array
     */
    public function transform(User $model)
    {
        $cteacher = null;
        $ename = null;
        if ($model->cteacher)
        {
            $cteacher = $model->cteacher->cteacher_id;
            $ename = $model->cteacher->ename;
        }
        return [
            'user_id' => (int)$model->getUserId(),

            /* place your other model properties here */
            'name' => $model->name,
            'email' => $model->email,
            'cteacher' => $cteacher,
            'ename' => $ename,
            'roles' => $model->roles()->get(['id', 'display_name']),
        ];
    }
}
