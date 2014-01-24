<nav>
<div class="row">
<div class="large-12 columns">
<ul class="large-block-grid-4">
  {if isset($DOCUMENTS) && count($DOCUMENTS) > 0}
  	{foreach from=$DOCUMENTS item=document}
  <li class=""><a href="{$document.doc_url}" title="{$document.doc_name}" {if $document.doc_url_openin}target="_blank"{/if}>{$document.doc_name}</a></li>
	{/foreach}
  {/if}
  {if isset($CONTACT_URL)}
  <li><a href="{$CONTACT_URL}" title="{$LANG.documents.document_contact}">{$LANG.documents.document_contact}</a></li>
  {/if}
</ul>
</div>
</div>
</nav>