@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card border-0 shadow-sm rounded">
                <div class="card-body">
                    <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">

                        @csrf

                        <div class="form-group">
                            <label class="font-weight-bold">Image</label>
                            <div class="custom-file @error('image') is-invalid @enderror">
                                <input type="file" class="custom-file-input" name="image" id="image">
                                <label class="custom-file-label" for="image">Choose Image</label>
                            </div>

                            <!-- error message untuk title -->
                            @error('image')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="font-weight-bold">Title</label>
                            <input type="text" class="form-control @error('title') is-invalid @enderror" name="title"
                                value="{{ old('title') }}" placeholder="Enter the Post Title">

                            <!-- error message untuk title -->
                            @error('title')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="font-weight-bold">Content</label>
                            <textarea class="form-control @error('content') is-invalid @enderror" name="content" rows="5"
                                placeholder="Masukkan Konten Post">{{ old('content') }}</textarea>

                            <!-- error message untuk content -->
                            @error('content')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-md btn-primary">
                            <i class="far fa-save mr-2"></i>Save
                        </button>
                        <button type="reset" class="btn btn-md btn-secondary">
                            <i class="far fa-undo mr-2"></i>Reset
                        </button>

                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bs-custom-file-input/dist/bs-custom-file-input.min.js"></script>
    <script>
        bsCustomFileInput.init()
    </script>
@endsection
