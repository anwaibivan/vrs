<script>
$(document).ready(function(){
	$("#state").on('change', function(){
		var stateID = $(this).val();
		$.ajax({
			method: "POST",
			url: "ajax.php",
			data: {id:stateID},
			dataType: "html",
			success: function(data){
				$("$lga").html(data);
			}
		});
	});
});
</script>