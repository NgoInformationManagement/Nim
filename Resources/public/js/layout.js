/**
 * NiM base namespace
 */
var NIM = NIM || {};

/**
 * Knockout ModelView : action toolbar
 */
NIM.actionToolbar = (function() {
    return {
        submitForm: function(formId) {
            $(formId).submit();
        }
    }
})();

ko.applyBindings(NIM.actionToolbar, $('#top').get(0));
