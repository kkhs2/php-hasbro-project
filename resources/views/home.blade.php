@extends('common.master')

@section('content')
<div class="p-5 mb-4 bg-light rounded-3">
    <h1 class="display-5 fw-bold">Hasbro Functions</h1>
    <p class="col-md-8 fs-4">Import and export functionality with product prices converted based on currency.</p>
</div>
<div class="row align-items-md-stretch">
  <div class="col-md-4 mb-4">
      <div class="h-100 p-5 mb-4 text-bg-dark rounded-3">
        <h2>Import</h2>
        <p>Import and upload your file.</p>
        <a href="{{ url('import') }}" class="btn btn-outline-light" type="button">Import</a>
      </div>
  </div>
  <div class="col-md-4 mb-4">
    <div class="h-100 p-5 mb-4 bg-light border rounded-3">
      <h2>Export</h2>
      <p>Export and download your file.</p>
      <a href="{{ url('export') }}" class="btn btn-outline-secondary" type="button">Export</a>
    </div>
  </div>
  <div class="col-md-4 mb-4">
    <div class="h-100 p-5 mb-4 bg-danger border rounded-3 text-white">
      <h2>Clear session</h2>
      <p>Start again afresh.</p>
      <form method="POST" class="clearSession" name="clearSession" action="{{ url('/clearSession') }}">
        @csrf
        <button type="submit" name="clearSession" class="btn btn-outline-light" value="clearSession">Clear</button>
      </form>
    </div>
  </div>
</div>
@endsection