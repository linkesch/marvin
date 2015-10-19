Marvin
======

[![Latest Stable Version](https://poser.pugx.org/marvin/marvin/v/stable)](https://packagist.org/packages/marvin/marvin)
[![Total Downloads](https://poser.pugx.org/marvin/marvin/downloads)](https://packagist.org/packages/marvin/marvin)
[![Latest Unstable Version](https://poser.pugx.org/marvin/marvin/v/unstable)](https://packagist.org/packages/marvin/marvin)
[![License](https://poser.pugx.org/marvin/marvin/license)](https://packagist.org/packages/marvin/marvin)
[![Build Status](https://travis-ci.org/orthes/marvin.svg?branch=master)](https://travis-ci.org/orthes/marvin)
[![SensioLabsInsight](https://insight.sensiolabs.com/projects/9b0c1fb0-ae10-4270-9445-8c6a7d6a0fcb/mini.png)](https://insight.sensiolabs.com/projects/9b0c1fb0-ae10-4270-9445-8c6a7d6a0fcb)

Marvin is a **micro CMS** for PHP 5.3+.

![Marvin 01](http://i.imgur.com/sEkYLmj.png)
![Marvin 02](http://i.imgur.com/tOPgRYR.png)


## Why micro CMS?

Currently most used and beloved CMS solutions, such as WordPress, Drupal and Joomla are great, if you're
building big websites for tech-savvy customers, who are not afraid of using complex administration
systems. But if you want to make just a simple few-page website, those systems are huge **overkill**.

Currently used content management systems are really hard to use for a basic user. Too many options doesn't
make users just confused, it enables them to screw things up and that makes them afraid to use system at all.


## What is Marvin?

> Marvin: "I am at a rough estimate thirty billion times more intelligent than you. Let me give you an example. Think of a number, any number."
>
> Zem: "Er, five."
>
> Marvin: "Wrong. You see?"

Marvin is [a robot with a brain big as a planet](http://en.wikipedia.org/wiki/Marvin_the_Paranoid_Android) and also a simple CMS for PHP 5.3+.

But Marvin is not yet another CMS you need to learn from ground up. It is based on wonderful [Silex framework](http://silex.sensiolabs.org)
which is build on the shoulders of Symfony2 and Pimple. That means it's fully tested and verified by thousands of developers.

Marvin is developed with **Test Driven Development (TDD)** approach using [PHPUnit](http://phpunit.de) for testing backend and [QUnit](http://qunitjs.com) for testing JavaScript.

Default database is set to [SQLite](http://www.sqlite.org), but thank's to Silex it works out of the box with MySQL, PostgreSQL or Oracle, too.

Frontend is build using famous [Bootstrap](http://getbootstrap.com), so you don't have to learn new conventions even here.

It's distributed via [Composer](https://getcomposer.org/) and frontend uses full advantage of [Grunt](http://gruntjs.com) and [Bower](http://bower.io).

And the best part? It's **open source and free under MIT license**.


## Demo

Live demo could be found here: [http://marvin.linkesch.com](http://marvin.linkesch.com)

Administration is in [/admin](http://marvin.linkesch.com/admin) folder and you can use "**admin**" as a username and "**foo**" as a password.

The live demo's database is automatically refreshed every 10 minutes.


## Plugins

Marvin consists of separate plugins, so for each project you can pick precisely only what you need.

Currently available plugins:

- [Pages](https://github.com/orthes/marvin-pages) *
- [Users](https://github.com/orthes/marvin-users) *
- [Articles](https://github.com/orthes/marvin-articles)
- [**How to create a custom plugin**](https://github.com/orthes/marvin/wiki/Plugins)

Plugins marked with an asterisk (*) are core necessary files needed for Marvin's basic functioning.


## Download and Installation

### Via Composer

The **recommended** way to start with Marvin is via Composer:

1. Install [Composer](https://getcomposer.org)
2. Create in your project folder file **composer.json** with this content:
```
{
  "require": {
    "marvin/marvin": "~0.1"
  },
  "scripts": {
    "post-package-install": "Marvin\\Marvin\\Install::postPackageInstall"
  }
}
```
3. Run ```composer install``` command
4. Go to folder web/ which was automatically created (```cd web```)
5. Run ```npm install``` command
6. Run ```grunt install``` command

That's it. Now you can visit your new website powered by Marvin in a browser. You will see, that it will
automatically run final installation steps and you are ready to go.

### Via an Archive

The best way to download and install Marvin is via Composer (see above), but if you're not comfortable with it,
you can start by downloading an archive with everything included: [Download Marvin 0.1.4 as **ZIP**](https://github.com/orthes/marvin/releases/download/0.1.4/marvin.zip).


## Administration

Administration could be found in **/admin** folder. Default administrator's credentials are:

- E-mail: **admin@test.com**
- Password: **foo**


## Documentation

- [Installation](https://github.com/orthes/marvin/wiki/Installation)
- [Folder Structure](https://github.com/orthes/marvin/wiki/Folder-Structure)
- [Configuration](https://github.com/orthes/marvin/wiki/Configuration)
- [Usage](https://github.com/orthes/marvin/wiki/Usage)
- [Themes](https://github.com/orthes/marvin/wiki/Themes)
- [Plugins](https://github.com/orthes/marvin/wiki/Plugins)


## Author

Pavel Linkesch | [@linkesch](http://twitter.com/linkesch) | [http://www.linkesch.com](http://linkesch.com)
