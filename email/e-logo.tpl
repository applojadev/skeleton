{{if $logo == ''}}
    <span style="font-size:36px;color:#000000">{{$app_name}}</span>
{{else}}
    <a title="{{$app_name}}" href="{{$app_url}}" style="color:#337ff1">
        <img src="{{$logo}}" alt="{{$app_name}}" height='80px' width='215px'/>
    </a>
{{/if}}