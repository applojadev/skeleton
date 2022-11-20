<!doctype html>
<html lang=”pt-br”>
    <head>
        <meta charset="utf-8">
        <title>{{$meta_title}}</title>
        <link rel="preconnect" href="{{$app->getValue('url')}}" />
        <link rel="dns-prefetch" href="{{$app->getValue('url')}}" />
        <link rel="alternative" lang="pt-br" href="{{$app->getValue('url')}}" />
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
        <meta name="apple-mobile-web-app-capable" content="yes" />
        <meta name="mobile-web-app-capable" content="yes" />
        <meta name="apple-touch-fullscreen" content="yes" />
        <meta name="language" content="pt-br" />
        {{if $colors->getValue('enabled_meta_color')}}
        <meta name="theme-color" content="{{$colors->getValue('meta_color')}}">
        <meta name="msapplication-navbutton-color" content="{{$colors->getValue('meta_color')}}">
        <meta name="msapplication-TileColor" content="{{$colors->getValue('meta_color')}}">
        {{/if}}
        <meta name="apple-mobile-web-app-status-bar-style" content="black">
        <meta name="author" content="{{$app->getValue('name')}}" />
        <meta name="copyright" content="{{$app->getValue('name')}}" />
        <meta name="SKYPE_TOOLBAR" content="SKYPE_TOOLBAR_PARSER_COMPATIBLE" />
        <meta name="description" content="{{$meta_description}}" />
        <meta name="subject" content="{{$meta_description}}" />
        <meta name="abstract" content="{{$meta_description}}" />
        <meta name="comment" content="{{$meta_description}}" />
        <meta name="keywords" content="{{$meta_keywords}}">
        <meta name="rating" content="General" />
        <meta name="robots" content="index, follow" />
        <link rel="canonical" href="{{$app->getValue('url')}}" />
        <meta itemprop="name" content="{{$meta_title}}" />
        <meta itemprop="description" content="{{$meta_description}}" />
        <meta itemprop="image" content="{{if isset($og_imagem_thumbnail) && $og_imagem_thumbnail != ""}}{{$og_imagem_thumbnail}}{{else}}{{$logo_desktop}}{{/if}}" />
        <meta itemprop="url" content="{{$app->getValue('url')}}" />
        <meta property="og:type" content="website" />
        <meta property="og:title" content="{{$meta_title}}" />
        <meta property="og:description" content="{{$meta_description}}" />
        <meta property="og:image" content="{{if isset($og_imagem_thumbnail) && $og_imagem_thumbnail != ""}}{{$og_imagem_thumbnail}}{{else}}{{$logo_desktop}}{{/if}}" />
        <meta property="og:url" content="{{$app->getValue('url')}}" />
        <meta property="og:site_name" content="{{$app->getValue('name')}}" />
        <meta property="og:locale" content="pt_BR" />
        <meta property="twitter:domain" content="{{$app->getValue('url')}}" />
        <meta property="twitter:title" content="{{$meta_title}}" />
        <meta property="twitter:description" content="{{$meta_description}}" />
        <meta property="twitter:image" content="{{if isset($og_imagem_thumbnail) && $og_imagem_thumbnail != ""}}{{$og_imagem_thumbnail}}{{else}}{{$logo_desktop}}{{/if}}" />
        <meta property="twitter:url" content="{{$app->getValue('url')}}" />
        <link rel="icon" type="image/png" href="{{$icon_16}}" sizes="16x16">
        <link rel="icon" type="image/png" href="{{$icon_32}}" sizes="32x32">
        <link rel="icon" type="image/png" href="{{$icon_96}}" sizes="96x96">
        <link rel="apple-touch-icon" sizes="57x57" href="{{$apple_icon_57}}">
        <link rel="apple-touch-icon" sizes="60x60" href="{{$apple_icon_60}}">
        <link rel="apple-touch-icon" sizes="72x72" href="{{$apple_icon_72}}">
        <link rel="apple-touch-icon" sizes="76x76" href="{{$apple_icon_76}}">
        <link rel="apple-touch-icon" sizes="114x114" href="{{$apple_icon_114}}">
        <link rel="apple-touch-icon" sizes="120x120" href="{{$apple_icon_120}}">
        <link rel="apple-touch-icon" sizes="144x144" href="{{$apple_icon_144}}">
        <link rel="apple-touch-icon" sizes="152x152" href="{{$apple_icon_152}}">
        <meta name="msapplication-TileImage" content="{{$ms_icon_32}}">
        <meta name="viewport" content="width=device-width, minimum-scale=1, initial-scale=1">
        {{if isset($media)}}
            {{foreach from=$media.CSS item=item}}
                {{if $item.enabled}}
                    <link rel="stylesheet" href="{{$item.path}}" type="text/css" />
                {{/if}}
            {{/foreach}}
        {{/if}}
        {{include file="dynamic-css.tpl"}}                         
        {{if $move_js_to_finish == false}}
            {{include file="javascript.tpl"}}
        {{/if}}
    </head>
    <body>
        <header>
            {{include file="components/menu.tpl"}}
        </header>
        {{include file="components/load.tpl"}}