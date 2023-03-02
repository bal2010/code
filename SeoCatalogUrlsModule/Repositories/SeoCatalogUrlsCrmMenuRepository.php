<?php

namespace Modules\SeoCatalogUrlsModule\Repositories;

use Crm\Repositories\CrmMenuRepository;

class SeoCatalogUrlsCrmMenuRepository extends CrmMenuRepository
{
    public function getIdByMethod(string $method)
    {
        return $this
            ->startConditions()
            ->where('method', $method)
            ->whereNull('parent_id')
            ->first('id')
            ->id;
    }

    public function getLastPosition()
    {
        return $this
            ->startConditions()
            ->max('position');
    }
}
