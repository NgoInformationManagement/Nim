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


    /**
     * Choice Factory, define each select2's option which is a function
     */
    window.ChoiceFactory = (function() {
        var elements = {};

        return {
            /**
             * Add an unique element
             *
             * @param qtring key
             * @param {*}
             */
            add: function(key, element){
                if (!this.exists(key)) {
                    elements[key] = element;
                }
            },

            /**
             * Remove an element
             *
             * @param string key
             */
            remove:function(key) {
                if (this.exists(key)) {
                    delete elements[key]
                }
            },

            /**
             * Get an element
             *
             * @param key
             * @returns {*}
             */
            get: function (key) {
                return elements[key]
            },

            /**
             * Check if the element exists.
             *
             * @param key
             * @returns {boolean}
             */
            exists: function(key) {
                if (this.get(key) != undefined) {
                    return true;
                }

                return false
            }
        }
    })();


    /**
     * Choice Form plugin
     *
     * @param element
     * @constructor
     */
    var ChoiceForm = function (element) {
        this.$element = $(element);
        this.factory = window.ChoiceFactory;
        this.pluginName = this.$element.data('form-render-type')

        this.isAvailablePlugin(this.pluginName);

        this.options = this.resolveOptions(
            this.$element.data(),
            this.getPluginDefaultOptions(this.pluginName)
        );

        this.execute(this.pluginName, this.options);
    }

    ChoiceForm.prototype = {
        constructor : ChoiceForm,

        /**
         * Get select2 options from html data attributes
         *
         * @param object options
         * @returns object
         */
        resolveOptions: function(options, availableOptions) {
            var cleanedOptions = {};

            for (var option in options) {
                if (option in availableOptions) {
                    var optionValue = options[option];
                    if (typeof availableOptions[option] == 'function') {
                        if (this.factory.exists(optionValue)) {
                            cleanedOptions[option] = this.factory.get(optionValue);
                        }
                    } else {
                        cleanedOptions[option] = optionValue;
                    }
                }
            }

            return cleanedOptions;
        },

        /**
         * Check if the jquery plugin exists
         *
         * @param plugin
         */
        isAvailablePlugin: function (plugin) {
            if ($.fn[plugin] == undefined) {
                throw "The plugin '"+ plugin +"' does not exist.";
            }
        },

        /**
         * Get the default options of the jquery plugin
         *
         * @param plugin
         * @returns {*}
         */
        getPluginDefaultOptions: function(plugin) {
            return $.fn[plugin].defaults
        },

        /**
         *
         * @param plugin
         * @param option
         */
        execute: function(plugin, option){
            this.$element[plugin](option);
        }
    }

    /*
     * Plugin definition
     */

    $.fn.ChoiceForm = function () {
        return this.each(function () {
            var $this = $(this);
            var data = $this.data('ChoiceForm');

            if (!data) {
                $this.data(
                    'ChoiceForm',
                    (new ChoiceForm(this))
                )
            }
        })
    }

    $.fn.ChoiceForm.Constructor = ChoiceForm;


    /*
     * Apply to standard ChoiceForm elements
     */

    $('[data-form-type="choice"]').ChoiceForm();
}(jQuery);