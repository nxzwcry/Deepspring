<?php

namespace Someline\Presenters;

use Someline\Transformers\PermissionTransformer;

/**
 * Class PermissionPresenter
 *
 * @package namespace Someline\Presenters;
 */
class PermissionPresenter extends BasePresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new PermissionTransformer();
    }
}
