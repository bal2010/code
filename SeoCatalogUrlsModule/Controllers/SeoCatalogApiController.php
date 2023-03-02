<?php

namespace Modules\SeoCatalogUrlsModule\Controllers;

use Modules\CoreModule\Controllers\CoreController;
use Illuminate\Http\Request;
use Modules\SeoCatalogUrlsModule\Actions\AddCategoryAction;
use Modules\SeoCatalogUrlsModule\Actions\AddSmartFilterUrlAction;
use Modules\SeoCatalogUrlsModule\Actions\GetOptionsAction;
use Modules\SeoCatalogUrlsModule\Actions\RemoveCategoryAction;
use Modules\SeoCatalogUrlsModule\Actions\RemoveSmartFilterUrlAction;
use Modules\SeoCatalogUrlsModule\Classes\GetCategoryCategories;
use Modules\SeoCatalogUrlsModule\Classes\GetCategorySmartFilterUrls;
use Modules\SeoCatalogUrlsModule\Exceptions\WrongCategoryIdException;

class SeoCatalogApiController extends CoreController
{
    public function getCategoryCategories(
        Request $request,
        GetCategoryCategories $getCategoriesByCategory
    ): array {
        $categoryId = (int)$request->input('categoryId');

        return $getCategoriesByCategory->run($categoryId);
    }

    public function getCategorySmartFilterUrls(
        Request $request,
        GetCategorySmartFilterUrls $getCategorySmartFilterUrls
    ): array {
        $categoryId = (int)$request->input('categoryId');

        return $getCategorySmartFilterUrls->run($categoryId);
    }

    /**
     * @throws WrongCategoryIdException
     */
    public function addCategory(
        Request $request,
        AddCategoryAction $addCategoryAction,
        GetCategoryCategories $getCategoriesByCategory
    ): array {
        [$categoryId, $catalogCategoryId] = $this->getParams($request, 'catalogCategoryId');
        $addCategoryAction->run($categoryId, $catalogCategoryId);

        return $getCategoriesByCategory->run($categoryId);
    }

    public function getInitialOptions(GetOptionsAction $getOptionsAction): array
    {
        return $getOptionsAction->run();
    }

    /**
     * @throws WrongCategoryIdException
     */
    public function removeCategory(
        Request $request,
        RemoveCategoryAction $removeCategoryAction,
        GetCategoryCategories $getCategoriesByCategory
    ): array {
        [$categoryId, $catalogCategoryId] = $this->getParams($request, 'catalogCategoryId');
        $removeCategoryAction->run($categoryId, $catalogCategoryId);

        return $getCategoriesByCategory->run($categoryId);
    }

    /**
     * @throws WrongCategoryIdException
     */
    public function addSmartFilterUrl(
        Request $request,
        AddSmartFilterUrlAction $addSmartFilterUrlAction,
        GetCategorySmartFilterUrls $getCategorySmartFilterUrls
    ): array {
        [$categoryId, $catalogSmartFilterUrlId] = $this->getParams($request, 'catalogSmartFilterUrlId');
        $addSmartFilterUrlAction->run($categoryId, $catalogSmartFilterUrlId);

        return $getCategorySmartFilterUrls->run($categoryId);
    }

    /**
     * @throws WrongCategoryIdException
     */
    public function removeSmartFilterUrl(
        Request $request,
        RemoveSmartFilterUrlAction $removeSmartFilterUrlAction,
        GetCategorySmartFilterUrls $getCategorySmartFilterUrls
    ): array {
        [$categoryId, $catalogSmartFilterUrlId] = $this->getParams($request, 'catalogSmartFilterUrlId');
        $removeSmartFilterUrlAction->run($categoryId, $catalogSmartFilterUrlId);

        return $getCategorySmartFilterUrls->run($categoryId);
    }

    private function getParams(Request $request, string $secondParamName): array
    {
        return [(int)$request->input('categoryId'), (int)$request->input($secondParamName)];
    }
}
