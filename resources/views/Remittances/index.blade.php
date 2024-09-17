@extends('layout.app')
@section('contend')
{{-- @if (Auth::check())
  <div style="color: rebeccapurple">
    welcome,{{Auth::user()->name}}
    <a class="btn btn-danger"href="#" 
    onclick="event.preventDefault(); document.getElementById('logout-form').submit()">logout</a>
    <form id="logout-form" action="{{route('logout')}}"method="post" style="display: none;">
    @csrf
    </form>
  </div>
@else
<div class="ms-auto m-2">
  <a class="btn btn-secondary" href="/register">register</a>
</div>

@endif --}}

<br><br>
@can('create', App\Models\Officar::class)
<form action="{{ route('reim.store') }}" method="POST" class="mb-5">
  @csrf
  <div class="row mb-3">
      <div class="col-md-6">
          <label for="num_Remitten" class="form-label">رقم الحوالة</label>
          <input type="text" class="form-control" id="num_Remitten" name="num_Remitten">
      </div>
      <div class="col-md-6">
          <label for="sending_Office" class="form-label">المكتب المرسل</label>
          <input type="text" class="form-control" id="sending_Office" name="sending_Office">
      </div>
  </div>

  <div class="row mb-3">
      <div class="col-md-6">
          <label for="Future_Office" class="form-label">المكتب المستقبل</label>
          <input type="text" class="form-control" id="Future_Office" name="Future_Office">
      </div>
      <div class="col-md-6">
          <label for="Amount_Trens" class="form-label">المبلغ المحول</label>
          <input type="text" class="form-control" id="Amount_Trens" name="Amount_Trens">
      </div>
  </div>

  <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endcan

<h2>قائمة الحوالات</h2>
@if($remittances->count() > 0)
  <ul class="list-group">
      @foreach($remittances as $remittance)
          <li class="list-group-item">رقم الحوالة: {{ $remittance->num_Remitten }} - المبلغ المحول: {{ $remittance->Amount_Trens }}</li>
      @endforeach
  </ul>
@else
  <p>لا توجد حوالات حتى الآن.</p>
@endif



@endsection
