<div class="card-body row">
    <div class="form-group  col-12">
        <label>عنوان الصوره<span
                class="text-danger">*</span></label>
        <input name="title" placeholder="ادخل عنوان الصوره" value="{{ old('title', $data->title ?? '') }}"
               class="form-control  {{ $errors->has('title') ? 'border-danger' : '' }}" type="text"
               maxlength="255"/>
    </div>
    <div class="form-group col-12">
        <label>وصف الخدمه<span
                class="text-danger">*</span></label>
        <div class="">
                <textarea placeholder="ادخل وصف الخدمه" class="form-control {{ $errors->has('description') ? 'border-danger' : '' }} "
                          name="description" rows="10" >{{ old('description', $data->description ?? '') }}</textarea>
        </div>
    </div>
</div>
<div class="card-footer text-left">
    <button type="Submit" id="submit" class="btn btn-warning btn-default ">حفظ</button>
    <a href="{{ URL::previous() }}" class="btn btn-secondary">الغاء</a>
</div>

