<?php

namespace Modules\SeoCatalogUrlsModule\Classes;

use Modules\SeoCatalogUrlsModule\Repositories\SmartFilterRepository;

class GetCategorySmartFilterUrls
{
    private SmartFilterRepository $smartFilterRepository;

    public function __construct(SmartFilterRepository $smartFilterRepository)
    {
        $this->smartFilterRepository = $smartFilterRepository;
    }

    public function run(int $categoryId): array
    {
        return [
            'categorySmartFilterUrls' => $this->smartFilterRepository->getCategorySmartFilterUrls($categoryId),
        ];
    }
}
