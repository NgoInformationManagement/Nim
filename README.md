Installation
------------

``` bash
$ wget http://getcomposer.org/composer.phar
$ php composer.phar create-project nim/nim-application -s dev
```

Demo
----
[Available here](http://nim.belol.net/app.php)

**Login :** admin, **Password :** admin

Thanks to @bust40 for hosting.

[Behat](http://behat.org) scenarios
-----------------------------------

You need to copy Behat default configuration file and enter your specific ``base_url`` option there.

```bash
$ cp behat.yml.dist behat.yml
$ vi behat.yml
```

Then download [Selenium Server](http://seleniumhq.org/download/), and run it.

```bash
$ java -jar selenium-server-standalone-2.37.0.jar
```
You can run Behat using the following command.

``` bash
$ bin/behat
```

MIT License
-----------

License can be found [here](https://github.com/NgoInformationManagement/NimApplication/blob/master/LICENSE).

Authors
-------

The bundle was originally created by Arnaud Langlade.
See the list of [contributors](https://github.com/NgoInformationManagement/NimApplication/graphs/contributors).