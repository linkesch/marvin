Marvin
======

Marvin is a **micro CMS** for PHP 5.3.


## Why micro CMS?

Currently most used and beloved CMS solutions, such as WordPress, Drupal and Joomla are great, if you're
building big websites for tech-savvy customers, who are not afraid of using complex administration
systems. But if you want to make just a simple few-page website, those systems are huge **overkill**.

Currently used content management systems are really hard to use for a basic user. Too many options doesn't
make users just confused, it enables them to screw things up and that makes them afraid to use system at all.


## What is Marvin?

Marvin is not yet another CMS you need to learn from ground up. It is based on wonderful [Silex framework](http://silex.sensiolabs.org)
which is build on the shoulders of Symfony2 and Pimple. That means it's fully tested and verified by thousands of developers.

Marvin is developed with **Test Driven Development (TDD)** approach using [PHPUnit](http://phpunit.de) for testing backend and [QUnit](http://qunitjs.com) for testing JavaScript.

Default database is set to [SQLite](http://www.sqlite.org), but thank's to Silex it works out of the box with MySQL, PostgreSQL or Oracle, too.

Frontend is build using famous [Bootstrap](http://getbootstrap.com), so you don't have to learn new conventions even here.

It's distributed via [Composer](https://getcomposer.org/) (coming soon to [Packagist](https://packagist.org), too...) and frontend uses full advantage of [Grunt](http://gruntjs.com) and [Bower](http://bower.io).

And the best part? It's **open source and free under MIT license**.


## Installation

1. Install [Composer](https://getcomposer.org)
2. Create in your project folder file **composer.json** with this content:
```
{
    "require": {
      "marvin/core": "dev-master",
      "marvin/pages": "dev-master",
      "marvin/users": "dev-master"
    },
    "repositories": [
      {
        "type": "vcs",
        "url": "https://github.com/orthes/marvin-core"
      },
      {
        "type": "vcs",
        "url": "https://github.com/orthes/marvin-pages"
      },
      {
        "type": "vcs",
        "url": "https://github.com/orthes/marvin-users"
      }
    ],
    "scripts": {
      "post-package-install": "Marvin\\Core\\Install::postPackageInstall"
    }
}
```
3. Run ```composer install``` command
4. Go to folder web/ which was automatically created (```cd web```)
5. Run ```npm install``` command
6. Run ```grunt install``` command

That's it. Now you can visit your new website powered by Marvin in a browser. You will see, that it will
automatically run final installation steps and you are ready to go.


## Warning

Marvin is currently under intense development and is not ready to use in a production yet.


## Author

Pavel Linkesch | [@linkesch](http://twitter.com/linkesch) | [http://www.linkesch.sk](http://www.linkesch.sk)
