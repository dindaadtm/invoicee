$('.img-form-generator').change(function(){
	readURL(this);
});
function readURL(input) {
	if (input.files && input.files[0]) {
		var reader = new FileReader();
		reader.onload = function(e) {
			$(input).next('.preview_img').attr('src', e.target.result);
		}
		reader.readAsDataURL(input.files[0]);
	}
}