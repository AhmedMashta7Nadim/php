@extends('layout.app')
@section('contend')

<div class="container mt-4 mb-4">

    @if ($errors->any())
       <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
       </div>
        
    @endif
    <form action="{{ route('registeruser') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">الاسم</label>
            <input type="text" class="form-control" id="name" placeholder="أدخل الاسم" name="name">
        </div>

        <div class="form-group">
            <label for="email">اسم المستخدم</label>
            <input type="email" class="form-control" id="email" placeholder="أدخل البريد الإلكتروني" name="email">
        </div>

        <div class="form-group">
            <label for="password">كلمة السر</label>
            <input type="password" class="form-control" id="password" placeholder="أدخل كلمة السر" name="password">
        </div>

        <div class="form-group">
            <label for="password_confirmation">تأكيد كلمة السر</label>
            <input type="password" class="form-control" id="password_confirmation" placeholder="أعد إدخال كلمة السر" name="password_confirmation">
        </div>

        <button type="submit" class="btn btn-primary">تسجيل</button>
    </form>
</div>
@endsection
