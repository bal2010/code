@extends('crm.app')

@push('footerScripts')
    <script src="{{ mix('/crm/js/crm-app.js') }}"></script>
@endpush

@section('content')
    <div class="container-fluid">
        <div class="panel panel-default">
            <div class="panel-heading">
                <b>Управление ссылками в категориях</b>

                @include('crm.category.partials.menu')
            </div>
            <div class="panel-body">
                <seo-catalog-urls-component
                        options-route="{{ route('api.seoCatalogUrls.options') }}"
                        category-categories-route="{{ route('api.seoCatalogUrls.categoryCategories') }}"
                        category-add-route="{{ route('api.seoCatalogUrls.category.add') }}"
                        category-remove-route="{{ route('api.seoCatalogUrls.category.remove') }}"
                        category-smart-filter-urls-route="{{ route('api.seoCatalogUrls.categorySmartFilterUrls') }}"
                        smart-filter-url-add-route="{{ route('api.seoCatalogUrls.smartFilterUrl.add') }}"
                        smart-filter-url-remove-route="{{ route('api.seoCatalogUrls.smartFilterUrl.remove') }}"
                        category-id="{{ $category->id }}"
                ></seo-catalog-urls-component>
            </div>
        </div>
    </div>
@endsection
