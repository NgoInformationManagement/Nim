/**
 * NiM base namespace
 */
var NIM = NIM || {};

/**
 * Action toolbar
 */
NIM.Toolbar = {
    submitForm: function(formId) {
        $(formId).submit();
    }
};

$.Kortex.ObjectContainer.register('toolbar', NIM.Toolbar);