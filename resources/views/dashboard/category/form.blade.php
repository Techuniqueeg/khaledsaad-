<div class="card-body row">
    <div class="form-group  col-6">
        <label>اسم القسم بالعربيه<span
                class="text-danger">*</span></label>
        <input name="name_ar" placeholder="ادخل اسم القسم بالعربيه" value="{{ old('name_ar', $data->name_ar ?? '') }}"
               class="form-control  {{ $errors->has('name_ar') ? 'border-danger' : '' }}" type="text"
               maxlength="255"/>
    </div>
    <div class="form-group  col-6">
        <label>اسم القسم بالانجليزيه<span
                class="text-danger">*</span></label>
        <input name="name_en" placeholder="ادخل اسم القسم بالانجليزيه"
               value="{{ old('name_en', $data->name_en ?? '') }}"
               class="form-control  {{ $errors->has('name_en') ? 'border-danger' : '' }}" type="text"
               maxlength="255"/>
    </div>


    @if($type =='child')

        <div class="form-group col-md-6">
            <label>صورة القسم الفرعي<span
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
        <div class="form-group col-6">
            <label>القسم الرائيسي</label>
            <select name="parent_id"
                    class="form-control form-control-solid form-control-lg">
                @foreach($category as $row)
                    <option
                        @if(Request::segment(1)== 'categories' && Request::segment(2)== 'edit')
                        {{ $row->id == old('parent_id',  $data->parent_id)  ? 'selected' : '' }}
                        @else
                        {{ $row->id == old('parent_id') ? 'selected' : '' }}
                        @endif
                        value="{{ $row->id }}">{{ $row->name_ar }}</option>
                @endforeach
            </select>
        </div>
    @endif

</div>
<div class="card-footer text-left">
    <button type="Submit" id="submit" class="btn btn-warning btn-default ">حفظ</button>
    <a href="{{ URL::previous() }}" class="btn btn-secondary">الغاء</a>
</div>

