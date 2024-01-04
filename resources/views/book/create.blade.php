@extends('book.master')


@section('content')


<div class="mt-5 w-50 mx-auto px-4 py-3 border shadow-sm">
    <h4 class="text-center">Create Book</h4>
    <form action="{{ route('book.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="">Book Name :</label>
            <input type="text" placeholder="Enter Book Name" name="name" class="form-control">
        </div>

        <div class="form-group my-3">
            <label for="">Content Owner :</label>
            <select name="co_id" class="form-control">
                <option value="">Select Content Owner</option>
                @foreach ($content_owners as $co)
                    <option value="{{ $co->idx }}">{{ $co->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group my-3">
            <label for="">Publisher :</label>
            <select name="publisher_id" class="form-control">
                <option value="">Select Publisher</option>
                @foreach ($publishers as $publisher)
                <option value="{{ $publisher->idx }}">{{ $publisher->name }}</option>
                    
                @endforeach
            </select>
        </div>

        <div class="form-group my-3">
            <label for="">Cover Photo :</label>
            <input type="file" name="cover_photo" class="form-control">
        </div>
        
        

        <button type="submit" class="btn btn-primary mt-2">Create</button>
    </form>
</div>


@endsection