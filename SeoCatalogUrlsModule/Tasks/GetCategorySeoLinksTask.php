<?php

namespace Modules\SeoCatalogUrlsModule\Tasks;

use Illuminate\Support\Collection;
use Modules\SeoCatalogUrlsModule\Classes\GetCategoryAdditionalLinksData;
use Modules\SeoCatalogUrlsModule\Repositories\ProductCategoryRepository;

class GetCategorySeoLinksTask
{
    private ProductCategoryRepository      $productCategoryRepository;
    private GetCategoryAdditionalLinksData $getCategoryAdditionalLinksData;

    public function __construct(
        ProductCategoryRepository $productCategoryRepository,
        GetCategoryAdditionalLinksData $getCategoryAdditionalLinksData
    ) {
        $this->productCategoryRepository = $productCategoryRepository;
        $this->getCategoryAdditionalLinksData = $getCategoryAdditionalLinksData;
    }

    public function run(int $categoryId): Collection
    {
        $categoryData = $this->productCategoryRepository->getCategoryWithCategorySeoLinks($categoryId);

        return $this->getCategoryAdditionalLinksData->run($categoryData);
    }
}
