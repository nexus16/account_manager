<div class="col-sm-12 card" id="card-{{$account->id}}">
	<div class="clearfix">
		<div class="pull-left">
			<p><label>Email:</label><span class="email">{{$account->email}}</span></p>
			<p><label>Password:</label><span class="password">{{$account->password}}</span></p>
		</div>
		<div class="pull-right">
			<p><span class="glyphicon glyphicon-pencil edit"
				data-url="{{route('accounts.edit', $account->id)}}"
				data-id = "{{$account->id}}"
				></span></p>
			<p><span class="glyphicon glyphicon-remove delete"
				data-url="{{route('accounts.delete', $account->id)}}"
				data-id = "{{$account->id}}"
				></span></p>
		</div>
	</div>
</div>