<?php

use Modules\SeoCatalogUrlsModule\Controllers\SeoCatalogController;

/** @link http://lcrm.lc/seo-catalog-urls/ */

Route::get('seo-catalog-urls', SeoCatalogController::class)
    ->name('seoCatalogUrls');
