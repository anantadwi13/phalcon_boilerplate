<!DOCTYPE html>
<html>
    <head>
        <title>{% if title is defined %}{{ title }}{% else %}{{ 'Phalcon Boilerplate' }}{% endif %}</title>
    </head>
    <body>
        {{ partial('header') }}
        {{ get_content() }}
        {{ partial('footer') }}
    </body>
</html>