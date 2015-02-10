(function(){
	var app = angular.module('myApp', [], function ($interpolateProvider) {
	$interpolateProvider.startSymbol('[[');
	$interpolateProvider.endSymbol(']]');
	}).controller('formController', function formController($scope,$http) {
		// create a blank object to hold our form information
		// $scope will allow this to pass between controller and view
		$scope.formData = {};

		// process the form
		$scope.processForm = function() {
			 $http({
		  method  : 'POST',
		  url     : 'saveconfig',
		  data    : $.param($scope.formData),  // pass in data as strings
		  headers : { 'Content-Type': 'application/x-www-form-urlencoded' }  // set the headers so angular passing info as form data (not request payload)
		 })
		  .success(function(data){
			alert(data[0].name);
})
.error(function(data, status, headers, config) {
if (status === 0) {
site.error = 'No connection. Verify application is running.';
} else if (status == 401) {
site.error = 'Unauthorized';
} else if (status == 405) {
site.error = 'HTTP verb not supported [405]';
} else if (status == 500) {
site.error = 'Internal Server Error [500].';
} else {
site.error = JSON.parse(JSON.stringify(data));
}
});
		};

		
    });
	 // create angular controller and pass in $scope and $http
	
})();
