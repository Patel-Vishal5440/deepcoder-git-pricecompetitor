<aside class="sidebar">
   <div class="sidebar__menu-group">
      <ul class="sidebar_nav">
         <li class="menu-title">
            <span>Main menu </span>
         </li>
         <li>
            <a href="{{ route('products.list') }}" class="{{ request()->is('products*') ? 'active' : ''}}">
                <span data-feather="package" class="nav-icon"></span>
                <span class="menu-text">Products</span>
            </a>
         </li>
         <li>
               <a href="{{ route('competitor.list') }}" class="{{ Route::is('competitor.list', 'competitor.create', 'competitor.edit')  ? 'active': '' }}" >
                <span data-feather="users" class="nav-icon"></span>
                <span class="menu-text">Competitors</span>
            </a>
         </li>         
         <li>
            <a href="{{ route('price_history.list') }}" class="{{ request()->is('price-history*') ? 'active' : ''}}">
                <span data-feather="activity" class="nav-icon"></span>
                <span class="menu-text">Price History</span>
            </a>
         </li>
      </ul>
   </div>
</aside>