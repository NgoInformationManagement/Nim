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
     * Jquery Plugin option Factory, define each plugin option which is a function
     */
    $.PluginOptionsFactory = (function() {
        var elements = {};

        return {
            /**
             * Add an unique element
             *
             * @param {string} key
             * @param {function} element
             */
            add: function(key, element){
                if (!this.exists(key)) {
                    elements[key] = element;
                }
            },

            /**
             * Remove an element
             *
             * @param {string} key
             */
            remove:function(key) {
                if (this.exists(key)) {
                    delete elements[key]
                }
            },

            /**
             * Get an element
             *
             * @param {string} key
             * @returns {function}
             */
            get: function (key) {
                return elements[key]
            },

            /**
             * Check if the element exists.
             *
             * @param key (string)
             * @returns {boolean}
             */
            exists: function(key) {
                return this.get(key) != undefined;
            }
        }
    })();
}(jQuery);