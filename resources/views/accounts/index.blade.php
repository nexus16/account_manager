@extends('layouts.app')
@section('content')
<p><button class="btn btn-primary open-form" data-toggle="modal" data-target="#add-account"><span class="glyphicon glyphicon-plus"></span>追加 </button></p>
<div class="modal fade" id="add-account">
  <div class="modal-dialog">
    <div class="modal-content">
      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">新しいアカウント追加</h4>
        <button type="button" class="close" data-dismiss="modal" style="margin-top: -30px;">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <form role="form" method="POST" action="{{route('accounts.save')}}">
			{{csrf_field()}}
			<div class="form-group">
			    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="アカウントID" name="email" required>
			</div>
			<div class="form-group">
			    <input type="text" class="form-control" id="exampleInputPassword1" placeholder="パスワード" name="password" required>
			</div>
			<div class="form-group">
			  	<button class="btn btn-primary" type="submit">追加</button>
			  	<button class="btn btn-danger" type="button" data-dismiss="modal">キャンセル</button>
			</div>
		</form>
      </div>
    </div>
  </div>
</div>
<table id="user_table" class="table table-bordered table-striped dataTable text-center" role="grid">
    <thead>
    <tr role="row" style="background-color: #3c8dbc">
        <th style="width: 50px;">No</th>
        <th>メルカリアカウント</th>
        <th>パスワード</th>
        <th style="width: 125px;">変更</th>
    </tr>
    </thead>
    <tbody>
		@foreach($accounts as $no => $account)
        <tr>
            <td>{{$no+1}}</td>
            <td>{{$account->email}}</td>
            <td>{{$account->password}}</td>
            <td align="right">
                <a class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete-account-{{$account->id}}">削除</a>
                <div class="modal fade" id="delete-account-{{$account->id}}">
				  <div class="modal-dialog">
				    <div class="modal-content">
				      <!-- Modal body -->
				      <div class="modal-body">
				       	<h3><b>{{$account->email}}</b>アカウントを削除<br>してもよろしいでしょうか？</h3>
				       	<div class="text-center">
				       		<a class="btn btn-primary" type="submit" href="{{route('accounts.delete', $account->id)}}">OK</a>
						  	<button class="btn btn-danger" type="button" data-dismiss="modal">キャンセル</button>
				       	</div>
				      </div>
				    </div>
				  </div>
				</div>
                <a class="btn btn-info btn-sm" data-toggle="modal" data-target="#edit-account-{{$account->id}}">変更</a>
				<div class="modal fade" id="edit-account-{{$account->id}}">
				  <div class="modal-dialog">
				    <div class="modal-content">
				      <!-- Modal Header -->
				      <div class="modal-header">
				        <h4 class="modal-title">新しいアカウント変更</h4>
				        <button type="button" class="close" data-dismiss="modal" style="margin-top: -30px;">&times;</button>
				      </div>

				      <!-- Modal body -->
				      <div class="modal-body">
				        <form role="form" method="POST" action="{{route('accounts.update', $account->id)}}">
							{{csrf_field()}}
							<div class="form-group">
							    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="アカウントID" name="email" required value="{{$account->email}}">
							</div>
							<div class="form-group">
							    <input type="text" class="form-control" id="exampleInputPassword1" placeholder="パスワード" name="password" required value="{{$account->password}}">
							</div>
							<div class="form-group">
							  	<button class="btn btn-primary" type="submit">変更</button>
							  	<button class="btn btn-danger" type="button" data-dismiss="modal">キャンセル</button>
							</div>
						</form>
				      </div>
				    </div>
				  </div>
				</div>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@stop