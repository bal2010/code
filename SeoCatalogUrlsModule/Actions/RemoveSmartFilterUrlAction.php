<?php

namespace Modules\SeoCatalogUrlsModule\Actions;

use Crm\ProductCategory;

class RemoveSmartFilterUrlAction extends AbstractCategoryRelationSyncAction
{
    protected function syncCategory(ProductCategory $sourceCategory, int $targetCategoryId)
    {
        $sourceCategory
            ->categorySmartFilterUrls()
            ->detach([$targetCategoryId]);
    }
}
