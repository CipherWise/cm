@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    Campaigns & Characters<br />
                    Email: {{Auth::user()->email}}
                    Phone: {{Auth::user()->phone}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
