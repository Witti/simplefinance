@extends('layouts.app')

@section('content')
    <div class="container spark-screen">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Accounts</div>

                    <div class="panel-body">
                        <ul>
                            @foreach($accounts as $a)
                                <li><a href="{{ url('/account/edit',['id' => $a->id]) }}">{{ $a->title }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection