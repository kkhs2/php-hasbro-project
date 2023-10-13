@extends('common.master')

@section('content')
@if (!$currencies)
<h4>Currently there is no data in the system to convert. Please import your file <a href="{{ url('/import') }}">here</a>.</h4>  
@else
<form method="POST" class="form" name="export" action="{{ url('/export') }}"> 
  @csrf
  <div class="mb-3">
    <h4><label for="formFileLg" class="form-label">Select currency you would like to convert to from GBP:</label></h4>
    <select class="form-select form-select-lg mb-3" name="currency" required>
      <option value="">Please select</option>
      @foreach ($currencies as $c)
        <option value="{{ $c->country }}">{{ $c->country }}</option>
      @endforeach
    </select>
  </div>
  <div class="input-group mt-3">
    <button type="submit" name="exportFile" class="btn btn-primary" value="exportFile">Export</button>
  </div>
</form>
@endif
@endsection