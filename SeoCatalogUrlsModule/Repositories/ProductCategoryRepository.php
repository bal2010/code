<?php

namespace Modules\SeoCatalogUrlsModule\Repositories;

use Crm\ProductCategory;
use Crm\Repositories\ProductCategoryRepository as BaseRepository;
use Illuminate\Support\Collection;
use Modules\SeoCatalogUrlsModule\Traits\RepoTrait;

class ProductCategoryRepository extends BaseRepository
{
    use RepoTrait;

    public function getAllCategories(): Collection
    {
        $columns = ['id AS category_id', 'name'];

        return $this->getAllTemplate($columns);
    }

    public function getCatalogCategories(int $categoryId): Collection
    {
        $columns = ['id AS category_id', 'name'];
        $class = ProductCategory::class;

        return $this->getCategoryMorphRelationTemplate($categoryId, $columns, $class);
    }

    public function getCategoryWithCategorySeoLinks(int $categoryId): array
    {
        return $this
            ->startConditions()
            ->where('id', $categoryId)
            ->select('id')
            ->with([
                'categoryCategories:id,name,slug AS link_part',
                'categorySmartFilterUrls:id,name,url_path AS link_part',
            ])
            ->first()
            ->toArray();
    }
}
