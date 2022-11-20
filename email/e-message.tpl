{{if $message != ""}}
	<tr>
		<td class="space_footer" style="padding:0!important">&nbsp;</td>
	</tr>
	<tr>
		<td class="linkbelow" style="padding:7px 0">
			<font size="2" face="Open-sans, sans-serif" color="#555454">
				<span>
					{{$message}}: <a href="{{$app_url}}" style="color:#337ff1">
						{{$app_name}}</a></span>
			</font>
		</td>
	</tr>
{{/if}}