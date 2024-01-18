 @extends('layouts.app')
 @section('content')
     @section('title')
         Index
     @endsection
<a class="btn btn-primary" href="{{route('posts.create')}}">Create post</a>
         <table class="table">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Title</th>
                <th scope="col">Posted By</th>
                <th scope="col">Posted At</th>
                <th scope="col">Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($posts as $post)
                <tr>
                    <th scope="row">{{$post->id}}</th>
                    <td>{{$post->title}}</td>
                    <td>{{$post->user ? $post->user->name : 'not found' }}</td>
                    <td>{{$post->created_at->format('y-m-d')}}</td>
                    <td><a class="btn btn-success" href="{{route('posts.show',$post->id)}}">View</a>
                        <a class="btn btn-warning" href="{{route('posts.edit',$post->id)}}">Update</a>
                        <form style="display: inline" method="POST" action="{{route('posts.destroy',$post->id)}}">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
         </table>
 @endsection

