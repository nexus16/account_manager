<form role="form" method="POST" class="form-edit">
	{{csrf_field()}}
  <div class="form-group">
    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Email" name="email" value="{{$account->email}}">
  </div>
  <div class="form-group">
    <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Password" name="password" value="{{$account->password}}">
  </div>
  <div class="form-group">
  	<button class="btn btn-danger cancel-update" type="button">Cancel</button>
  	<button class="btn btn-primary update" type="button"
  		data-url="{{route('accounts.update', $account->account_id)}}"
		data-id = "{{$account->account_id}}"
  		">Update</button>
  </div>
</form>