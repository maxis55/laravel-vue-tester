@extends('layouts/main')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <post-form :title="'Edit post'" :initial-post="{{$post}}"></post-form>
            </div>
        </div>
    </div>
@endsection