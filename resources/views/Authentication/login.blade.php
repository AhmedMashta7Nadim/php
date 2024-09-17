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

    <form action="{{ route('loginuser') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="email" class="form-label">اسم المستخدم</label>
            <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
        </div>
        
        <div class="mb-3">
            <label for="password" class="form-label">كلمة السر</label>
            <input type="password" class="form-control" id="password" placeholder="Password" name="password">
        </div>

        <button type="submit" class="btn btn-primary">تسجيل الدخول</button>
    </form>
</div>
@endsection
