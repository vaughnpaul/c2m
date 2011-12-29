<h1 class="style1" style="text-align:left; background-color:#FFFFFF;">Admin Panel Index</h1> 
{tabcontainer}
{tab caption='Company News'}
<div style="* height: 250px; min-height: 250px;">
<br />
{include file='rssfeeds.tpl' feeds=$cn}
</div>
{/tab}
{tab caption='Product Updates'}
<div style="* height: 250px; min-height: 250px;">
<br />
{include file='rssfeeds.tpl' feeds=$pu}
</div>
{/tab}
{tab caption='Support'}
<div style="* height: 250px; min-height: 250px;">
<br />
For technical support, please visit our online help desk.<br />
Here there is a knowledge base, downloads, and the ability to submit an online ticket.<br />
<a href="http://www.solvetechnology.com/helpdesk/">http://www.solvetechnology.com/helpdesk/</a>
</div>
{/tab}
{/tabcontainer}