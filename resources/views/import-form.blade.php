@extends('layouts.layouts')

@section('content')
    <div class="pb-5">
        <h1>File Uploader Page</h1>
    </div>

    <div class="card text-dark bg-light mx-auto" style="width: 600px;">
        <div class="card-header">Upload File</div>
        <div class="card-body">
            <br>
            <form action="{{ route('employee.import') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="results">
                    @if (Session::get('success'))
                        <div class="alert alert-success">
                            {{ Session::get('success') }}
                        </div>
                    @endif
                </div>
                <div class="mb-3">
                    <input type="file" name="file" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                        required>
                    <div id="form-help" class="form-text">Choose a file to upload</div>
                </div>
                <div>
                    @if ($errors->has('file'))
                        <span class="text-danger">{{ $errors->first('file') }}</span>
                    @endif
                </div>

                <button type="submit" class="btn btn-primary mx-auto">Submit</button>
            </form>

        </div>
    </div>

@endsection
