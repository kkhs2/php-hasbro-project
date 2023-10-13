/* jQuery front end validation - check file size and extension */
  const MAX_FILE_SIZE = 100 * 1024 * 1024;
  const ALLOWED_FILE_EXTENSION = 'xlsx';
  
  $(document).ready(function() {
     $('#formFileLg').change(function() {
         fileSize = this.files[0].size;
         fileExt = this.files[0].name;
         fileExt = fileExt.split('.');
         if (fileSize > MAX_FILE_SIZE) {
          this.setCustomValidity('Your file cannot exceed 100MB in size.');
          $('#uploadFileButton').prop('disabled', true);
          this.reportValidity();
         } else if (fileExt[fileExt.length - 1] !== ALLOWED_FILE_EXTENSION) {
          this.setCustomValidity('You file must be .xlsx file type format.');
          $('#uploadFileButton').prop('disabled', true);
          this.reportValidity();
         } else {
          this.setCustomValidity('');
          $('#uploadFileButton').prop('disabled', false);
         }
     });
 });