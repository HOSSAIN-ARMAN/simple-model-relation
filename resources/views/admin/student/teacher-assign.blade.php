@extends('admin.dashboard')

@push('css')
    <style>
        .container {
            padding: 2rem 0rem;
        }

        h4 {
            margin: 2rem 0rem 1rem;
        }

        .table-image {
            td, th {
                vertical-align: middle;
            }
        }
        .module{
            color: #1c7430;
        }
    </style>

@endpush

@section('content')

@section('module')
    <b class="module">Assign Teacher</b>
@endsection

<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="card bg-light mb-3">
                <div class="card-header"><a href="{{ route('student.show') }}"><i class="fas fa-arrow-left"></i></a>Assign Teacher for Student</div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th scope="col">Select</th>
                            <th scope="col">Teacher Name</th>
                            <th scope="col">Course Name</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($teachers as $teacher)
                            <tr>
                                <td>
                                    <input id="status" data-id="{{ $teacher->id }}"  type="checkbox" name="status" {{ $teacher->status == 1 ? 'checked' : '' }} onclick="teacherAssignConfirm(event.target)">
                                    {{--                       <input type="text" id="id" name="id" value="{{ $teacher->id }}">--}}
                                </td>
                                <td>{{ $teacher->teacher->name }}</td>
                                <td>{{ $teacher->teacher->course_name }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('js')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script>


    function teacherAssignConfirm(event){

        var id = $(event).data('id');

        var url  = "{{ route('confirm.teacher') }}";
        $.ajax({
            url: url,
            type: "POST",
            data: {
                 id: id,
                _token:'{{ csrf_token() }}',
            },
            dataType :'JSON',
            success: function(response) {
               if (response){
                   if (response.data.status == 0){
                       Swal.fire({
                           position: 'top-end',
                           icon: 'success',
                           title: 'Teacher Assigned  Successfully',
                           showConfirmButton: false,
                           timer: 1500
                       })
                   }else {
                       Swal.fire({
                           position: 'top-end',
                           icon: 'success',
                           title: '<p class="text-danger">Teacher Unassign Successfully</p>',
                           showConfirmButton: false,
                           timer: 1500
                       })
                   }
               }
            },
            error: function(response) {

            }
        });
    }
</script>


@endpush



