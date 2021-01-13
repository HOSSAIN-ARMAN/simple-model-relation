@extends('admin.dashboard')

@section('title')
    Department
@endsection

@push('css')

@endpush

@section('content')

<div class="container">
    <div class="wrap" id="wrap-div">
        <form action="{{ route('department.update') }}" method="post">
            @method('PATCH')
            @include('admin.department.form')
            <div id="btn-div">
                <button type="submit" value="Update" class="btn btn-outline-info text-black-50">Update</button>
                <a href="{{ route('department.show') }}" class="btn btn-danger">Cancel</a>
            </div>
        </form>
    </div>

</div>
@endsection

@push('js')

@endpush

