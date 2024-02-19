@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="row w-100 mx-0 my-3 mb-4">
                <div class="col-6 d-flex justify-content-start align-items-center">
                    <h4 class="mb-0">Post List</h4>
                </div>
                <div class="col-6 d-flex justify-content-end align-items-center">
                    <a href="{{ route('posts.create') }}" class="btn btn-md btn-success">
                        <i class="far fa-plus mr-2"></i>Add Post
                    </a>
                </div>
            </div>
            <div class="card border-0 shadow-sm rounded">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataPosts">
                            <thead>
                                <tr>
                                    <th scope="col">Image</th>
                                    <th scope="col">Title</th>
                                    <th scope="col">Content</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($posts as $post)
                                    <tr>
                                        <td class="text-center">
                                            <img src="{{ asset('/storage/posts/' . $post->image) }}" class="rounded"
                                                style="width: 150px">
                                        </td>
                                        <td>{{ $post->title }}</td>
                                        <td>{!! $post->content !!}</td>
                                        <td class="text-center">
                                            <form onsubmit="return confirm('Apakah Anda Yakin ?');"
                                                action="{{ route('posts.destroy', $post->id) }}" method="POST">
                                                <a href="{{ route('posts.show', $post->id) }}" class="btn btn-sm btn-dark">
                                                    <i class="far fa-eye"></i>
                                                </a>
                                                <a href="{{ route('posts.edit', $post->id) }}"
                                                    class="btn btn-sm btn-primary">
                                                    <i class="far fa-pen"></i>
                                                </a>
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger">
                                                    <i class="far fa-trash"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <div class="alert alert-danger">
                                        Data Post belum Tersedia.
                                    </div>
                                @endforelse
                            </tbody>
                        </table>
                        {{ $posts->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
