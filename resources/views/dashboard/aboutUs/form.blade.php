<div class="card-body row">
    <div class="form-group  col-6">
        <label>العنوان بالعربيه<span
                class="text-danger">*</span></label>
        <input name="name_ar" placeholder="ادخل عنوان الصوره" value="{{ old('name_ar', $data->name_ar ?? '') }}"
               class="form-control  {{ $errors->has('name_ar') ? 'border-danger' : '' }}" type="text"
               maxlength="255"/>
    </div>
    <div class="form-group  col-6">
        <label>العنوان بالامجليزيه<span
                class="text-danger">*</span></label>
        <input name="name_en" placeholder="ادخل عنوان الصوره" value="{{ old('name_en', $data->name_en ?? '') }}"
               class="form-control  {{ $errors->has('name_en') ? 'border-danger' : '' }}" type="text"
               maxlength="255"/>
    </div>
    <div class="form-group col-6">
        <label>وصف ماذا عنا بالعربيه<span
                class="text-danger">*</span></label>
        <div class="">
                <textarea class="form-control {{ $errors->has('description_ar') ? 'border-danger' : '' }} "
                          placeholder="ادخل وصف ماذا عنا"      name="description_ar" rows="10" >{{ old('description_ar', $data->description_ar ?? '') }}</textarea>
        </div>
    </div>
    <div class="form-group col-6">
        <label>وصف ماذا عنا بالانجليزيه<span
                class="text-danger">*</span></label>
        <div class="">
                <textarea class="form-control {{ $errors->has('description_en') ? 'border-danger' : '' }} "
                          placeholder="ادخل وصف ماذا عنا"      name="description_en" rows="10" >{{ old('description_en', $data->description_en ?? '') }}</textarea>
        </div>
    </div>
    <div class="form-group col-md-6">
        <label>صورة العرض<span
                class="text-danger">*</span></label>
        <div class="col-lg-8">

            <div class="image-input image-input-outline" id="kt_image_1">
                <div class="image-input-wrapper {{ $errors->has('image') ? 'border-danger' : '' }}"
                     style="background-image: url({{old('image', $data->image ?? 'default-image.png' )}})"></div>
                <label class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-warning btn-shadow"
                       data-action="change" data-toggle="tooltip" title=""
                       data-original-title="اختر صوره">
                    <i class="fa fa-pen icon-sm text-muted"></i>
                    <input type="file" value="{{old('image', $data->image ?? '')}}" name="image"
                           accept=".png, .jpg, .jpeg"/>
                </label>
                <span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-warning btn-shadow"
                      data-action="cancel" data-toggle="tooltip" title="Cancel avatar">

                      <i class="ki ki-bold-close icon-xs text-muted"></i>
                     </span>
            </div>
        </div>
    </div>

</div>
<div class="card-footer text-left">
    <button type="Submit" id="submit" class="btn btn-warning btn-default ">حفظ</button>
    <a href="{{ URL::previous() }}" class="btn btn-secondary">الغاء</a>
</div>

