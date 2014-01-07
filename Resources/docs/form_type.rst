Form type
=========

Gender type
-----------

Create a choice type with the gender as choices (male, female).

:Parent: Choice
:Name: gender

.. code-block:: php

    $form->add('fieldName', 'gender')

Politeness type
---------------

Create a choice type with the politeness as choices (madam, miss, mister).

:Parent: Choice
:Name: politeness

.. code-block:: php

    $form->add('fieldName', 'politeness')

Delete type
-----------

:Parent: Button
:Name: delete

.. code-block:: php

    $form->add('fieldName', 'delete')
