@extends('layouts.app')
@section('content')
	<div class="container account-index">
		<p class="row"><button class="btn btn-default open-form"><span class="glyphicon glyphicon-plus"></span>Add new </button></p>
		<div class="row form-create-new">
			<form role="form" method="POST" data-url={{route('accounts.save')}}>
				{{csrf_field()}}
			  <div class="form-group">
			    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Email" name="email" required>
			  </div>
			  <div class="form-group">
			    <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Password" name="password" required>
			  </div>
			  <div class="form-group">
			  	<button class="btn btn-danger close-form" type="button">Cancel</button>
			  	<button class="btn btn-primary btn-form-create-new" type="button">Create</button>
			  </div>
			</form>
		</div>
		<div class="row list-account">
			@foreach($accounts as $account)
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
			@endforeach
		</div>
	</div>
@stop