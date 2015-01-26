/*
 * This file is part of the Nim package.
 *
 * (c) Langlade Arnaud
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

!function($){

    "use strict"

    /**
     * Plugin Option Manager plugin
     *
     * @param element
     * @constructor
     */
    var PluginOptionManager = function (element) {
        this.$element = $(element);
        this.factory = $.PluginOptionsFactory;
        this.pluginName = this.$element.data('plugin-name');

        this.isAvailablePlugin(this.pluginName);

        this.options = this.resolveOptions(
            this.$element.data(),
            this.getPluginDefaultOptions(this.pluginName)
        );

        this.execute(this.pluginName, this.options);
    };

    PluginOptionManager.prototype = {
        constructor : PluginOptionManager,

        /**
         * Get options from html data attributes
         *
         * @param {object} options
         * @param {object} availableOptions
         * @returns {object} cleanedOptions
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
         * @param {string} plugin
         */
        isAvailablePlugin: function (plugin) {
            if ($.fn[plugin] == undefined) {
                throw "The plugin '"+ plugin +"' does not exist.";
            }
        },

        /**
         * Get the default options of the jquery plugin
         *
         * @param {string} plugin
         * @returns {object}
         */
        getPluginDefaultOptions: function(plugin) {
            var options = [];

            if($.fn[plugin].defaults) {
                options = $.fn[plugin].defaults;
            }

            return options;
        },

        /**
         * @param {string} plugin
         * @param {object} option
         */
        execute: function(plugin, option){
            this.$element[plugin](option);
        }
    };

    /*
     * Plugin definition
     */

    $.fn.PluginOptionManager = function () {
        return this.each(function () {
            var $this = $(this);
            var data = $this.data('PluginOptionManager');

            if (!data) {
                $this.data(
                    'PluginOptionManager',
                    (new PluginOptionManager(this))
                )
            }
        })
    };

    $.fn.PluginOptionManager.Constructor = PluginOptionManager;
}(jQuery);
