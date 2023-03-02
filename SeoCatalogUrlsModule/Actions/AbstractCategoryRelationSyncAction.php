<?php

namespace Modules\SeoCatalogUrlsModule\Actions;

use Crm\Classes\Helper;
use Crm\ProductCategory;
use Modules\SeoCatalogUrlsModule\Exceptions\WrongCategoryIdException;
use Modules\SeoCatalogUrlsModule\Repositories\ProductCategoryRepository;

abstract class AbstractCategoryRelationSyncAction
{
    private ProductCategoryRepository $productCategoryRepository;

    public function __construct(ProductCategoryRepository $productCategoryRepository)
    {
        $this->productCategoryRepository = $productCategoryRepository;
    }

    /**
     * @throws WrongCategoryIdException
     */
    public function run(int $sourceCategoryId, int $targetCategoryId)
    {
        $this->checkIds($sourceCategoryId, $targetCategoryId);

        /** @var ProductCategory $sourceCategory */
        $sourceCategory = $this->productCategoryRepository->findOrFail($sourceCategoryId);

        $this->syncCategory($sourceCategory, $targetCategoryId);
    }

    protected function checkIds(int $rootId, int $chosenId)
    {
        if ($rootId == 0 || $chosenId == 0) {
            $exception = new WrongCategoryIdException();
            Helper::logError($exception, ['id: ' . ($rootId ?? $chosenId)]);
            throw $exception;
        }
    }

    abstract protected function syncCategory(ProductCategory $sourceCategory, int $targetCategoryId);
}
