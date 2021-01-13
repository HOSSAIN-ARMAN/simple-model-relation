@push('css')
    <style>

        /*---------*/

        body {
            font-family: 'Lato', sans-serif;
            /*color: white;*/
            color: #080601;
            /*background-color: teal;*/
            background-color: whitesmoke;
        }
        h1 {
            font-size: 30px;
            margin: 0px;
            padding: 0px;
        }
        h3 {
            margin: 0px;
            padding: 0px;
            /*color: #999;*/
            color: #080601;
        }

        div.wrap {
            width: 500px;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-40%, -40%);
            vertical-align: middle;
        }

        div.wrap div {
            position: relative;
            margin: 50px 0;
        }

        label {
            position: absolute;
            top: 0;
            font-size: 15px;
            margin: 10px;
            padding: 0 5px;
            /*background-color: teal;*/
            background-color: whitesmoke;
            -webkit-transition: top .2s ease-in-out,
            font-size .2s ease-in-out;
            transition: top .2s ease-in-out,
            font-size .2s ease-in-out;
        }

        .active {
            top: -25px;
            font-size: 15px;
        }

        input[type=text] {
            width: 100%;
            padding: 15px;
            border: 1px solid black;
            font-size: 15px;
            /*background-color: teal;*/
            background-color: whitesmoke;
            color: black;
        }

        input[type=text]:focus {
            outline: none;
        }

        #status-div{
            margin-top: -60px;
        }
        #wrap-div{
            margin-top: -60px;
        }

    </style>
@endpush

@csrf
    <h4 id="header-text">Add Department</h4>
    <div>
        <label for="name" id="label-department">Department Name</label>
        <input class="cool" type="text" id="name" name="name" value="{{ old('name') ?? $department->name}}">
        <small class="text-danger">{{ $errors->first('name') }}</small>
        <input type="hidden" id="id" name="id" value="{{ isset($department->id) ? $department->id : ''}}" >
    </div>

    <div>
        <label for="code" id="label-code">Code</label>
        <input class="cool" type="text" id="code" name="code" value="{{ old('code') ?? $department->code }}">
        <small class="text-danger">{{ $errors->first('code') }}</small>
    </div>

    <div class="row padding" id="status-div">
        <div class="col-md-4">Status</div>
        <div class="col-md-8">
            <input type="radio" id="status" {{ $department->publication_status == 1 ? 'checked' : '' }} name="publication_status" value="1" checked>Published
            <input type="radio" id="status" {{ $department->publication_status == 0 ? 'checked' : '' }} name="publication_status" value="0">Un-Published
        </div>
    </div>

@push('js')

    <script>
        $(document).ready(function() {
            var id = $("#id").val();
            if (id){
                $('#label-department').hide();
                $("#label-code").hide();
                $("#header-text").html('Update Department')
            }

            $('input').on('focusin', function() {
                $(this).parent().find('label').addClass('active');
            });

            $('input').on('focusout', function() {
                if (!this.value) {
                    $(this).parent().find('label').removeClass('active');
                }
            });
        });


    </script>

@endpush
