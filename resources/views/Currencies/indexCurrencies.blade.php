@extends('layout.app')
@section('contend')

   
  

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <h2>صرف العملات</h2>
            <ul class="list-group">
                @forelse ($Currencies as $Currencie)
                <li class="list-group-item">
                    <h4>{{ $Currencie->Name_Currencies }}</h4>
                    <p>Value: {{ $Currencie->value }}</p>
                 
                </li>
                @empty
                <li class="list-group-item">No currencies found.</li>
                @endforelse
            </ul>
        </div>
    </div>
</div>


  
@endsection


