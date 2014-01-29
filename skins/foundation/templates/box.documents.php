<h3>{$LANG.common.information}</h3>
<nav>
<ul class="large-block-grid-3 small-block-grid-1">
  {if isset($DOCUMENTS) && count($DOCUMENTS) > 0}
  	{foreach from=$DOCUMENTS item=document}
  <li class=""><a href="{$document.doc_url}" title="{$document.doc_name}" {if $document.doc_url_openin}target="_blank"{/if}>{$document.doc_name}</a></li>
	{/foreach}
  {/if}
  {if isset($CONTACT_URL)}
  <li><a href="{$CONTACT_URL}" title="{$LANG.documents.document_contact}">{$LANG.documents.document_contact}</a></li>
  {/if}
</ul>

</nav>