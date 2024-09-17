@extends('layout.app')
@section('contend')
<main class="container">
    <div class="d-flex justify-content-end my-2">
        <!-- @if (Auth::check()) -->
        <div style="color: rebeccapurple">
          مرحبًا، {{ Auth::user()->name }}
          <a class="btn btn-danger me-2" href="#" 
          onclick="event.preventDefault(); document.getElementById('logout-form').submit()">@lang('app.Log out')</a>
          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
          @csrf
          </form>
        </div>
      <!-- @else -->
      <div class="ms-auto m-2">
        <a class="btn btn-secondary me-2" href="/register">التسجيل</a>
      </div>
      
      <!-- @endif -->
        <div>
          
            <a class="btn btn-secondary me-2" href="/reim">@lang('app.Transfers Page')</a>
          
        </div>
       
         @can('create', App\Models\Officar::class)
             <a class="btn btn-secondary" href="{{ route('off.create') }}">@lang('app.Add')</a>
         @endcan
    </div>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="my-3 p-3 bg-body rounded shadow-sm">
        <h6 class="border-bottom pb-2 mb-0"> الحوالات</h6>
        @forelse ($offices as $office)
            <div class="d-flex align-items-center justify-content-between pt-3">
                <div class="flex-grow-1">
                    <h5 class="text-primary">{{ $office->Office_Name }}</h5>
                    <p>{{ $office->address }}</p>
                    <p>{{ $office->Country }}</p>
                    <p>{{ $office->current_balance }}</p>
                </div>
                <div class="ms-3">
                 @can('create', App\Models\Officar::class)
                 <a href="{{ route('off.edit', $office->id) }}" class="btn btn-info btn-sm">@lang('app.Update')</a>
                 <form action="{{ route('off.delete', $office->id) }}" method="POST">
                     @csrf
                     @method('DELETE')
                     <button type="submit" class="btn btn-danger btn-sm mt-2">@lang('app.Delate')</button>
                 </form>
                 @endcan
                </div>
            </div>
            <hr>
        @empty
            <p>لا توجد حوالات</p>
        @endforelse
    </div>

    <div style="color: wheat">
        <a style="color: rebeccapurple" class="btn btn-secondary me-2" href="/register">@lang('app.Regstar')</a>
        <a class="btn btn-secondary me-2" href="/login">@lang('app.Log in')</a>
        <a class="btn btn-secondary me-2" href="/curr">{{__('app.Exchange')}}</a>

        
    </div>
</main>
@endsection


