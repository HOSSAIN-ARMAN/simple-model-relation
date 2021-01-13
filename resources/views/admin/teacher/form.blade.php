@push('css')
<style>

</style>

@endpush

<div class="row">
    <div class="col-25">
        <label for="department">Department</label>
    </div>
    <div class="col-75">
        <select id="department_id" name="department_id" class="selectpicker"  data-live-search="true">

            @foreach($departments as $department)
                <option value="{{ isset($department->id) ? $department->id : '' }}">{{ isset($department->name) ? $department->name : ''}}</option>
            @endforeach
        </select>
    </div>
</div>
<div class="row">
    <div class="col-25">
        <label for="name">Teacher Name</label>
    </div>
    <div class="col-75">
        <input type="text" id="name" name="name" value="{{ old('name') ?? $teacher->name }}" placeholder="name..">
        <input type="hidden" id="id" name="id" value="{{ old('id') ?? $teacher->id }}">
        <small class="text-danger">{{ $errors->first('name') }}</small>
    </div>
</div>
<div class="row">
    <div class="col-25">
        <label for="course_name	">Course Name</label>
    </div>
    <div class="col-75">
        <input type="text" id="course_name" name="course_name" value="{{ old('course_name') ?? $teacher->course_name}}" placeholder="Course name..">
        <small class="text-danger">{{ $errors->first('course_name') }}</small>
    </div>
</div>

<div class="row">
    <div class="col-25">
        <label for="status">Status</label>
    </div>
    <div class="col-75">
        <input type="radio" id="status" {{ $teacher->publication_status == 1 ? 'checked' : ''  }}  name="publication_status" value="1" checked>Published
        <input type="radio" id="status" {{ $teacher->publication_status == 0 ? 'checked' : ''  }} name="publication_status" value="0">Un-Published
    </div>
</div>


@csrf



@push('js')

    <script>
        $(document).ready(function() {
            var id = $("#id").val();
            if (id){
                // $('#label-department').hide();
                // $("#label-code").hide();
                // $("#header-text").html('Update Department')
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
