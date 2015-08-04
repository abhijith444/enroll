@extends('app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">Enrollment</div>

				<div class="panel-body" ng-show="loading">Please wait ...</div>
				<div class="panel-body" ng-hide="loading">
					<div class="alert alert-success" ng-show="hasMessage">@{{message}}</div>
					<legend>Enrolled Section</legend>
					
					<table class="table table-striped">
						<thead>
							<th>Course Code</th>
							<th>Course Name</th>
							<th>Instructor</th>
							<th>Time</th>
							<th>Location</th>
						</thead>
						<tr ng-repeat="section in enrolled_sections">
							<td>@{{section.course_code}}</td>
							<td>@{{section.course_name}}</td>
							<td>@{{section.instructor}}</td>
							<td>@{{section.days}} @{{section.time}}</td>
							<td>@{{section.location}}</td>
							<td><a class="btn btn-sm btn-danger" ladda="loginLoading" ng-click="drop(section.id)" data-style="expand-right">Drop</a></td>
						</tr>

					</table>

					<legend>Available</legend>
					<table class="table table-striped">
						<thead>
							<th>Course Code</th>
							<th>Course Name</th>
							<th>Instructor</th>
							<th>Time</th>
							<th>Location</th>
						</thead>
						<tr ng-repeat="section in available_sections">
							<td>@{{section.course_code}}</td>
							<td>@{{section.course_name}}</td>
							<td>@{{section.instructor}}</td>
							<td>@{{section.days}} @{{section.time}}</td>
							<td>@{{section.location}}</td>
							<td><a class="btn btn-sm btn-primary" ladda="loginLoading" ng-click="enroll(section.id)" data-style="expand-right">Enroll</a></td>
						</tr>

					</table>
					<div style="clear:both"></div>
					<div class="modal fade" id="myModal">
						<div class="modal-dialog">
							<div class="modal-content">
								<div class="modal-header">
									<button class="close" data-dismiss="modal">X</button>
									<h4>Sections Available</h4>
								</div>
								<div class="modal-body" id="enModal">
									<div class="alert alert-info">
										Success @{{enrolled}}
									</div>
									<table class="table table-striped">
										<thead>
											<th>CRN</th>
											<th>Course Name</th>
											<th>Created At</th>
											<th>Location</th>
											<th>Capacity</th>
										</thead>
										<tr ng-repeat="section in sections">
											<td>@{{section.crn}}</td>
											<td>@{{section.description}}</td>
											<td>@{{section.created_at}}</td>
											<td>@{{section.updated_at}}</td>
											<td>@{{section.capacity}}</td>
											<td><a class="btn btn-primary" ladda="loginLoading" ng-click="enroll(section.id)" data-style="expand-right">Enroll</a></td>
										</tr>

									</table>


								</div>
							</div>
						</div>
					</div>
					
				</div>
			</div>
		</div>
	</div>
</div>
<script>
var app = angular.module("myApp",['angular-ladda']);

app.controller("SectionsController",function($http,$scope){

	$scope.enrolled = 1 ;

	$scope.load = function() {
		$scope.loading = true;
		$scope.enroll_status = true;
		$scope.enrolled_sections =[];
		$scope.available_sections =[];

		$http.get("my").success(function(data) { 
			$scope.enrolled_sections = data.enrolled_sections;
			$scope.available_sections = data.available_sections;
			
			$scope.loading = false;
		});


	}

	$scope.load();
	


	$http.get("test")
	.success(function(data) { 
		$scope.sections = data.sections;
	});

	$scope.enroll = function(id) {
		$scope.loginLoading = true;
		$http.get("enroll?id="+id)
		.success(function(data) { 
		$scope.message = data.message;
		$scope.hasMessage = true;	
    	$scope.loginLoading = false;
    	$scope.load();
    	
    });
	}

	$scope.drop = function(id) {
		$scope.loginLoading = true;
		$http.get("drop?id="+id)
		.success(function(data) {
		$scope.message = data.message;
		$scope.hasMessage = true;	
    	$scope.loginLoading = false;
    	$scope.load();
    	
    });
	}

});




</script>
@endsection
