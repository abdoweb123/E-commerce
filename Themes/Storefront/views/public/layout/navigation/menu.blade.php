<li class="{{ mega_menu_classes($menu, $type) }}" style="display:block !important">
    <a href="{{ $menu->url() }}" class="nav-link menu-item" target="{{ $menu->target() }}" data-text="{{ $menu->name() }}" style=" line-height:29px !important;">
        @if ($type === 'category_menu' && $menu->hasIcon())
            <span class="menu-item-icon">
                <i class="{{ $menu->icon() }}"></i>
            </span>
        @endif

        {{ $menu->name() }}
    </a>

    @if ($menu->isFluid())
        @include('public.layout.navigation.fluid', ['subMenus' => $menu->subMenus()])
    @else
        @include('public.layout.navigation.dropdown', ['subMenus' => $menu->subMenus()])
    @endif
</li>

