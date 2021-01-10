@extends('admin.dashboard')

@push('css')
    <style>
        .module{
            color: #1c7430;
        }
    </style>

@endpush

@section('content')

@section('module')
    <b class="module">Student Info</b>
@endsection

<div class="card border-success mb-3" >
    <nav class="navbar navbar-expand-lg navbar-dark teal lighten-2 mb-4">
        <a href="{{ route('student.index') }}" class="btn btn-outline-success btn-lg"><i class="fas fa-plus-square"></i>&nbsp; Create</a>
        <!-- Collapsible content -->
        <div class="collapse navbar-collapse" id="navbarSupportedContent">

            <!-- Search form -->
            <form class="form-inline ml-auto">
                <div class="md-form my-0">
                    <input id="myInput" class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
                </div>
            </form>
        </div>
        <!-- Collapsible content -->
    </nav>
    <table class="table table-bordered border-primary">
        <thead class="btn-info">
        <th>SL</th>
        <th>Name</th>
        <th>Email</th>
        <th>Choose Teacher</th>
        <th>Action</th>
        </thead>
        <tbody id="table">
        @foreach($students as $key=>$student)
            <tr>
                <td>{{ $key + 1 }}</td>
                <td>{{ $student->name }}</td>
                <td>{{ $student->email }}</td>
                <td>
                    <a href="{{ route('assign.teacher', ['id' => $student->id]) }}"><i class="fas fa-check-double"></i></a>
                </td>
                <td>
                    <a href="{{ route('student.edit', ['id' => $student->id]) }}"><i class="fas fa-edit"></i></a>
                    <a href="#" id="{{ $student->id }}" class="student-destroy"><i class="far fa-trash-alt"></i></a>
                    <form id="deleteStudent{{ $student->id }}" action="{{ route('student.destroy') }}" method="POST">
                        @method('delete')
                        @csrf
                        <input  type="hidden" value="{{ $student->id }}" name="id">
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>


@endsection

@push('js')

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#myInput').on("keyup", function () {
                var value = $(this).val().toLowerCase();
                $('#table tr').filter(function () {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
                });
            });
        });
    </script>

    <script>
        $(document).ready(function(){
            $('.student-destroy').click(function () {
                var id = $(this).attr('id');
                if (id){
                    Swal.fire({
                        title: 'Are you sure?',
                        html: "<b>You will delete it permanently!</b>",
                        type: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Yes, delete it!',
                        width: 400,
                    }).then((result) =>{
                        if (result.value){
                            $('#deleteStudent'+id).submit();
                            Swal.fire({
                                position: 'top-end',
                                icon: 'success',
                                title: 'Delete successfully',
                                showConfirmButton: false,
                                timer: 1500
                            })
                        }
                    })
                }
            });
        });
    </script>

@endpush


