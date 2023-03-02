<?php

namespace Crm\Modules\SeoCatalogUrlsModule\Console\Commands;

use Crm\Console\Commands\BaseCommand;
use DB;
use Modules\SeoCatalogUrlsModule\Controllers\SeoCatalogApiController;
use Modules\SeoCatalogUrlsModule\Controllers\SeoCatalogController;

class AddAutoActions extends BaseCommand
{
    private const SEO_VIEW_LIST_ID                = 258;
    private const PRODUCT_CATEGORY_UPDATE_ROLE_ID = 209;

    protected $signature   = 'crm:add:seo-catalog-urls-auto-actions';
    protected $description = 'Установка автоматических действий для функционала seo-ссылок в каталоге';

    public function handle()
    {
        $data = [];
        $roles = [self::SEO_VIEW_LIST_ID, self::PRODUCT_CATEGORY_UPDATE_ROLE_ID];
        $defaults = [
            'excepts'    => '[]',
            'created_at' => now(),
            'updated_at' => now(),
        ];

        foreach ($roles as $role) {
            $seoCatalogData = $defaults;
            $seoCatalogData['controller_name'] = SeoCatalogController::class;
            $seoCatalogData['only'] = json_encode(['index']);
            $seoCatalogData['user_role_id'] = $role;

            $seoCatalogApiData = $defaults;
            $seoCatalogApiData['controller_name'] = SeoCatalogApiController::class;
            $seoCatalogApiData['only'] = json_encode(
                ['addCategory', 'getCategories', 'getInitialOptions', 'removeCategory']
            );
            $seoCatalogApiData['user_role_id'] = $role;

            $data[] = $seoCatalogApiData;
            $data[] = $seoCatalogData;
        }

        DB::table('auth_actions')
            ->insert($data);
    }
}
