<div class="app-navbar flex-shrink-0">
    <div class="app-navbar-item ms-1 ms-md-4">
    </div>
    <div class="app-navbar-item ms-1 ms-md-4" id="kt_header_user_menu_toggle">
        <div class="cursor-pointer symbol symbol-35px"
             data-kt-menu-trigger="{default: 'click', lg: 'hover'}"
             data-kt-menu-attach="parent"
             data-kt-menu-placement="bottom-end">
            <img src="{{Auth::user()->getFirstMediaUrl('moderatorImage')}}" class="rounded-3" alt="user"/>
        </div>
        @include('partials.menus._user-account-menu')
    </div>
</div>
