@extends('layout.app')
@section('contend')

@if ($errors->any())
<div class="alert alert-danger">
 <ul>
     @foreach ($errors->all() as $error)
         <li>{{$error}}</li>
     @endforeach
 </ul>
</div>
@endif

<div class="container mt-4">
    <form action="{{route('off.store')}}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="Office_Name" class="form-label">اسم المكتب</label>
            <input type="text" class="form-control" id="Office_Name" name="Office_Name">
        </div>
        <div class="mb-3">
            <label for="address" class="form-label">العنوان</label>
            <input type="text" class="form-control" id="address" name="address">
        </div>
        <div class="mb-3">
            <label for="Country" class="form-label">الدولة</label>
            <input type="text" class="form-control" id="Country" name="Country">
        </div>
        <div class="mb-3">
            <label for="current_balance" class="form-label">رصيد المكتب</label>
            <input type="text" class="form-control" id="current_balance" name="current_balance">
        </div>
        <button type="submit" class="btn btn-primary">تأكيد</button>
    </form>
</div>
@endsection

 