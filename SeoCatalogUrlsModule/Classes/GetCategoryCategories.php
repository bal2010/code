<?php

namespace Modules\SeoCatalogUrlsModule\Classes;

use Modules\SeoCatalogUrlsModule\Repositories\ProductCategoryRepository;

class GetCategoryCategories
{
    private ProductCategoryRepository $productCategoryRepository;

    public function __construct(ProductCategoryRepository $productCategoryRepository)
    {
        $this->productCategoryRepository = $productCategoryRepository;
    }

    public function run(int $categoryId): array
    {
        return [
            'categoryCategories' => $this->productCategoryRepository->getCatalogCategories($categoryId)
        ];
    }
}
