require('./bootstrap');

window.dt = require('datatables');

window.$('#table').DataTable();

window.Vue = require('vue');

document.addEventListener('DOMContentLoaded', function(){
	M.AutoInit();
});


