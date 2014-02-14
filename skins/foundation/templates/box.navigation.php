<nav class="top-bar category-nav" data-topbar="">
  <ul class="title-area">
     <li class="name"></li>
     <li class="toggle-topbar menu-icon"><a href="">Menu</a></li>
  </ul>
  <section class="top-bar-section">
     <ul class="left">
        <li><a href="index.php" title="{$LANG.common.home}"><i class="fa fa-home"></i></a></li>
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
