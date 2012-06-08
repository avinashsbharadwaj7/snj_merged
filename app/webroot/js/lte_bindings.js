/* Javascript code related to LTE Module functions
 * uses the jQuery library
 * @author Brian Ricks
 */

var jNCBindings = jQuery.noConflict();

jNCBindings('form').submit(function(){
    // On submit, disable all submission buttons.
    disableButtons('submitEmail', 'submitNoEmail', 'workingPlaceholder');
});