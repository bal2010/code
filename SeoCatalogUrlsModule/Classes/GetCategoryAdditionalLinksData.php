<?php

namespace Modules\SeoCatalogUrlsModule\Classes;

use Crm\Models\SmartFilterUrlPart;
use Crm\ProductCategory;
use Illuminate\Support\Collection;
use URL;
use Crm\Http\Controllers\Flor\CatalogController;

class GetCategoryAdditionalLinksData
{
    public function run(array $categoryData): Collection
    {
        $linksData = [];
        $linksData = array_merge($linksData, $this->getRelationLinksData($categoryData['category_categories']));
        $linksData = array_merge($linksData, $this->getRelationLinksData($categoryData['category_smart_filter_urls']));

        return collect($linksData);
    }

    private function getRelationLinksData(array $relationData): array
    {
        $data = [];
        foreach ($relationData as $modelArray) {
            $data[] = (object)[
                'name' => $modelArray['name'],
                'link' => $this->getLink($modelArray['pivot']['category_seo_link_type'], $modelArray['link_part']),
            ];
        }

        return $data;
    }

    private function getLink(string $type, string $linkPart): string
    {
        if ($type == ProductCategory::class) {
            return URL::action([CatalogController::class, 'getCatalog'], $linkPart);
        }
        if ($type == SmartFilterUrlPart::class) {
            return URL::action([CatalogController::class, 'getCatalog']) . $linkPart;
        }

        return '';
    }
}
