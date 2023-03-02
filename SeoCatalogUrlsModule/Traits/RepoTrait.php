<?php

namespace Modules\SeoCatalogUrlsModule\Traits;

use Illuminate\Support\Collection;

trait RepoTrait
{
    public function getAllTemplate(array $columns): Collection
    {
        return $this
            ->startConditions()
            ->select($columns)
            ->toBase()
            ->get();
    }

    public function getCategoryMorphRelationTemplate(int $rootId, array $columns, string $class): Collection
    {
        return $this
            ->startConditions()
            ->select($columns)
            ->whereIn('id', function ($query) use ($rootId, $class) {
                $query->select('category_seo_link_id')
                    ->from('category_seo_links')
                    ->where('link_id', $rootId)
                    ->where('category_seo_link_type', $class);
            })
            ->toBase()
            ->get();
    }
}
