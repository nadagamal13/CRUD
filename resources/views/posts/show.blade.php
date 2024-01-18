@extends('layouts.app')
@section('content')
    @section('title')
        Show
    @endsection
    <div>
        <div class="card">
            <h5 class="card-header">Post Info</h5>
            <div class="card-body">
                <h5 class="card-title">Title: {{$post->title}} </h5>
                <p class="card-text">{{$post->description}}</p>
            </div>
        </div>
    </div>
    <div class="my-5">
        <div class="card">
            <h5 class="card-header">Post Creator Info</h5>
            <div class="card-body">
                <h5 class="card-title">Name: {{$post->user ? $post->user->name : 'not found' }} </h5>
                <p class="card-text">Email: {{$post->user ? $post->user->email : 'not found'}}</p>
                <p class="card-text">Posted At: {{$post->created_at}} </p>
            </div>
        </div>
@endsection

