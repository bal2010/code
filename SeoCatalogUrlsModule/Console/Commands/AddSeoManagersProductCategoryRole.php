<?php

namespace Crm\Modules\SeoCatalogUrlsModule\Console\Commands;

use Crm\Console\Commands\BaseCommand;
use DB;

class AddSeoManagersProductCategoryRole extends BaseCommand
{
    protected $signature   = 'crm:add:seo-managers-product-catalog-update-role';
    protected $description = 'Добавление сео менеджерам роли на изменение категории';

    private const USER_GROUP_ID = 27;
    private const USER_ROLE_ID  = 209;

    public function handle()
    {
        DB::table('user_group_user_role')
            ->insert(['user_group_id' => self::USER_GROUP_ID, 'user_role_id' => self::USER_ROLE_ID]);
    }
}