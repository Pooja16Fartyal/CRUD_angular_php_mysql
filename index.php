<!DOCTYPE html>
<html lang = "en">
    <head>
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<script src = "https://ajax.googleapis.com/ajax/libs/angularjs/1.5.7/angular.min.js"></script>

<script src = "js/app.js"></script>
        <meta charset = "UTF-8" name = "viewport" content = "width=device-width, initial-scale=1"/>
    </head>
<body ng-app="curd">
<div class="container" ng-controller="mainController" ng-init="getRecords()">
    <div class="row">
        <div class="panel panel-heading">User <a href="javascript:void(0);" class="glyphicon glyphicon-plus" onclick="$('.formData').slideToggle();"></a>
        </div>
          <div class="alert alert-danger" style="display: none;"><p></p></div>
          <div class="alert alert-message" style="display: none;"><p></p></div>
    	<div class="panel panel-default users-content">
    		<div class="panel-body formData">
    			<form class="form" name="userForm">
    				<div class="form-group">
    					<label>Name</label>
    					 <input type="text" class="form-control" name="name" required ng-model="tempUserData.name"/>
    				</div>
    				<div class="form-group">
    					<label>Email</label>
    					 <input type="text" class="form-control" required name="email" ng-model="tempUserData.email"/>
    				</div>
    				<div class="form-group">
    					<label>Phone</label>
    					 <input type="text" class="form-control" required name="phone" ng-model="tempUserData.phone"/>
    				</div>

<a href="javascript:void(0);" class="btn btn-warning" onclick="$('.formData').slideUp();">Cancel</a>
<a href="javascript:void(0);" class="btn btn-success" ng-hide="tempUserData.id" ng-click="addUser()">Add User</a>
<a href="javascript:void(0);" class="btn btn-success" ng-hide="!tempUserData.id" ng-click="updateUser()">Update User</a>

    			</form>
    		</div>
    		<table class="table table-striped">
    			 <tr>
                    <th width="5%">#</th>
                    <th width="20%">Name</th>
                    <th width="30%">Email</th>
                    <th width="20%">Phone</th>
                    <th width="14%">Created</th>
                    <th width="10%"></th>
                </tr>
                <tr ng-repeat="user in users">	
                	<td>{{$index+1}}</td>
                	<td>{{user.name}}</td>
                	<td>{{user.email}}</td>
                	<td>{{user.phone}}</td>
                	<td>{{user.created}}</td>
                	<td>
                        <a href="javascript:void(0);" class="glyphicon glyphicon-edit" ng-click="editUser(user)"></a>
                        <a href="javascript:void(0);" class="glyphicon glyphicon-trash" ng-click="deleteUser(user)"></a>
                    </td>
                	
                </tr>
    		</table>
    	</div>
       <!--  <div class="panel panel-default users-content">
            <div class="panel-heading">Users <a href="javascript:void(0);" class="glyphicon glyphicon-plus" onclick="$('.formData').slideToggle();"></a></div>
            <div class="alert alert-danger none"><p></p></div>
            <div class="alert alert-success none"><p></p></div>
            <div class="panel-body none formData">
                <form class="form" name="userForm">
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control" name="name" ng-model="tempUserData.name"/>
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="text" class="form-control" name="email" ng-model="tempUserData.email"/>
                    </div>
                    <div class="form-group">
                        <label>Phone</label>
                        <input type="text" class="form-control" name="phone" ng-model="tempUserData.phone"/>
                    </div>
                    <a href="javascript:void(0);" class="btn btn-warning" onclick="$('.formData').slideUp();">Cancel</a>
                    <a href="javascript:void(0);" class="btn btn-success" ng-hide="tempUserData.id" ng-click="addUser()">Add User</a>
                    <a href="javascript:void(0);" class="btn btn-success" ng-hide="!tempUserData.id" ng-click="updateUser()">Update User</a>
                </form>
            </div>
            <table class="table table-striped">
                <tr>
                    <th width="5%">#</th>
                    <th width="20%">Name</th>
                    <th width="30%">Email</th>
                    <th width="20%">Phone</th>
                    <th width="14%">Created</th>
                    <th width="10%"></th>
                </tr>
                <tr ng-repeat="user in users | orderBy:'-created'">
                    <td>{{$index + 1}}</td>
                    <td>{{user.name}}</td>
                    <td>{{user.email}}</td>
                    <td>{{user.phone}}</td>
                    <td>{{user.created}}</td>
                    <td>
                        <a href="javascript:void(0);" class="glyphicon glyphicon-edit" ng-click="editUser(user)"></a>
                        <a href="javascript:void(0);" class="glyphicon glyphicon-trash" ng-click="deleteUser(user)"></a>
                    </td>
                </tr>
            </table>
        </div> -->
    </div>
</div>
</body>