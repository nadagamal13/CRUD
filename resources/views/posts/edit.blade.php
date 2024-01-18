@extends('layouts.app')
@section('content')
    @section('title')
        Edit
    @endsection
    <form method="POST" action="{{route('posts.update',$post->id)}}">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Title</label>
            <input type="text" class="form-control" id="exampleFormControlInput1" name="title" value="{{$post->title}}">
        </div>
        <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Description</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="description">{{$post->description}}</textarea>
        </div>
        <div class="mb-3">
            <select class="form-select" aria-label="Default select example" name="postCreator">
                @foreach($users as $user)
{{--                    <option @if($user->id == $post->user_id) selected @endif value="{{$user->id}}">{{$user->name}}</option>--}}
                    <option @selected($user->id == $post->user_id) value="{{$user->id}}">{{$user->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <button class="btn btn-warning" type="submit">Update</button>
        </div>
    </form>
@endsection
