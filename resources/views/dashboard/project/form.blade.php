
<div class="card-body row">
    <div class="form-group  col-6">
        <label>اسم المنتج بالعربيه<span
                class="text-danger">*</span></label>
        <input name="name_ar" placeholder="ادخل اسم المنتج بالعربيه" value="{{ old('name_ar', $data->name_ar ?? '') }}"
               class="form-control  {{ $errors->has('name_ar') ? 'border-danger' : '' }}" type="text"
               maxlength="191"/>
    </div>
    <div class="form-group  col-6">
        <label>اسم المنتج بالانجليزيه<span
                class="text-danger">*</span></label>
        <input name="name_en" placeholder="ادخل اسم المنتج بالانجليزيه" value="{{ old('name_en', $data->name_en ?? '') }}"
               class="form-control  {{ $errors->has('name_en') ? 'border-danger' : '' }}" type="text"
               maxlength="191"/>
    </div>
    <div class="form-group col-6">
        <label>المميزات بالعربيه<span
                class="text-danger">*</span></label>
        <div class="">
                <textarea class="form-control {{ $errors->has('feature_ar') ? 'border-danger' : '' }} "
                          placeholder="ادخل المميزات بالعربيه" name="feature_ar"
                          rows="5">{{ old('feature_ar', $data->feature_ar ?? '') }}</textarea>
        </div>
    </div>
    <div class="form-group col-6">
        <label>المميزات بالانجليزيه<span
                class="text-danger">*</span></label>
        <div class="">
                <textarea class="form-control {{ $errors->has('feature_en') ? 'border-danger' : '' }} "
                          placeholder="ادخل المميزات بالانجليزيه" name="feature_en"
                          rows="5">{{ old('feature_en', $data->feature_en ?? '') }}</textarea>
        </div>
    </div>
    <div class="form-group col-6">
        <label>الوصف بالعربيه<span
                class="text-danger">*</span></label>
        <div class="">
                <textarea class="form-control {{ $errors->has('description_ar') ? 'border-danger' : '' }} "
                          placeholder="ادخل الوصف بالعربيه" name="description_ar"
                          rows="5">{{ old('description_ar', $data->description_ar ?? '') }}</textarea>
        </div>
    </div>
    <div class="form-group col-6">
        <label>الوصف بالانجليزيه<span
                class="text-danger">*</span></label>
        <div class="">
                <textarea class="form-control {{ $errors->has('description_en') ? 'border-danger' : '' }} "
                          placeholder="ادخل الوصف بالعربيه" name="description_en"
                          rows="5">{{ old('description_en', $data->description_en ?? '') }}</textarea>
        </div>
    </div>
    <div class="form-group col-3">
        <label>القسم</label>
        <select name="category_id"
                class="form-control form-control-solid form-control-lg">
            @foreach($Category as $row)
                <option
                    @if(Request::segment(1)== 'projects' && Request::segment(2)== 'edit')
                    {{ $row->id == old('category_id',  $data->category_id)  ? 'selected' : '' }}
                    @else
                    {{ $row->id == old('category_id') ? 'selected' : '' }}
                    @endif
                    value="{{ $row->id }}">{{ $row->name_ar }}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group  col-3">
        <label>سعر المنتج<span
                class="text-danger">*</span></label>
        <input name="price" placeholder="ادخل سعر المنتج " value="{{ old('price', $data->price ?? '') }}"
               class="form-control  {{ $errors->has('price') ? 'border-danger' : '' }}" type="text"
               maxlength="191"/>
    </div>
    <div class="form-group col-3">
        <label>الالوان<span class="text-danger">*</span></label>
        <select name="colors[]"  class="form-control form-control-solid form-control-lg select2 {{ $errors->has('colors') ? 'border-danger' : '' }}" multiple="multiple id="  id="kt_select2_1_modal">
            @foreach($attr as $row)

                <option
                    @if(Request::segment(1)== 'projects' && Request::segment(2)== 'edit')
                        @if(in_array($row->id,$data->Colors->value ) ) selected @endif

                    @else
                    {{ $row->id == old('colors') ? 'selected' : '' }}
                    @endif
                    value="{{ $row->id }}" name="colors">{{ $row->value_ar}}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group col-3">
        <label>الاضافات<span class="text-danger">*</span></label>
        <select name="addons[]"  class="form-control form-control-solid form-control-lg select2 {{ $errors->has('addons') ? 'border-danger' : '' }}" multiple="multiple id="  id="kt_select2_2_modal">
            @foreach($addon as $row)
                <option
                    @if(Request::segment(1)== 'projects' && Request::segment(2)== 'edit')
                    @if(in_array($row->id,$addon_ids)) selected @endif

                    @else
                    {{ $row->id == old('addons') ? 'selected' : '' }}
                    @endif
                    value="{{ $row->id }}" name="addons">{{ $row->name_ar}}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group col-md-4">
        <label>صورة المنتج الاساسيه<span
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

    <div class="col-12">
        <br>
        <br>
        <h6 class="text-dark">صورة المنتج الاضافيه<span
                class="text-danger">*</span></h6>
        <div class="card-body col-12">

            <div class="form-group ">

                @if(Request::segment(1)== 'projects' && Request::segment(2)== 'edit')
                    <div class="row">
                        <div class="card-body col-12">
                            <div class="carousel-item active">

                                <div class="col-12">
                                    @foreach($data->Images as $c)
                                        <a style="position: absolute;"
                                           class="btn btn-icon btn-danger btn-circle btn-sm"
                                           onclick="confirm('هل متاكد من الحذف؟')"
                                           href="{{route('projects.image.delete',$c->id)}}">
                                            <i class="icon-nm fas far fa-trash"
                                               aria-hidden='true'></i>
                                        </a>
                                        <img class="p-2 img-thumbnail" style="height: 150px; width: 150px;"
                                             src="{{$c->image}}">
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                @endif

                <div class="dropzone dropzone-default dropzone-warning {{ $errors->has('image') ? 'border-danger' : '' }}"
                     id="kt_dropzone_car">
                    <div class="dropzone-msg dz-message needsclick ">
                        <h3 class="dropzone-msg-title">يمكنك اضافه اكثر من صوره</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="card-footer text-left">
    <button type="Submit" id="submit" class="btn btn-warning btn-default ">حفظ</button>
    <a href="{{ URL::previous() }}" class="btn btn-secondary">الغاء</a>
</div>


