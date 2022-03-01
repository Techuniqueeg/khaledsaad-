<div class="card-body row">
    <div class="form-group  col-4">
        <label>اسم الاضافه بالعربيه<span
                class="text-danger">*</span></label>
        <input name="name_ar" placeholder="اسم الاضافه بالعربيه" value="{{ old('name_ar', $data->name_ar ?? '') }}"
               class="form-control  {{ $errors->has('name_ar') ? 'border-danger' : '' }}" type="text"
               maxlength="255"/>
    </div>
    <div class="form-group  col-4">
        <label>اسم الاضافه بالانجليزيه<span
                class="text-danger">*</span></label>
        <input name="name_en" placeholder="اسم الاضافه الصوره" value="{{ old('name_en', $data->name_en ?? '') }}"
               class="form-control  {{ $errors->has('name_en') ? 'border-danger' : '' }}" type="text"
               maxlength="255"/>
    </div>
    <div class="form-group  col-4">
        <label>السعر<span
                class="text-danger">*</span></label>
        <input name="price" placeholder="ادخل السعر" value="{{ old('price', $data->price ?? '') }}"
               class="form-control  {{ $errors->has('price') ? 'border-danger' : '' }}" type="number"
               maxlength="255"/>
    </div>

</div>
<div class="card-footer text-left">
    <button type="Submit" id="submit" class="btn btn-warning btn-default ">حفظ</button>
    <a href="{{ URL::previous() }}" class="btn btn-secondary">الغاء</a>
</div>

