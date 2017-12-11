<?php

namespace Someline\Presenters;

use Someline\Transformers\RoleTransformer;

/**
 * Class RolePresenter
 *
 * @package namespace Someline\Presenters;
 */
class RolePresenter extends BasePresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new RoleTransformer();
    }
}
