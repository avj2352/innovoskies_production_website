<section>
	<h3>Order Pages</h3>
  <hr>
	<div class="alert alert-dismissable alert-info">
  <button type="button" class="close" data-dismiss="alert">×</button>
  <strong>Note:</strong> Drag Pages around, then click on Save button to update the changes!
</div>
	<div id="orderResult"></div>
<input type="button" id ="save" value = "Save" class="btn btn-info" />
</section>


<script>
	/*AJAX calls*/
	$(function(){
		/*On page load we will call the following function and it will not take any parameters*/
		/*It will not take in any parameters and when its done it returns the data inside the div#orderResult*/
		$.post('<?php echo site_url('admin/page/order_ajax');?>', {}, function(data){
			$('#orderResult').html(data);
		});

		/*We will add a Javascript listener for the button*/
		$('#save').click(function(){
			/*the toArray is a method of the nested jQuery plugin. Used to retrieve values of the list*/
			oSortable = $('.sortable').nestedSortable('toArray');

			$('#orderResult').slideUp(function(){
				$.post('<?php echo site_url('admin/page/order_ajax');?>', {sortable : oSortable}, function(data){
				$('#orderResult').html(data);
				$('#orderResult').slideDown();
				});
			});/*End of the slideUp function*/
		});
	});
</script>