@extends('admin.dashboard')

@push('css')
    <style>
        .module{
            color: #1c7430;
        }
        .card{
            width: 100%;
        }
    </style>

@endpush

@section('content')

{{--@section('module')--}}
{{--    <b class="module">Manage Department</b>--}}
{{--@endsection--}}



<div class="card border-success mb-3" >
    <nav class="navbar navbar-expand-lg navbar-dark teal lighten-2 mb-4">
        <a href="{{ route('department.index') }}" class="btn btn-outline-success btn-lg"><i class="fas fa-plus-square"></i>&nbsp; Create</a>
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
    <div class="card-body text-success">
        <table class="table table-bordered border-primary">
            <thead class="btn-info">
            <th>SL</th>
            <th>Name</th>
            <th>Code</th>
            <th>status</th>
            <th>Action</th>
            </thead>
            <tbody id="table">
            @foreach($departments as $key=>$department)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $department->name }}</td>
                    <td>{{ $department->code }}</td>
                    <td>{{ $department->publication_status == 1 ? 'Published' : 'Un-Published' }}</td>
                    <td>
                        <a href="{{ route('department.edit', ['id' => $department->id]) }}"><i class="fas fa-edit"></i></a>
                        <a href="#" id="{{ $department->id }}" class="department-destroy"><i class="far fa-trash-alt"></i></a>
                        <form id="deleteDepartment{{ $department->id }}" action="{{ route('department.destroy') }}" method="POST">
                            @method('delete')
                            @csrf
                            <input  type="hidden" value="{{ $department->id }}" name="id">
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <div class="card-footer bg-transparent border-success">
        {{ $departments->links() }}
    </div>
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
            $('.department-destroy').click(function () {
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
                            $('#deleteDepartment'+id).submit();
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

