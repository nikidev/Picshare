Dropzone.options.addPhotos = {
 maxFilesize: 2,
 acceptedFiles: 'image/*',
 success: function(file, response) {
  if(file.status == 'success'){
   handleDropzoneFileUpload.handleSuccess(response); 
  } else {
   handleDropzoneFileUpload.handleError(response); 
  }
 }
};
var handleDropzoneFileUpload = {
 handleError: function(response) {
  console.log(response);
 },
 handleSuccess: function(response) {
  var imageList = $('#photos-feed ul');
  var imageSrc = baseUrl + '/' + response.file_path;
  $(imageList).append('<li><a href="' + imageSrc + '" data-lightbox="myphotos"><img src="' + imageSrc + '"></a></li>');
 }
};