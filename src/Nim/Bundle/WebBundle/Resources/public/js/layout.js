/**
 * NiM base namespace
 */
var Nim = Nim || {};

/**
 * Action toolbar
 */
Nim.Header = {
    submitForm: function(formId) {
        $(formId).submit();
    }
};

Nim.Filter = {
    toggle: function() {
        var $filterContainer = $('[data-toggle="filter"]'),
            $headerIcon = $('[data-filter="icon"]');

        $filterContainer.toggle().promise().done(function() {
            if ($filterContainer.is(":hidden")) {
                $headerIcon.addClass('icon-caret-left');
                $headerIcon.removeClass('icon-caret-down');
            } else {
                $headerIcon.addClass('icon-caret-down');
                $headerIcon.removeClass('icon-caret-left');
            }
        });
    }
};


$.Kortex.ObjectContainer.register('header', Nim.Header);
$.Kortex.ObjectContainer.register('filter', Nim.Filter);


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
