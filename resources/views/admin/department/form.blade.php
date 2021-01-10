
<div class="row">
    <div class="col-25">
        <label for="name">Name</label>
    </div>
    <div class="col-75">
        <input type="text" id="name" name="name" value="{{ old('name') ?? $department->name}}" placeholder="Department name..">
        <small class="text-danger">{{ $errors->first('name') }}</small>
        <input type="hidden" id="id" name="id" value="{{ $department->id}}" >
    </div>
</div>
<div class="row">
    <div class="col-25">
        <label for="code">Code</label>
    </div>
    <div class="col-75">
        <input type="text" id="code" name="code" value="{{ old('code') ?? $department->code }}" placeholder="Code..">
        <small class="text-danger">{{ $errors->first('code') }}</small>
    </div>
</div>
<div class="row">
    <div class="col-25">
        <label for="status">Status</label>
    </div>
    <div class="col-75">
        <input type="radio" id="status" {{ $department->publication_status == 1 ? 'checked' : '' }} name="publication_status" value="1" checked>Published
        <input type="radio" id="status" {{ $department->publication_status == 0 ? 'checked' : '' }} name="publication_status" value="0">Un-Published
    </div>
</div>

@csrf

