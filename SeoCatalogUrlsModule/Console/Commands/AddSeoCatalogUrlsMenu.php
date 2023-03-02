<?php

namespace Crm\Modules\SeoCatalogUrlsModule\Console\Commands;

use Crm\Console\Commands\BaseCommand;
use DB;
use Exception;
use Modules\SeoCatalogUrlsModule\Repositories\SeoCatalogUrlsCrmMenuRepository;
use URL;

class AddSeoCatalogUrlsMenu extends BaseCommand
{
    protected $signature   = 'crm:add:seo-catalog-urls-create-menu';
    protected $description = 'Установка меню и прав для функционала ссылок в каталоге';

    private const SEO_ROLE_VIEW = 'seo.viewList';

    public function handle()
    {
        try {
            $repository = app(SeoCatalogUrlsCrmMenuRepository::class);
            $menuId = $repository->getIdByMethod('/seo-records/');
            $newPosition = $repository->getLastPosition() + 1;
            $attributes = [
                'text' => 'Сео ссылки в каталоге',
            ];

            $values = [
                'method'     => URL::route('seoCatalogUrls'),
                'class'      => '',
                'roles'      => $this->getRolesForMenu(),
                'position'   => $newPosition,
                'real_depth' => 1,
                'parent_id'  => $menuId,
            ];

            DB::table('crm_menus')->updateOrInsert($attributes, $values);
            $this->line('Выполнено');
        } catch (Exception $exception) {
            $this->line('Ошибка: ' . $exception->getMessage());
        }
    }

    private function getRolesForMenu(): string
    {
        return DB::table('user_roles')
            ->select('id')
            ->whereIn('code', [self::SEO_ROLE_VIEW,])
            ->get('id')
            ->pluck('id')
            ->toJson();
    }
}
