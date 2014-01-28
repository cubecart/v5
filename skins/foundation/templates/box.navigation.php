<h3>{$LANG.navigation.title}</h3>
<div class="contain-to-grid">
   <nav class="top-bar category-nav" data-topbar="">
      <ul class="title-area">
         <!-- Title Area -->
         <li class="name">
         </li>
         <!-- Remove the class "menu-icon" to get rid of menu icon. Take out "Menu" to just have icon alone -->
         <li class="toggle-topbar menu-icon"><a href="">Menu</a></li>
      </ul>
      <section class="top-bar-section">
         <ul class="left">
            <li><a href="{$STORE_URL}/index.php" title="{$LANG.navigation.homepage}">{$LANG.navigation.homepage}</a></li>
            {$NAVIGATION_TREE}
            {if $CTRL_CERTIFICATES && !$CATALOGUE_MODE}
            <li><a href="{$URL.certificates}" title="{$LANG.navigation.giftcerts}">{$LANG.navigation.giftcerts}</a></li>
            {/if}
            {if $CTRL_SALE}
            <li><a href="{$URL.saleitems}" title="{$LANG.navigation.saleitems}">{$LANG.navigation.saleitems}</a></li>
            {/if}
         </ul>
      </section>
   </nav>
</div>