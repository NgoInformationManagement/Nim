/**
 * NiM base namespace
 */
var NIM = NIM || {};

/**
 * Action toolbar
 */
NIM.Header = {
    submitForm: function(formId) {
        $(formId).submit();
    }
};

NIM.Filter = {
    toggle: function() {
        $('[data-toggle="filter"]').toggle();
    }
};


$.Kortex.ObjectContainer.register('header', NIM.Header);
$.Kortex.ObjectContainer.register('filter', NIM.Filter);


// Confirmation modal
(function($) {
    $(document).ready(function() {
        var $deleteButton;
        $('[data-confirmation="form"]').on('click', '[data-confirmation="delete"]', function(e){
            e.preventDefault();

            $deleteButton = $(this);
        });

        $('#confirmationModal').on('click', '[data-confirmation-modal="confirm"]', function(e) {
            e.preventDefault();

            $deleteButton.closest('[data-confirmation="form"]').submit();
        });
    })
})(jQuery);
