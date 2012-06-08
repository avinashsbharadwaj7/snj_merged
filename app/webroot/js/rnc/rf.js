Event.observe(window, 'load', initme, false);
function initme(){
    new Ajax.Autocompleter("RfModuleMarketLead", "autocomplete_choices", "autoComplete", {
        minChars: 2,
        indicator: 'autoindicator'
    });
}