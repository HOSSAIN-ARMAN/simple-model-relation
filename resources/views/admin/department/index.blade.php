@extends('admin.dashboard')

@section('title')
    Department
@endsection

@push('css')

@endpush

@section('content')

    <div class="container">
        <div class="wrap" id="wrap-div">
            <form action="{{ route('department.store') }}" method="post">

                @include('admin.department.form')

                <div id="btn-div">
                    <button type="submit" value="Update" class="btn btn-outline-info text-black-50">Create</button>
                    <a href="{{ route('department.show') }}" class="btn btn-danger">Cancel</a>
                </div>
            </form>
        </div>
    </div>
@endsection

@push('js')



@endpush
