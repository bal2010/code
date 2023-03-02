<?php

namespace Modules\SeoCatalogUrlsModule\Repositories;

use Crm\Models\SmartFilterUrlPart;
use Illuminate\Support\Collection;
use Modules\SeoCatalogUrlsModule\Traits\RepoTrait;
use Modules\SmartFilterModule\Repositories\SmartFilterRepository as BaseRepository;

class SmartFilterRepository extends BaseRepository
{
    use RepoTrait;

    public function getAllSmartFilterUrlsForSeoCatalogUrls(): Collection
    {
        $columns = ['id AS smart_filter_url_id', 'name'];

        return $this->getAllTemplate($columns);
    }

    public function getCategorySmartFilterUrls(int $categoryId): Collection
    {
        $columns = ['id AS smart_filter_url_id', 'name'];
        $class = SmartFilterUrlPart::class;

        return $this->getCategoryMorphRelationTemplate($categoryId, $columns, $class);
    }
}
