{if $IS_USER}
<h2>{$LANG.account.your_downloads}</h2>
{$PAGINATION}
  
  <table>
  <thead>
  <tr>
  	<td>Download Name</td>
  	<td>Product Name</td>
  	<td>{$LANG.account.download_count}</td>
  	<td></td>
  </tr>
  </thead>
  <tbody>
  {foreach from=$DOWNLOADS item=download}
	  <tr>
	  {if $download.deleted}
	  <td colspan="">{$LANG.account.download_deleted}</td>
	  {elseif $download.active}
	  <td><a href="{$STORE_URL}/index.php?_a=download&amp;accesskey={$download.accesskey}" title="{$LANG.common.download}"><i class="fa fa-download"> {$download.filename}</i></a></td>
	  <td><a href="{$download.product_url}" title="{$LANG.catalogue.view_product}">{$download.name}</a></td>
	  <td>{$download.expires}</td>
	  <td>{$download.downloads}/{$MAX_DOWNLOADS}</td>
  
		{else}
  {$LANG.common.expired}
	<a href="{$download.product_url}" title="View product">{$download.name}</a>
	<strong>{$LANG.account.download_expired}: {$download.expires} - <strong>{$LANG.account.download_count}</strong>: {$download.downloads}/{$MAX_DOWNLOADS}	  
	{/if}
	  </tr>
  {foreachelse}
  <div>{$LANG.notification.no_downloads_available}</div>
  {/foreach}
  </tbody>
  </table>

{$PAGINATION}
{else}
<form action="{$VAL_SELF}" method="post">
  <h2>{$LANG.catalogue.redeem_download_code}</h2>
  <p></p>
  <fieldset>
	<div><label for="download-code">{$LANG.catalogue.download_access_key}</label><span><input type="text" name="accesskey" id="download-code" value="" /></span></div>
  </fieldset>
  <div><input type="submit" value="{$LANG.common.submit}" class="button_submit" /></div>
  </form>
{/if}