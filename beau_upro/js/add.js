jQuery(document).ready(function($) { 

	$(document).on('click', '.load_projects', function(e){
		e.preventDefault();
		let _this = $(this);

		let data = {
			'action': 'load_projects',
			'query': _this.attr('data-param-posts'),
			'page': this_page,
		}

		$.ajax({
			url: '/wp-admin/admin-ajax.php',
			data: data,
			type: 'POST',
			success:function(data){
				if (data) {
					$('#response_projects').append(data); 
					this_page++;                      
					if (this_page == _this.attr('data-max-pages')) {
						_this.remove();               
					}
				} else {                              
					_this.remove();                   
				}
			}
		});
	});


	function filter_projects() {
		var filter = $("#filter_projects");
		var url = filter.attr("action");
		var query = filter.serialize();
		newurl = url + "?" + query;
		window.history.pushState({ path: url }, "?", newurl);

		$.ajax({
			url: "/wp-admin/admin-ajax.php",
			data: query,
			type: filter.attr("method"),
			success: function (data) {
				$("#ajax_projects").html(data);
			},
		});
		return false;
	}

	$('#filter_projects button').click(function(e){
		e.preventDefault();
		$('input[name=current_term]').val($(this).attr('data-value'));
		filter_projects();
	});

});