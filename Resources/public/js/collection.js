/*
 * This file is part of the NIM package.
 *
 * (c) Langlade Arnaud
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
*/

!function($){

    "use strict"

    var CollectionForm = function (element, options) {
        this.$element = $(element);
        this.formPrototype = this.$element.data('prototype');
        this.$list = this.$element.find('[data-form-collection="list"]:first')
        this.count = this.$list.children().length;

        this.$element.find('[data-form-collection="add"]')
            .on('click', $.proxy(this.addItem, this));

        $(document).on(
            'click',
            '[data-form-collection="delete"]',
            $.proxy(this.deleteItem, this)
        );
    }

    CollectionForm.prototype = {
        constructor : CollectionForm,

        /**
         * Add a item to the collection.
         * @param event
         */
        addItem: function (event) {
            event.preventDefault();

            var prototype = this.formPrototype.replace(
                /__name__/g,
                this.count
            );

            this.$list.prepend(prototype);
            this.count = this.count + 1;

            this.$list
                .find('[data-form-type="collection"]')
                .CollectionForm();
        },

        /**
         * Delete item from the collection
         * @param event
         */
        deleteItem: function (event) {
            event.preventDefault();

            $(event.currentTarget)
                .closest('[data-form-collection="item"]')
                .remove();

        }
    }

    /*
     * PLUGIN DEFINITION
     */

    $.fn.CollectionForm = function ( option ) {
        return this.each(function () {
            var $this = $(this);
            var data = $this.data('collectionForm');
            var options = typeof option == 'object' && option;

            if (!data) {
                $this.data(
                    'collectionForm',
                    (data = new CollectionForm(this, options))
                )
            }

            if (typeof option == 'string') {
                data[option]();
            }
        })
    }

    $.fn.CollectionForm.Constructor = CollectionForm;


    /* APPLY TO STANDARD SIMPLECOLLECTIONFORM ELEMENTS
     * =================================== */

    $('[data-form-type="collection"]').CollectionForm();
}(jQuery);