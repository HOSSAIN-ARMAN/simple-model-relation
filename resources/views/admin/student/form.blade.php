



<div class="row">
    <div class="col-25">
        <label for="name">Student Name</label>
    </div>
    <div class="col-75">
        <input type="text" id="name" name="name" value="{{ old('name') ?? $student->name }}" placeholder="name..">
        <input type="hidden" id="id" name="id" value="{{ old('id') ?? $student->id }}">
        <small class="text-danger">{{ $errors->first('name') }}</small>
    </div>
</div>
<div class="row">
    <div class="col-25">
        <label for="course_name	">Email</label>
    </div>
    <div class="col-75">
        <input type="text" id="course_name" name="email" value="{{ old('email') ?? $student->email }}" placeholder="Student email..">
        <small class="text-danger">{{ $errors->first('email') }}</small>

    </div>
</div>

<div class="row">
    <div class="col-25">
        <label for="status">Status</label>
    </div>
    <div class="col-75">
        <input type="radio" id="status" {{ $student->status == 1 ? 'checked' : '' }}   name="status" value="1" checked>Published
        <input type="radio" id="status" {{ $student->status == 0 ? 'checked' : '' }}   name="status" value="0">Un-Published
    </div>
</div>

@csrf

