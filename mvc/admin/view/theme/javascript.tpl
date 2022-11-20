<script>
    const device            = "{{$device}}";
    const app_url           = "{{$app->getValue('url')}}";
    const app_name          = "{{$app->getValue('name')}}";    
    const app_preposition   = "{{$app->getValue('preposition')}}";    
    const domain            = "{{$dispatch->getValue('app','domain')}}";
    const uri_base          = "{{$dispatch->getValue('app','uri_base')}}";    
    const router_admin      = "{{$dispatch->getValue('admin','router_admin')}}";
</script>

<script type="text/javascript" src="{{$_js_admin_dir_}}global.js"></script>

{{if isset($media)}}
    {{foreach from=$media.JS item=item}}
        {{if $item.enabled}}<script type="text/javascript" src="{{$item.path}}"></script>{{/if}}        
    {{/foreach}}
{{/if}}