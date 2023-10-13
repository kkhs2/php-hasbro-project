@extends('common.master')

@section('content')
  <form method="POST" class="form" name="import" action="{{ url('/import') }}" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
      <h4><label for="formFileLg" class="form-label">Upload your file here:</label></h4>
      <input class="form-control form-control-lg" id="formFileLg" name="uploadFile" type="file" required>
    </div>
    <button type="submit" class="btn btn-primary" name="uploadFile" id="uploadFileButton" value="uploadFile" disabled>Upload</button>
  </form>
<script src="{{ URL::asset('js/importValidation.js') }}"></script>
@endsection