
	angular.module('curd',[])
		.controller('mainController',function($scope,$http){
				$scope.users = [];
				$scope.tempUserData = {};
				$scope.message = true;
				$scope.danger = true;
				$scope.getRecords = function(){
					$http.get('action.php',{
						params:{
							'type':'view'
						}
					}).success(function(response){
						console.log(response);
							if(response.status == 'OK'){
									$scope.users = response.records;
							}
					});
				}

				$scope.addUser = function(){
					console.log('add');
					$scope.saveUser('add');
				}
				$scope.updateUser = function(){
					console.log('add');
					$scope.saveUser('edit');
				}
				$scope.deleteUser = function(user){
					var con = confirm('Are Yor SUre?');
					if(con === true){
						var data = $.param({
										'data':user.id,
										'type':'delete'
									});
						var config = {
							headers:{
								'Content-Type':'application/x-www-form-urlencoded;charset =UTF-8'
							}
						}
						$http.post('action.php',data,config).success(function(response){
							if(response.status == 'OK'){
							var index = $scope.users.indexOf(user);
							$scope.users.splice(index,1);
								$('.alert-message').show();
								$('.alert-danger').hide();
								$('.alert-message > p').html(response.msg);
								$('.alert-message').delay().slideUp(function(){
									$('.alert-message').html('');
								})
							}else{
									('.alert-message').hide();
								$('.alert-danger > p').html(response.msg);
						        $('.alert-danger').show();
						        $('.alert-danger').delay(5000).slideUp(function(){
						            $('.alert-danger > p').html('');
						        });
							}
						})
					}
				}
				$scope.editUser = function(user){
					$scope.tempUserData = {
						id:user.id,
						name:user.name,
						email:user.email,
						phone:user.phone,
						created:user.created,
					};
					$scope.index = $scope.users.indexOf(user);
					$('.formDate').slideDown();
					// $scope.saveUser('edit');
				}
				$scope.saveUser = function(type){
					console.log(type);
					console.log($scope.tempUserData);
					var data = $.param({
						'data':$scope.tempUserData,
						'type':type
					});
					var config  = {
						headers:{
							'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
						}
					}

					
					$http.post('action.php',data,config).success(function(response){
						console.log(response.status);
						$scope.message = false;
						$scope.danger = true;

						if(response.status == 'OK'){
							if(type == 'edit'){
									$scope.users[$scope.index].id = $scope.tempUserData.id;
									$scope.users[$scope.index].name = $scope.tempUserData.name;
									$scope.users[$scope.index].email = $scope.tempUserData.email;
									$scope.users[$scope.index].phone = $scope.tempUserData.phone;
									$scope.users[$scope.index].created = $scope.tempUserData.created;
							}else{
								$scope.users.push({
									id:response.data.id,
									name:response.data.name,
									email:response.data.email,
									phone:response.data.phone,
									created:response.data.created,
								});
							}
								$scope.tempUserData = {};	
								$('.formDate').slideUp();
						        $('.alert-danger').hide();
								$('.alert-message > p').html(response.msg);
						        $('.alert-message').show();
						        $('.alert-message').delay(5000).slideUp(function(){
						            $('.alert-danger > p').html('');
						        });
						}else{
								   $('.alert-message').hide();
								$('.alert-danger > p').html(response.msg);
						        $('.alert-danger').show();
						        $('.alert-danger').delay(5000).slideUp(function(){
						            $('.alert-danger > p').html('');
						        });
						}
					});
				}
		});
