/*
 * This file is part of the NIM package.
 *
 * (c) Langlade Arnaud
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

!function($){

    $.Kortex = {};

    $.Kortex.ObjectContainer = (function() {
        var elements = {};

        return {
            /**
             * Add an unique element
             *
             * @param {string} key
             * @param {function} element
             */
            register: function(key, element){
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

    $.Kortex.EventManager = (function(){
        "use strict"

        var $container = null,
            config = null;

        /**
         * Get the controller in container of object
         *
         * @returns {object}
         */
        function getController() {
            config = getGlobalConfig();

            return $.Kortex.ObjectContainer.get(config['controller'])
        }

        /**
         * Get the configuration of the controller
         *
         * @returns {object}
         */
        function getGlobalConfig() {
            if (null === $container) {
                throw "The container does not exist";
            }

            if (null === config) {
                config = $container.data()
            }

            return config;
        }

        return {
            /**
             * Element which have data-controller as HTML attribute
             *
             * @param {object} element
             * @returns {object}
             */
            setContainer: function(element) {
                if (element instanceof jQuery) {
                    $container = element
                } else {
                    $container = $(element);
                }

                return this;
            },

            /**
             *
             */
            listen : function() {
                var $controller = getController();

                $container.find('[data-event]').each(function(index, element) {
                    var $element = $(element),
                        config = $element.data('event');

                    $element.on(
                        config.event,
                        $.proxy($controller[config.method], $controller, config.parameters)
                    )
                });
            }
        }
    })();

    $.Kortex.Application = (function() {
        "use strict"

        return function () {
            $('[data-controller]').each(function(index, element) {
                $.Kortex.EventManager.setContainer(element)
                    .listen();
            });
        }

    })();

    $(document).ready($.Kortex.Application);
}(jQuery);