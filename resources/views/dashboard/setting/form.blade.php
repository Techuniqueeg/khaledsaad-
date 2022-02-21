<div class="row">
    <div class="col-lg-6  col-md-6">
        <div class="form-group ">
            <label for="site_name">أسم الموقع </label>
            <input type="text" name="site_name" id="site_name"
                   value="{{ old('site_name', $data->where('key', 'site_name')->first()->val) }}"
                   class="form-control {{ $errors->has('site_name') ? 'border-danger' : '' }}"
                   placeholder="أدخل أسم الموقع"/>
        </div>
    </div>
    <div class="col-lg-6  col-md-6">
        <div class="form-group ">
            <label for="location">العنوان </label>
            <input type="text" name="site_name" id="location"
                   value="{{ old('location', $data->where('key', 'location')->first()->val) }}"
                   class="form-control {{ $errors->has('location') ? 'border-danger' : '' }}"
                   placeholder="أدخل العنوان"/>
        </div>
    </div>
    <div class="col-lg-6  col-md-6">
        <div class="form-group ">
            <label for="location_url">رابط العنوان </label>
            <input type="url" name="location_url" id="location_url"
                   value="{{ old('location_url', $data->where('key', 'location_url')->first()->val) }}"
                   class="form-control {{ $errors->has('location_url') ? 'border-danger' : '' }}"
                   placeholder="أدخل رابط العنوان"/>
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
            <label for="copyright">حقوق الملكيه </label>
            <input type="text" name="copyright" id="location"
                   value="{{ old('copyright', $data->where('key', 'copyright')->first()->val) }}"
                   class="form-control {{ $errors->has('copyright') ? 'border-danger' : '' }}"
                   placeholder="أدخل حقوق الملكيه<"/>
        </div>
    </div>
    <div class="col-lg-6  col-md-6">
        <div class="form-group ">
            <label for="description">وصف قصير </label>
            <input type="text" name="description" id="description"
                   value="{{ old('description', $data->where('key', 'description')->first()->val) }}"
                   class="form-control {{ $errors->has('description') ? 'border-danger' : '' }}"
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
            <label for="whatsapp">رقم واتس اب </label>
            <input type="number" name="whatsapp" id="whatsapp"
                   value="{{ old('whatsapp', $data->where('key', 'whatsapp')->first()->val) }}"
                   class="form-control {{ $errors->has('whatsapp') ? 'border-danger' : '' }}"
                   placeholder="أدخل رقم الجوال"/>
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
