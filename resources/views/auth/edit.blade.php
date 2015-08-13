@extends('app')

@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">Register</div>
				<div class="panel-body">
					@if (count($errors) > 0)
						<div class="alert alert-info">
							
							<ul>
								@foreach ($errors->all() as $error)
									<li>{{ $error }}</li>
								@endforeach
							</ul>
						</div>
					@endif

					
					{!! Form::model($user, array('url' =>'/update-user', 'class'=>'form-horizontal', 'method' => 'POST')) !!}
        			{!! Form::hidden('id', $user->id) !!}
						
					
						<div class="form-group">
							<label class="col-md-4 control-label">Student ID</label>
							<div class="col-md-6">
								{!! Form::text('student_id', Input::old('student_id'), array('class' => 'form-control','disabled')) !!}
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Name</label>
							<div class="col-md-6">
								{!! Form::text('name', Input::old('name'), array('class' => 'form-control')) !!}
								
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">E-Mail Address</label>
							<div class="col-md-6">
								{!! Form::text('email', Input::old('email'), array('class' => 'form-control')) !!}
								
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Facebook URL</label>
							<div class="col-md-6">
								{!! Form::text('facebook_url', Input::old('facebook_url'), array('class' => 'form-control','placeholder'=>'facebook.com/yourusername')) !!}
								
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Password</label>
							<div class="col-md-6">
								<input type="password" required class="form-control" name="password" placeholder="Must have 6 Characters">
							</div>
						</div>

						

						<div class="form-group">
							<div class="col-md-6 col-md-offset-4">
								<button type="submit" class="btn btn-primary">
									Update Profile
								</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
