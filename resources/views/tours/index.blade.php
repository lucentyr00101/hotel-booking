@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <h1 class="white-text">Tour List</h1>
    <div class="row">
        @foreach ($tours as $tour)
            <div class="col-xl-4  mb-4">
                <div class="card h-100">
                    <div class="card-body">
                        <h4 class="card-title">{{ $tour->tour_name }}</h4>
                        <h6 class="card-title">{{ $tour->tour_sub_title }}</h6>
                        <hr>
                        <ul>
                            @foreach ($tour->inclusions as $inclusion)
                                <li>{{ $inclusion->item }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection