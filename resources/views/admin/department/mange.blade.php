@extends('admin.dashboard')

@push('css')
    <style>
        .module{
            color: #1c7430;
        }
        .card{
            width: 100%;
        }

        h1{
            font-size: 30px;
            /*color: #fff;*/
            color: black;
            text-transform: uppercase;
            font-weight: 300;
            text-align: center;
            margin-bottom: 15px;
        }
        table{
            width:100%;
            table-layout: fixed;
        }
        .tbl-header{
            background-color: rgba(255,255,255,0.3);
        }
        .tbl-content{
            height:300px;
            overflow-x:auto;
            margin-top: 0px;
            border: 1px solid rgba(255,255,255,0.3);
        }
        th{
            padding: 20px 15px;
            text-align: left;
            font-weight: 500;
            font-size: 12px;
            /*color: #fff;*/
            color: black;
            text-transform: uppercase;
        }
        td{
            padding: 15px;
            text-align: left;
            vertical-align:middle;
            font-weight: 300;
            font-size: 12px;
            /*color: #fff;*/
            color: black;
            border-bottom: solid 1px rgba(255,255,255,0.1);
        }


        /* demo styles */

        @import url(https://fonts.googleapis.com/css?family=Roboto:400,500,300,700);
        body{
            /*background: -webkit-linear-gradient(left, #25c481, #25b7c4);*/
            /*background: linear-gradient(to right, #25c481, #25b7c4);*/
            background: -webkit-linear-gradient(left, #25c481, #25b7c4);
            background: linear-gradient(to right, #f7f6f2, #f7f6f2);
            font-family: 'Roboto', sans-serif;
        }
        section{
            margin: 50px;
        }


        /* follow me template */
        .made-with-love {
            margin-top: 40px;
            padding: 10px;
            clear: left;
            text-align: center;
            font-size: 10px;
            font-family: arial;
            /*color: #fff;*/
            color: black;
        }
        .made-with-love i {
            font-style: normal;
            color: #F50057;
            font-size: 14px;
            position: relative;
            top: 2px;
        }
        .made-with-love a {
            /*color: #fff;*/
            color: black;
            text-decoration: none;
        }
        .made-with-love a:hover {
            text-decoration: underline;
        }


        /* for custom scrollbar for webkit browser*/

        ::-webkit-scrollbar {
            width: 6px;
        }
        ::-webkit-scrollbar-track {
            -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);
        }
        ::-webkit-scrollbar-thumb {
            -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);
        }
        #table-info{
            margin-left: 200px;
        }
    </style>

@endpush

@section('content')

<section>
    <!--for demo wrap-->
    <nav class="navbar navbar-expand-lg navbar-dark teal lighten-2 mb-4">
        <a href="{{ route('department.index') }}" class="btn btn-outline-secondary btn-lg text-black-50"><i class="fas fa-plus-square"></i>&nbsp; Create</a>
        <!-- Collapsible content -->
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <h4 class="text-black-50" id="table-info">DEPARTMENT INFO</h4>
            <!-- Search form -->
            <form class="form-inline ml-auto">
                <div class="md-form my-0">
                    <input  id="myInput" class="form-control mr-sm-2 bg-transparent" type="text" placeholder="Search" aria-label="Search">
                </div>
            </form>
        </div>
        <!-- Collapsible content -->

    </nav>
    <div class="tbl-header">
        <table cellpadding="0" cellspacing="0" border="0">
            <thead style="background: #91908c">
            <tr>
                <th>SL</th>
                <th>Name</th>
                <th>Code</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
            </thead>
        </table>
    </div>
    <div class="tbl-content">
        <table cellpadding="0" cellspacing="0" border="0">
            <tbody id="table">
            @foreach($departments as $key=>$department)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $department->name }}</td>
                    <td>{{ $department->code }}</td>
                    <td>{{ $department->publication_status == 1 ? 'Published' : 'Un-Published' }}</td>
                    <td>
                        <a href="{{ route('department.edit', ['id' => $department->id]) }}"><i class="fas fa-edit"></i></a>
                        <a href="#" id="{{ $department->id }}" class="department-destroy"><i class="far fa-trash-alt text-danger"></i></a>
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
</section>


<!-- follow me template -->
<div class="made-with-love">
{{--    Made with--}}
{{--    <i>♥</i> by--}}
{{--    <a target="_blank" href="https://codepen.io/nikhil8krishnan">Nikhil Krishnan</a>--}}
</div>


{{--=========================--}}


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


    <script>

        $(window).on("load resize ", function() {
            var scrollWidth = $('.tbl-content').width() - $('.tbl-content table').width();
            $('.tbl-header').css({'padding-right':scrollWidth});
        }).resize();
    </script>

@endpush

