<?php

use Modules\SeoCatalogUrlsModule\Controllers\SeoCatalogApiController;

Route::prefix('seo-catalog-urls')
    ->name('api.seoCatalogUrls.')
    ->group(function () {
        /** @link http://lcrm.lc/api/seo-catalog-urls/options/ */
        Route::get('options', [SeoCatalogApiController::class, 'getInitialOptions'])->name('options');

        /** @link http://lcrm.lc/api/seo-catalog-urls/category-categories/ */
        Route::get('category-categories', [SeoCatalogApiController::class, 'getCategoryCategories'])->name(
            'categoryCategories'
        );

        /** @link http://lcrm.lc/api/seo-catalog-urls/category/add/ */
        Route::post('category/add', [SeoCatalogApiController::class, 'addCategory'])->name('category.add');

        /** @link http://lcrm.lc/api/seo-catalog-urls/category/remove/ */
        Route::post('category/remove', [SeoCatalogApiController::class, 'removeCategory'])->name('category.remove');

        /** @link http://lcrm.lc/api/seo-catalog-urls/category-smart-filter-urls/ */
        Route::get('category-smart-filter-urls', [SeoCatalogApiController::class, 'getCategorySmartFilterUrls'])->name(
            'categorySmartFilterUrls'
        );

        /** @link http://lcrm.lc/api/seo-catalog-urls/smart-filter-url/add/ */
        Route::post('smart-filter-url/add', [SeoCatalogApiController::class, 'addSmartFilterUrl'])->name(
            'smartFilterUrl.add'
        );

        /** @link http://lcrm.lc/api/seo-catalog-urls/smart-filter-url/remove/ */
        Route::post('smart-filter-url/remove', [SeoCatalogApiController::class, 'removeSmartFilterUrl'])->name(
            'smartFilterUrl.remove'
        );
    });
