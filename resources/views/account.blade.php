@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">My Account</div>

                <div class="panel-body">
                    First Name: {{Auth::user()->first_name}}<br />
                    Last Name: {{Auth::user()->last_name}}<br />
                    Email: {{Auth::user()->email}}<br />
                    Phone: {{Auth::user()->phone}}<br />
                    Password: {{Auth::user()->password}}<br />
                    
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

