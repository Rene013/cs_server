<?php

?>
<!-- Latest compiled and minified JavaScript -->
<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>

<!-- TinyMCE -->
<!--<script src="../js/tinymce/tinymce.min.js"></script>-->
<script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>

<!-- Dropzone.js -->
<script src="../js/dropzone.min.js"></script>

<!-- Custom scripts 
<script src="js/bt-Script.js"></script>-->

<!-- Atom.SaveOnBlur.js -->
<script src="../js/jquery.atom.SaveOnBlur.js"></script>

<script>
	//Dropzone.autoDiscover = false;
	$(document).ready(function() {
		
		$("#console-debug").hide();
		
		$("#btn-debug").click(function(){
			
			$("#console-debug").toggle();
			
		});
		
		
		$(".btn-delete").on("click", function() {
			
			var selected = $(this).attr("id");
			var pageid = selected.split("del_").join("");
			
			var confirmed = confirm("Are you sure you want to delete this page?");
			
			if(confirmed == true) {
				
				$.get("ajax/pages.php?id="+pageid);
				
				$("#page_"+pageid).remove();				
				
			}
			
			//alert(selected);
			
		});
		
		
		$("#sort-nav-a").sortable({
			cursor: "move",
			update: function() {
				var order = $(this).sortable("serialize");
				$.get("ajax/list-sort.php", order);
			}
		});
		
		
		$("#sort-nav-b").sortable({
			//placeholder: "ui-state-highlight",
			//connectWith: ".connectedSortable",
			cursor: "move",
			update: function() {
				var order = $(this).sortable("serialize");
				$.get("ajax/list-sort.php", order);
			} 
			
		});
		
		
		$('.nav-form').submit(function(event){
			
			var navData = $(this).serializeArray();
			var navLabel = $('input[name=label]').val();
			var navID = $('input[name=id]').val();
		
			
			$.ajax({
				
				url: "ajax/navigation.php",
				type: "POST",
				data: navData
				
			}).done(function(){
				
				$("#label_"+navID).html(navLabel);
				
			});
			
			
			event.preventDefault();
			
		});
		//DROPZONE
		var avatar_id = $('input[name=id]').val();
		Dropzone.autoDiscover = false;
		/* $().dropzone({
			url:"ajax/avatar.php?id="+avatar_id,
			//if success
			success: function(file, response) {
				//response = JSON.parse(response);
				//console.log(response);
				// code here..
				$(".dropzone").load("ajax/avatar.php?id="+avatar_id);
			},
			
			//if error
			error: function(file) {
				// code here..
			}
		}); */
		//$("#avatar").load("ajax/avatar.php?id="+avatar_id);

	}); // END document.ready();

	tinymce.init({
		selector: 'textarea#body_edit',
		height: 500,
		plugins: [
			'advlist', 'autolink', 'lists', 'link', 'image', 'charmap', 'preview',
			'anchor', 'searchreplace', 'visualblocks', 'code', 'fullscreen',
			'insertdatetime', 'media', 'table', 'help', 'wordcount'
		],
		toolbar: 'undo redo | blocks | ' +
		'bold italic backcolor | alignleft aligncenter ' +
		'alignright alignjustify | bullist numlist outdent indent | ' +
		'removeformat | help',
		content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:16px }'
	});

	
</script>