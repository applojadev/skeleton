{{if isset($breadcrumb) && count($breadcrumb) > 0}}   
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            {{foreach from=$breadcrumb item=item}}
                <li 
                    class="breadcrumb-item {{if $item.active}}active{{/if}}"
                    {{if $item.active}}aria-current="page"{{/if}}>
                    {{if $item.active}}{{$item.rotulo}}{{else}}<a href="{{$item.link}}">{{$item.rotulo}}</a>{{/if}}
                </li>
            {{/foreach}}
        </ol>
    </nav>
{{/if}}
