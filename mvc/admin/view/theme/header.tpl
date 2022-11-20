<!doctype html>
<html lang=”pt-br”>
    <head>
        <meta charset="utf-8">
        <title>Sem nome</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        {{if isset($media)}}
            {{foreach from=$media.CSS item=item}}
                {{if $item.enabled}}
                    <link rel="stylesheet" href="{{$item.path}}" type="text/css" />
                {{/if}}
            {{/foreach}}
        {{/if}}
        {{if $move_js_to_finish == "false"}}
            {{include file="javascript.tpl"}}
        {{/if}}
    </head>
    <body>
        <header>

        </header>