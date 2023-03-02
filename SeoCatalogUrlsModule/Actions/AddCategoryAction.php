<?php

namespace Modules\SeoCatalogUrlsModule\Actions;

use Crm\ProductCategory;

class AddCategoryAction extends AbstractCategoryRelationSyncAction
{
    protected function syncCategory(ProductCategory $sourceCategory, int $targetCategoryId)
    {
        $sourceCategory
            ->categoryCategories()
            ->syncWithoutDetaching([$targetCategoryId]);
    }
}
