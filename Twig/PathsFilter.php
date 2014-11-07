<?php

// Replace relative paths with absolute
return new \Twig_SimpleFilter('paths', function ($context, $string) {
    return preg_replace('/(src|href)="\//', '$1="'. $context['app']['config']['website']['url'] .'/', $string);
}, array('needs_context' => true));
