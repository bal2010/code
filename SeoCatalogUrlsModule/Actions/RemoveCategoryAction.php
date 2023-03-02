<?php

namespace Modules\SeoCatalogUrlsModule\Actions;

use Crm\ProductCategory;

class RemoveCategoryAction extends AbstractCategoryRelationSyncAction
{
    protected function syncCategory(ProductCategory $sourceCategory, int $targetCategoryId)
    {
        $sourceCategory
            ->categoryCategories()
            ->detach([$targetCategoryId]);
    }
}
