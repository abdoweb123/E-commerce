<style>
    .vertical-megamenu ul li a{
        line-height:29px !important;
    }
</style>

<div class="category-nav {{ request()->routeIs('home') ? 'show' : '' }}">
    <div class="category-nav-inner">
        {{ trans('storefront::layout.all_categories_header') }}
        <i class="las la-bars"></i>
    </div>



    @if ($categoryMenu->menus()->isNotEmpty())
        <div class="category-dropdown-wrap" style="">
            <div class="category-dropdown" style="overflow:scroll">
                <ul class="list-inline mega-menu vertical-megamenu">
                    @foreach ($categoryMenu->menus() as $menu)
                        @include('public.layout.navigation.menu', ['type' => 'category_menu'])
                        @endforeach

             
                </ul>
            </div>
        </div>
    @endif
</div>
