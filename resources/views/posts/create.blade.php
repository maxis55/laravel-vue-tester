@extends('layouts/main')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <post-form :new-post="true"></post-form>
            </div>
        </div>
    </div>
@endsection