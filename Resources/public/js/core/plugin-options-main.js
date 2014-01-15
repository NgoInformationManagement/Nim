/*
 * This file is part of the NIM package.
 *
 * (c) Langlade Arnaud
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 *
 * This script is DEPRECATED
 */

/*
 * PluginOptionManage elements
 */

$(document).on('dom-node-inserted', function(e, addedElement) {
    $(addedElement).find('[data-plugin-name]').PluginOptionManager();
});

$('[data-plugin-name]').PluginOptionManager();
