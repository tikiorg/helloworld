<div>
<h2 {if isset($color)}style="color: {$color|escape};"{/if}>{tr}Is it working?{/tr}</h2>
<p>{if $prefs.ta_tikiorg_helloworld_boldtext == 'y'}<b>{/if}{$bar|escape}{if $prefs.ta_tikiorg_helloworld_boldtext == 'y'}</b>{/if}</p>
</div>
