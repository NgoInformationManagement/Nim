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

$.Kortex.ObjectContainer.register('header', NIM.Header);


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
