<?php

namespace Modules\SeoCatalogUrlsModule\Actions;

use Crm\ProductCategory;

class AddSmartFilterUrlAction extends AbstractCategoryRelationSyncAction
{
    protected function syncCategory(ProductCategory $sourceCategory, int $targetCategoryId)
    {
        $sourceCategory
            ->categorySmartFilterUrls()
            ->syncWithoutDetaching([$targetCategoryId]);
    }
}
