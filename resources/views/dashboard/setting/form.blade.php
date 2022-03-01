<div class="row">
    <div class="col-lg-6  col-md-6">
        <div class="form-group ">
            <label for="site_name_ar">أسم الموقع بالعربيه</label>
            <input type="text" name="site_name_ar" id="site_name_ar"
                   value="{{ old('site_name_ar', $data->where('key', 'site_name_ar')->first()->val) }}"
                   class="form-control {{ $errors->has('site_name_ar') ? 'border-danger' : '' }}"
                   placeholder="أدخل أسم الموقع"/>
        </div>
    </div>
    <div class="col-lg-6  col-md-6">
        <div class="form-group ">
            <label for="site_name_en">أسم الموقع بالانجليزيه</label>
            <input type="text" name="site_name_en" id="site_name_en"
                   value="{{ old('site_name_en', $data->where('key', 'site_name_en')->first()->val) }}"
                   class="form-control {{ $errors->has('site_name_en') ? 'border-danger' : '' }}"
                   placeholder="أدخل أسم الموقع"/>
        </div>
    </div>
    <div class="col-lg-6  col-md-6">
        <div class="form-group ">
            <label for="location_ar">العنوان بالعربيه</label>
            <input type="text" name="location_ar" id="location_ar"
                   value="{{ old('location_ar', $data->where('key', 'location_ar')->first()->val) }}"
                   class="form-control {{ $errors->has('location_ar') ? 'border-danger' : '' }}"
                   placeholder="أدخل العنوان"/>
        </div>
    </div>
    <div class="col-lg-6  col-md-6">
        <div class="form-group ">
            <label for="location_en">العنوان بالانجليزيه</label>
            <input type="text" name="location_en" id="location_en"
                   value="{{ old('location_en', $data->where('key', 'location_en')->first()->val) }}"
                   class="form-control {{ $errors->has('location_en') ? 'border-danger' : '' }}"
                   placeholder="أدخل العنوان"/>
        </div>
    </div>
    <div class="col-lg-6  col-md-6">
        <div class="form-group ">
            <label for="copyright_ar">حقوق الملكيه بالعربيه</label>
            <input type="text" name="copyright_ar" id="copyright_ar"
                   value="{{ old('copyright_ar', $data->where('key', 'copyright_ar')->first()->val) }}"
                   class="form-control {{ $errors->has('copyright_ar') ? 'border-danger' : '' }}"
                   placeholder="أدخل حقوق الملكيه<"/>
        </div>
    </div>
    <div class="col-lg-6  col-md-6">
        <div class="form-group ">
            <label for="copyright_en">حقوق الملكيه بالانجليزيه</label>
            <input type="text" name="copyright_en" id="copyright_en"
                   value="{{ old('copyright_en', $data->where('key', 'copyright_en')->first()->val) }}"
                   class="form-control {{ $errors->has('copyright_en') ? 'border-danger' : '' }}"
                   placeholder="أدخل حقوق الملكيه<"/>
        </div>
    </div>
    <div class="col-lg-6  col-md-6">
        <div class="form-group ">
            <label for="description_ar">وصف قصير بالعربيه</label>
            <input type="text" name="description_ar" id="description_ar"
                   value="{{ old('description_ar', $data->where('key', 'description_ar')->first()->val) }}"
                   class="form-control {{ $errors->has('description_ar') ? 'border-danger' : '' }}"
                   placeholder="أدخل وصف قصير"/>
        </div>
    </div>
    <div class="col-lg-6  col-md-6">
        <div class="form-group ">
            <label for="description_en">وصف قصير بالانجليزيه</label>
            <input type="text" name="description_en" id="description_en"
                   value="{{ old('description_en', $data->where('key', 'description_en')->first()->val) }}"
                   class="form-control {{ $errors->has('description_en') ? 'border-danger' : '' }}"
                   placeholder="أدخل وصف قصير"/>
        </div>
    </div>
    <div class="col-lg-6  col-md-6">
        <div class="form-group ">
            <label for="phone">رقم الهاتف </label>
            <input type="number" name="phone" id="phone"
                   value="{{ old('phone', $data->where('key', 'phone')->first()->val) }}"
                   class="form-control {{ $errors->has('phone') ? 'border-danger' : '' }}"
                   placeholder="أدخل رقم الجوال"/>
        </div>
    </div>
    <div class="col-lg-6  col-md-6">
        <div class="form-group ">
            <label for="whatsapp">رقم الواتس اب </label>
            <input type="number" name="whatsapp" id="whatsapp"
                   value="{{ old('whatsapp', $data->where('key', 'whatsapp')->first()->val) }}"
                   class="form-control {{ $errors->has('whatsapp') ? 'border-danger' : '' }}"
                   placeholder="أدخل رقم الجوال"/>
        </div>
    </div>
    <div class="col-lg-6  col-md-6">
        <div class="form-group ">
            <label for="facebook">رابط الفيسبوك </label>
            <input type="url" name="facebook" id="facebook"
                   value="{{ old('facebook', $data->where('key', 'facebook')->first()->val) }}"
                   class="form-control {{ $errors->has('facebook') ? 'border-danger' : '' }}"
                   placeholder="أدخل الفيسبوك"/>
        </div>
    </div>
    <div class="col-lg-6  col-md-6">
        <div class="form-group ">
            <label for="instagram">رابط الانستقرام </label>
            <input type="url" name="instagram" id="instagram"
                   value="{{ old('instagram', $data->where('key', 'instagram')->first()->val) }}"
                   class="form-control {{ $errors->has('instagram') ? 'border-danger' : '' }}"
                   placeholder="أدخل الفيسبوك"/>
        </div>
    </div>
    <div class="col-lg-6  col-md-6">
        <div class="form-group ">
            <label for="email">البريد الالكتروني </label>
            <input type="email" name="email" id="email"
                   value="{{ old('email', $data->where('key', 'email')->first()->val) }}"
                   class="form-control {{ $errors->has('email') ? 'border-danger' : '' }}"
                   placeholder="أدخل الفيسبوك"/>
        </div>
    </div>

</div>
<div class="row">
    <div class="col-4">
        <label for="">لوجو الموقع</label>
        <div class="col-lg-8">
            <div class="image-input image-input-outline" id="kt_image_1">
                <div class="image-input-wrapper {{ $errors->has('logo') ? 'border-danger' : '' }}"
                     style="background-image: url({{$data->where('key', 'logo')->first()->val ?? ''}})"></div>
                <label class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow"
                       data-action="change" data-toggle="tooltip" title=""
                       data-original-title="اختر صوره">
                    <i class="fa fa-pen icon-sm text-muted"></i>
                    <input type="file" value="{{ old('youtube', $data->where('key', 'logo')->first()->val) }}"
                           name="logo" accept=".png, .jpg, .jpeg"/>
                </label>
                <span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow"
                      data-action="cancel" data-toggle="tooltip" title="Cancel avatar">

  <i class="ki ki-bold-close icon-xs text-muted"></i>
 </span>
            </div>
        </div>

    </div>
</div>
<br>
<br>

<div class="card-footer text-left">
    <button type="Submit" id="submit" class="btn btn-warning btn-default ">حفظ</button>
    <a href="{{ URL::previous() }}" class="btn btn-secondary">الغاء</a>
</div>
