Form extensions
===============

Eternicode Datepicker Extension
-------------------------------

:Extended type: date
:Rendered as: input text field
:Inherited options: these options inherit from the date `date <http://symfony.com/fr/doc/current/reference/forms/types/date.html>`_ type

Available options, see the plugin doc for more details :
    - **plugin_rendered :** string. Enable or not the jquery plugin, it is enabled by default (available values : plugin or none).
    - **autoclose :** boolean
    - **before_show_day :** string
    - **calendar_weeks :** boolean
    - **clear_btn :** boolean
    - **days_of_week_disabled :** array
    - **end_date :** string
    - **force_parse :** boolean
    - **inputs :** array
    - **keyboard_navigation :** boolean
    - **language :** string
    - **min_view_mode :** string or integer
    - **orientation :** string
    - **start_date :** string
    - **start_view :** string
    - **today_btn :** boolean
    - **today_highlight :** boolean
    - **week_start :** integer

The locale and the date form will be automatically calculated.

**More informations on eternicode datepicker :**

:Website: http://eternicode.github.io/bootstrap-datepicker
:Github: https://github.com/eternicode/bootstrap-datepicker

Select2 Extension
-----------------

:Extended type: choice
:Rendered as: select field
:Inherited options: these options inherit from the `choice <http://symfony.com/fr/doc/current/reference/forms/types/choice.html>`_ type

Available options, see the plugin doc for more details :
    - **plugin_rendered :** string. Enable or not the jquery plugin, it is enabled by default (available values : plugin or none).
    - **width :** string
    - **load_more_padding :** integer
    - **close_on_select :** bool
    - **open_on_enter :** bool
    - **container_css :** string
    - **dropdown_css :** string
    - **container_css_class :** string
    - **dropdown_css_class :** string
    - **format_result :** string
    - **format_selection :** string
    - **sort_results :** string
    - **format_result_css_class :** string
    - **format_selection_css_class :** string
    - **format_no_matches :** string
    - **format_input_too_short :** string
    - **format_input_too_long :** string
    - **format_selection_too_big  :** string
    - **format_load_more :** string
    - **format_searching :** string
    - **minimum_results_for_search :** integer
    - **minimum_input_length :** integer
    - **maximum_input_length :** integer
    - **maximum_selection_size :** integer
    - **id :** string
    - **matcher :** string
    - **separator :** string
    - **token_separators :** array
    - **tokenizer :** string
    - **escape_markup :** string
    - **blur_on_change :** bool
    - **select_on_blur :** bool
    - **adapt_container_css_class :** string
    - **adapt_dropdown_css_class  :** string
    - **next_search_term :** string

**More informations on select2 :**

:Website: http://ivaynberg.github.io/select2
:Github: https://github.com/ivaynberg/select2

Enabling the jquery plugins
---------------------------

Each element managed by these extensions have `data-plugin-name` attribute (can be useful to select them from the DOM). There are several way to enable jquery plugins:

- Your plugin get its configuration from data attributes. Good! Just follow the plugin doc.
- If your plugin can not get configuration from the dom, you still can rewrite the plugin definition. It is not useful because it will be hard to update your plugin after that... You can use the plugin manager! It will automatically find the configuration plugin in the dom and enable the plugin. There are some step to respect:
    + The plugin needs to expose its defaults options (expose them yourself).
    + Use the scripts `plugin-options-factory.js` and `plugin-options-manager.js` in your page.

Note: Some options are functions, you can register them in the factory.