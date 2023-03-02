<?php

namespace Modules\SeoCatalogUrlsModule\Controllers;

use Modules\CoreModule\Controllers\CoreController;
use Modules\CoreModule\Traits\CrmControllerTrait;
use Illuminate\Http\Request;
use stdClass;

class SeoCatalogController extends CoreController
{
    use CrmControllerTrait;

    public function __invoke(Request $request)
    {
        $title = 'Управление товарами в категориях';
        //Из-за реализации на других страницах необходимо иметь структуру класса
        $category = new StdClass();
        $categoryId = $request->input('categoryId');
        $category->id = $categoryId ? (int)$categoryId : null;

        return view('seoCatalogUrls::listCategories', compact('title', 'category'));
    }
}
