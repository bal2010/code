<?php

namespace Modules\SeoCatalogUrlsModule\Actions;

use Modules\SeoCatalogUrlsModule\Repositories\ProductCategoryRepository;
use Modules\SeoCatalogUrlsModule\Repositories\SmartFilterRepository;

class GetOptionsAction
{
    private ProductCategoryRepository $productCatalogRepository;
    private SmartFilterRepository     $smartFilterRepository;

    public function __construct(
        ProductCategoryRepository $productCatalogRepository,
        SmartFilterRepository $smartFilterRepository
    ) {
        $this->productCatalogRepository = $productCatalogRepository;
        $this->smartFilterRepository = $smartFilterRepository;
    }

    public function run(): array
    {
        return [
            'allCategories'      => $this->productCatalogRepository->getAllCategories(),
            'allSmartFilterUrls' => $this->smartFilterRepository->getAllSmartFilterUrlsForSeoCatalogUrls(),
        ];
    }
}
