@extends('layouts.dashboard')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Slideshow</h4>
                    </div>
                    <div class="card-body">
                        @if($message = Session::get('error'))
                            <div class="alert alert-warning">
                                <p>{{ $message }}</p>
                            </div>
                        @endif
                        @if ($message = Session::get('success'))
                            <div class="alert alert-success">
                                <p>{{ $message }}</p>
                            </div>
                        @endif
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th width="50px">No</th>
                                        <th>Image</th>
                                        <th>Title</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($itemslideshow as $slide)
                                    <tr>
                                        <td>{{ ++$no }}</td>
                                        <td><img src="{{ asset($slide->img_slideshow) }}" 
                                        alt="{{ $slide->caption_title }}" width="150px" 
                                        class="img-thumbnail"></td>
                                        <td>{{ $slide->caption_title }}</td>
                                        <td>
                                            <form action="{{ route('slideshow.destroy', $slide->id_slideshow) }}" method="POST"
                                                style="display: inline;">
                                                @csrf
                                                @method('delete')
                                                <button class="btn btn-sm btn-danger mb-2" onclick="return confirm('Are you sure to remove this slideshow?')">
                                                    Delete
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="4">
                                            <div class="alert alert-danger">
                                                Slideshow does not exist
                                            </div>
                                        </td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                            {{ $itemslideshow->links() }}
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-4">
                                <form action="{{ route('slideshow.store') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <label for="image">Image</label>
                                        <br>
                                        <input type="file" name="img_slideshow" id="img_slideshow">
                                    </div>
                                    <div class="form-group">
                                        <label for="caption_title">Title</label>
                                        <input type="text" name="caption_title" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary">Upload</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection