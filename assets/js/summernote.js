$(document).ready(function () {
	$('#summernote').summernote({
	  toolbar: [
	    ['style', ['bold', 'italic', 'underline', 'clear']],
	    ['font', ['strikethrough', 'superscript', 'subscript']],
	    ['fontsize', ['fontsize']],
	    ['color', ['color']],
	    ['para', ['ul', 'ol', 'paragraph']],
	    ['height', ['height']],
	    ['insert', ['video', 'link','picture']],
	    ['misc', ['codeview']]
	  ],
	  height: "400px",
	  callbacks: {
	  	onImageUpload: function(files){
			for(var i = 0; i < files.length; i++)
			{
				SubirImagen(files[i]);
			}
		}
	  }
	    
	});

	function SubirImagen(file)
	{
		if(file.type.includes('image'))
		{
			var name = file.name.split(".");
			name = name[0];  
			var data = new FormData();
			data.append('file', file);
			$.ajax({
				url: 'http://localhost/fuerte.sf/Administration/uploadImage',
				type: 'POST',
				contentType: false,
				cache: false,
				processData: false,
				dataType: 'JSON',
				data: data,
				success: function (response) 
				{
					if(response.is_ok)
					{
						$('#summernote').summernote('insertImage', response.url, name);
					}
					else
					{
						console.log(response.error);
					}
				}
			})
			.fail(function(e) {
				console.log(e);
			});
		}
		else
		{
			console.log("El tipo de archivo que intentaste subir no es una imagen");
		}
	}


	$(document).on('change', '.btn-file :file', function() {
		var input = $(this),
			label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
		input.trigger('fileselect', [label]);
		});

		$('.btn-file :file').on('fileselect', function(event, label) {
		    
		    var input = $(this).parents('.input-group').find(':text'),
		        log = label;
		    
		    if( input.length ) {
		        input.val(log);
		    } else {
		        if( log ) alert(log);
		    }
	    
		});
		function readURL(input) {
		    if (input.files && input.files[0]) {
		        var reader = new FileReader();
		        
		        reader.onload = function (e) {
		            $('#img-upload').attr('src', e.target.result);
		        }
		        
		        reader.readAsDataURL(input.files[0]);
		    }
		}

		$("#imgInp").change(function(){
		    readURL(this);
		}); 	


});




