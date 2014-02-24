<h3>{$LANG.common.follow_us}</h3>
<ul class="small-block-grid-4 no-bullet nomarg social-icons text-left">
   {if !empty($CONFIG.twitter)}<li><a href="https://twitter.com/{$CONFIG.twitter}" title="Twitter"><i class="fa fa-twitter"></i></a></li>{/if}
   {if !empty($CONFIG.facebook)}<li><a href="https://www.facebook.com/{$CONFIG.facebook}" title="Facebook"><i class="fa fa-facebook"></i></a></li>{/if}
   {if !empty($CONFIG.google_plus)}<li><a href="https://plus.google.com/{$CONFIG.google-plus}" title="Google+"><i class="fa fa-google-plus"></i></a></li>{/if}
   {if !empty($CONFIG.pinterest)}<li><a href="http://www.pinterest.com/{$CONFIG.pinterest}" title="Pinterest"><i class="fa fa-pinterest"></i></a></li>{/if}
</ul>