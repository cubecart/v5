<div class="hide" id="small-search">
   <div class="row show-for-small-only">
      <div class="small-12 columns">
         <form action="{$ROOT_PATH}index.php" id="search_form" method="get">
            <div class="row collapse">
               <div class="small-10 columns">
                  <input name="search[keywords]" type="text" placeholder="{$LANG.search.input_default}" required />
               </div>
               <div class="small-2 columns">
                  <input class="button postfix" type="submit" value="{$LANG.common.search}" />
               </div>
            </div>
            <input type="hidden" name="_a" value="category" />
         </form>
      </div>
   </div>
</div>