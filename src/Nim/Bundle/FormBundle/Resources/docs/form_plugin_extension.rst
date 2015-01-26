Form extensions
===============

Eternicode Datepicker Extension
-------------------------------

:Extended type: date
:Rendered as: input text field
:Inherited options: these options inherit from the date `date <http://symfony.com/fr/doc/current/reference/forms/types/date.html>`_ type

Available options, see the javascript plugin doc for more details :
    - **plugin_rendered** (string) : Enable or not the jquery plugin, it is enabled by default (available values : plugin or none).
    - **leading_zero** (boolean) : Add the leading zero to the date format.
    - **autoclose** (boolean) : Plugin option.
    - **before_show_day** (string) : Plugin option.
    - **calendar_weeks** (boolean) : Plugin option.
    - **clear_btn** (boolean) : Plugin option.
    - **days_of_week_disabled** (array) : Plugin option.
    - **end_date** (string) : Plugin option.
    - **force_parse** (boolean) : Plugin option.
    - **inputs** (array) : Plugin option.
    - **keyboard_navigation** (boolean) : Plugin option.
    - **language** (string) : Plugin option.
    - **min_view_mode** (string or integer) : Plugin option.
    - **orientation** (string) : Plugin option.
    - **start_date** (string) : Plugin option.
    - **start_view** (string) : Plugin option.
    - **today_btn** (boolean) : Plugin option.
    - **today_highlight** (boolean) : Plugin option.
    - **week_start** (integer) : Plugin option.

The locale and the date form will be automatically calculated.

**Enable the extension in your service.xml:**

.. code-block:: xml

    <services>
        <service id="nim.form.extension.datepicker"
                 class=">Nim\Bundle\FormBundle\Form\Extension\Plugin\EternicodeDatepickerExtension">
            <tag name="form.type_extension" alias="date" />
        </service>
    </services>

**More informations on eternicode datepicker :**

:Website: http://eternicode.github.io/bootstrap-datepicker
:Github: https://github.com/eternicode/bootstrap-datepicker

Select2 Extension
-----------------

:Extended type: choice
:Rendered as: select field
:Inherited options: these options inherit from the `choice <http://symfony.com/fr/doc/current/reference/forms/types/choice.html>`_ type

Available options, see the javascript plugin doc for more details :
    - **plugin_rendered** (string) : Enable or not the jquery plugin, it is enabled by default (available values : plugin or none).
    - **width** (string) : Plugin option.
    - **load_more_padding** (integer) : Plugin option.
    - **close_on_select** (bool) : Plugin option.
    - **open_on_enter** (bool) : Plugin option.
    - **container_css** (string) : Plugin option.
    - **dropdown_css** (string) : Plugin option.
    - **container_css_class** (string) : Plugin option.
    - **dropdown_css_class** (string) : Plugin option.
    - **format_result** (string) : Plugin option.
    - **format_selection** (string) : Plugin option.
    - **sort_results** (string) : Plugin option.
    - **format_result_css_class** (string) : Plugin option.
    - **format_selection_css_class** (string) : Plugin option.
    - **format_no_matches** (string) : Plugin option.
    - **format_input_too_short** (string) : Plugin option.
    - **format_input_too_long** (string) : Plugin option.
    - **format_selection_too_big** (string) : Plugin option.
    - **format_load_more** (string) : Plugin option.
    - **format_searching** (string) : Plugin option.
    - **minimum_results_for_search** (integer) : Plugin option.
    - **minimum_input_length** (integer) : Plugin option.
    - **maximum_input_length** (integer) : Plugin option.
    - **maximum_selection_size** (integer) : Plugin option.
    - **id** (string) : Plugin option.
    - **matcher** (string) : Plugin option.
    - **separator** (string) : Plugin option.
    - **token_separators** (array) : Plugin option.
    - **tokenizer** (string) : Plugin option.
    - **escape_markup** (string) : Plugin option.
    - **blur_on_change** (bool) : Plugin option.
    - **select_on_blur** (bool) : Plugin option.
    - **adapt_container_css_class** (string) : Plugin option.
    - **adapt_dropdown_css_class** (string) : Plugin option.
    - **next_search_term** (string) : Plugin option.

**Enable the extension in your service.xml:**

.. code-block:: xml

    <services>
        <service id="nim.form.extension.select2"
                 class="Nim\Bundle\FormBundle\Form\Extension\Plugin\Select2Extension">
            <tag name="form.type_extension" alias="choice" />
        </service>
    </services>

**More informations on select2 :**

:Website: http://ivaynberg.github.io/select2
:Github: https://github.com/ivaynberg/select2

Colorpicker Extension
-----------------

:Extended type: colorpicker
:Rendered as: text field
:Inherited options: these options inherit from the `text <http://symfony.com/doc/current/reference/forms/types/text.html>`_ type

Available options, see the javascript plugin doc for more details :
    - **plugin_rendered** (string) : Enable or not the jquery plugin, it is enabled by default (available values : plugin or none).
    - **format** (string) : Plugin option.
    - **color** (string) : Plugin option.
    - **container** (string) : Plugin option.
    - **component** (string) : Plugin option.
    - **input** (string) : Plugin option.
    - **horizontal** (bool) : Plugin option.
    - **template** (string) : Plugin option.

**Enable the extension in your service.xml:**

.. code-block:: xml

    <services>
        <service id="nim.form.extension.colorpicker"
                 class="Nim\Bundle\FormBundle\Form\Extension\Plugin\MjolnicColorpickerExtension">
            <tag name="form.type_extension" alias="colorpicker" />
        </service>
    </services>

**More informations on select2 :**

:Website: http://mjolnic.github.io/bootstrap-colorpicker/
:Github: https://github.com/mjolnic/bootstrap-colorpicker/

Factory options plugins
---------------------------

Some plugin options are functions, you can not define them directly in your php form classes. The solution is to use the
the plugin options factory, you can add function like that :

.. code-block:: js

    $.PluginOptionsFactory.add('optionFunctionName', function() {
        return (...)
    });

You can define them in the form class like that :

.. code-block:: php

    $builder->add('startedAt', 'date', array(
        'option_name' => 'optionFunctionName',
    ));

