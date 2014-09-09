Installation
============

We assume you're familiar with `Composer <http://packagist.org>`_, a dependency manager for PHP.
Use following command to add the bundle to your `composer.json` and download package.

If you have `Composer installed globally <http://getcomposer.org/doc/00-intro.md#globally>`_.

.. code-block:: bash

    $ composer require nim/form-bundle:0.1.0@dev

Otherwise you have to download .phar file.

.. code-block:: bash

    $ curl -sS https://getcomposer.org/installer | php
    $ php composer.phar require nim/form-bundle:0.1.0@dev

Adding required bundles to the kernel
-------------------------------------

You need to enable the bundle inside the symfony kernel.

.. code-block:: php

    <?php

    // app/AppKernel.php

    public function registerBundles()
    {
        $bundles = array(
            new NIM\FormBundle\NIMFormBundle(),
        );
    }

Twig configuration
------------------

.. code-block:: yaml

    twig:
        form:
            resources:
                - 'NIMFormBundle:Bootstrap3:form.html.twig'

http://phpspec.net Specifications
---------------------------------

.. code-block:: bash

    $ cd path/bundle/
    $ composer install --dev
    $ bin/phpspec run -fpretty
