<script>
    const device                    = "{{$device}}";
    const app_env                   = "{{$app_env}}";
    const app_url                   = "{{$app->getValue('url')}}";
    const app_name                  = "{{$app->getValue('name')}}";    
    const app_preposition           = "{{$app->getValue('preposition')}}";    
    const domain                    = "{{$dispatch->getValue('app','domain')}}";
    const uri_base                  = "{{$dispatch->getValue('app','uri_base')}}";
    const router_login              = "{{$dispatch->getValue('front','router_login')}}";
    const router_forgot_password    = "{{$dispatch->getValue('front','router_forgot_password')}}";
    const router_new_register       = "{{$dispatch->getValue('front','router_new_register')}}";
    const router_admin              = "{{$dispatch->getValue('admin','router_admin')}}";
</script>

{{if isset($media)}}
    {{foreach from=$media.JS item=item}}
        {{if $item.enabled}}<script type="text/javascript" src="{{$item.path}}"></script>{{/if}}        
    {{/foreach}}
{{/if}}

<script type="text/javascript" src="{{$_js_front_dir_}}global.js"></script>