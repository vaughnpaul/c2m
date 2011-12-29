{if $feeds}
{foreach from=$feeds item=feed}
<a href="{$feed.link}" target="_blank" title="{$feed.title}" class="newsLinkTitle" {if $config.newWindow}target="_blank"{/if}><b>{$feed.title}</b></a><br />
<div class="newsDescription">{$feed.description}</div>
{/foreach}
{/if}