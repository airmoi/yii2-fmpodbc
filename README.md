Yii2 FileMaker ODBC Connector
=============================
Handle FileMaker Databases through ODBC and API-PHP helper

This extension provide support for gii.

You must use a naming convention using : 
- zkp : ID field
- zkf_XXX : foreign keys

Documentation comming soon

Installation
------------

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
php composer.phar require --prefer-dist airmoi/yii2-fmpodbc "*"
```

or add

```
"airmoi/yii2-fmpodbc": "*"
```

to the require section of your `composer.json` file.


Usage
-----

Once the extension is installed, simply use it in your code by  :

```php
<?= \airmoi\yii2fmpodbc\AutoloadExample::widget(); ?>```