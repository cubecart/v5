<!DOCTYPE html>
<html class="no-js" xmlns="http://www.w3.org/1999/xhtml" dir="{$TEXT_DIRECTION}" lang="{$HTML_LANG}">
   <head>
      <title>{$META_TITLE}</title>
      <meta charset="utf-8" />
      <meta name="viewport" content="width=device-width, initial-scale=1.0" />
      <link rel="canonical" href="{$VAL_SELF}" />
      <link rel="shortcut icon" href="{$STORE_URL}/favicon.ico" type="image/x-icon" />
      <link rel="stylesheet" href="{$STORE_URL}/skins/{$SKIN_FOLDER}/css/foundation.css" />
      <link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
      <link rel="stylesheet" href="{$STORE_URL}/skins/{$SKIN_FOLDER}/css/styles.css" />
      <script src="{$STORE_URL}/skins/{$SKIN_FOLDER}/js/vendor/modernizr.js"></script>
      <link rel="stylesheet" type="text/css" href="{$STORE_URL}/skins/{$SKIN_FOLDER}/css/vendor/jquery.rating.css" media="screen" />
      <link rel="stylesheet" type="text/css" href="{$STORE_URL}/skins/{$SKIN_FOLDER}/css/vendor/jquery.magnifier.css" media="screen" />
      {if isset($CSS)}
      {foreach from=$CSS key=css_keys item=css_files}
      <link rel="stylesheet" type="text/css" href="{$STORE_URL}/{$css_files}" media="screen" />
      {/foreach}
      {/if}
      <!--[if IE 7]>
      <link rel="stylesheet" type="text/css" href="{$STORE_URL}/skins/{$SKIN_FOLDER}/styles/ie7.css" media="screen" />
      <![endif]-->
      <meta http-equiv="Content-Type" content="text/html;charset={$CHARACTER_SET}" />
      <meta name="description" content="{if isset($META_DESCRIPTION)}{$META_DESCRIPTION}{/if}" />
      <meta name="keywords" content="{if isset($META_KEYWORDS)}{$META_KEYWORDS}{/if}" />
      <meta name="robots" content="index, follow" />
      <meta name="generator" content="cubecart" />
      {if $FBOG}
      <meta property="og:image" content="{$PRODUCT.thumbnail}">
      <meta property="og:url" content="{$VAL_SELF}">
      {/if}
      {if $ANALYTICS}
      {literal}<script type="text/javascript">
         var _gaq = _gaq || [];
         _gaq.push(['_setAccount', '{/literal}{$ANALYTICS}{literal}']);
         _gaq.push(['_trackPageview']);
         
         (function() {
           var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
           ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
           var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
         })();
         
      </script>{/literal}
      {/if}
   </head>
   <body>
      {include file='templates/box.eu_cookie.php'}
      <div class="row">
      <div class="large-6 columns">{$SESSION}</div>
      <div class="large-3 columns">{$CURRENCY}</div>
      <div class="large-3 columns">{$LANGUAGE}</div>
      </div>
      <div class="row">
         <div class="header-secondary">
            <div class="large-4 columns"><a href="{$STORE_URL}" class="main-logo"><img src="{$STORE_LOGO}" alt="{$META_TITLE}" /></a></div>
            <div class="large-8 columns">{$SEARCH_FORM}</div>
         </div>
      </div>
      <div class="row">
      <div class="large-12 columns">
      {$CATEGORIES}
      </div>
      </div>
      <div>
         <div class="row">
         	<div class="large-12 columns">
           {include file='templates/element.breadcrumb.php'} 
         	</div>
         </div>
      </div>
      <div class="row {$SECTION_NAME}_wrapper">
         <div class="large-9 columns">
            {include file='templates/box.errors.php'}
            {if isset($CHECKOUT_PROGRESS)}{$CHECKOUT_PROGRESS}{/if}
            {$PAGE_CONTENT}
         </div>
         <div class="large-3 columns">
            {$SHOPPING_CART}
            {$RANDOM_PROD}
            {if isset($POPULAR_PRODUCTS)}{$POPULAR_PRODUCTS}{/if}
            {$SALE_ITEMS}
         </div>
      </div>
      <footer>
         {if isset($SKIN_SELECT)}{$SKIN_SELECT}{/if} 
         <div class="row">
            <div class="large-8 columns">
               {$SITE_DOCS}
            </div>
            <div class="large-4 columns">
               <div class="row collapse">
               <div class="large-12 columns">
               {$MAIL_LIST}
               </div>
               </div>
               <div class="row">
               <div class="large-12 columns">
               {$COPYRIGHT}
               </div>
               </div>
            </div>
         </div>
         
      </footer>
      
      {if isset($DEBUG_INFO)}{$DEBUG_INFO}{/if}
      <script src="{$STORE_URL}/skins/{$SKIN_FOLDER}/js/vendor/jquery.js"></script>
      <script src="{$STORE_URL}/skins/{$SKIN_FOLDER}/js/foundation.min.js"></script>
      <script src="{$STORE_URL}/skins/{$SKIN_FOLDER}/js/vendor/jquery.rating.js"></script>
      <script src="{$STORE_URL}/skins/{$SKIN_FOLDER}/js/vendor/jquery.magnifier.js"></script>
      <script src="{$STORE_URL}/skins/{$SKIN_FOLDER}/js/vendor/jquery.validate.js"></script>
      {foreach from=$JS_SCRIPTS key=k item=script}
	  <script src="{$STORE_URL}/{$script|replace:'\\':'/'}"></script>
	  {/foreach}
      <script>
         $(document).foundation();
      </script>
      <script src="{$STORE_URL}/skins/{$SKIN_FOLDER}/js/cubecart/common.js"></script>
      {if isset($LIVE_HELP)}{$LIVE_HELP}{/if}
   </body>
</html>