Bootstrap templates
===================

Field macros
------------

**field_row :** Display the value of a form_row
- label : Label of the field (it can be translation key)
- value : Value of the field
- labelWidth : With of the label (default : 2)

**translatableContant :** Display the translation of a contact
- entityName : Name of your entity (example : mission)
- fieldName : Name of your field (example : type)
- value : Value (example : option1)

Caution  : your translation file need to have the same organisation for each entity :

.. code-block:: yaml

    mission:
        field:
            type
                option:
                    option1 : Option number 1
                    option2 : Option number 2

**boolean :** Display a boolean (with a pretty icon) and wrap it in a link
- bool : Value of the boolean
- successUrl : Href of the link if bool == true
- errorUrl : Href of the link if bool == false

**date :** Display a date
- date : Value of the date
- default : Default if the date is null
- formatter : IntlFormatter constant : short, medium, long, full (default : long)

**date_time :** Display a dateTime

- date : Value of the date
- default : Default if the date is null
- dateFormatter : IntlFormatter constant : short, medium, long, full (default : long)
- hourFormatter : IntlFormatter constant : short, medium, long, full (default : long)

**address :** Display an address

Notification macros
-------------------

**flashes :** Display all the flashes messages

**alert :** Display a bootstrap alert :
- text : Message to print (string or array)
- type : danger | warning | success | info (Default : info)

Availables shortcut : danger, error, warning, success and info

Pagination macros
-----------------

**pagination :** Rendered the paginator toolbar
- paginator
- options
