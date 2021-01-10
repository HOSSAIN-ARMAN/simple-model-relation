@extends('admin.dashboard')

@section('title')
    Teacher
@endsection

@push('css')
    <style>
        * {
            box-sizing: border-box;
        }

        input[type=text], select, textarea {
            width: 100%;
            padding: 12px;
            border: 1px solid #ccc;
            border-radius: 4px;
            resize: vertical;
        }

        label {
            padding: 12px 12px 12px 0;
            display: inline-block;
        }

        input[type=submit] {
            background-color: #4CAF50;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            float: right;
        }

        input[type=submit]:hover {
            background-color: #45a049;
        }

        .container {
            border-radius: 5px;
            background-color: #f2f2f2;
            padding: 20px;
        }

        .col-25 {
            float: left;
            width: 25%;
            margin-top: 6px;
        }

        .col-75 {
            float: left;
            width: 75%;
            margin-top: 6px;
        }

        /* Clear floats after the columns */
        .row:after {
            content: "";
            display: table;
            clear: both;
        }

        /* module */
        .module{
            color: #0b2e13;
        }

        /* Responsive layout - when the screen is less than 600px wide, make the two columns stack on top of each other instead of next to each other */
        @media screen and (max-width: 600px) {
            .col-25, .col-75, input[type=submit] {
                width: 100%;
                margin-top: 0;
            }
        }
    </style>
@endpush

@section('content')
@section('module')
    <b class="module">Update Teacher-Info</b>
@endsection

<div class="container">
    <hr>
    <div class="card-body text-success">
        <form action="{{ route('teacher.update') }}" method="post">
            @method('PATCH')
            @include('admin.teacher.form');

            <div class="row">
                <div class="col-25"></div>
                <div class="col-75">
                    <a href="{{ route('teacher.show') }}" class="btn btn-danger">Cancel</a>
                    <button type="submit" value="Update" class="btn btn-outline-info">Update</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection

@push('js')

    <script>
        $(document).ready(function(){
            $('#department_id').val('{{ $teacher->department_id }}');
        });
    </script>

@endpush


