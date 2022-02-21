<div class="card-body row">
    <div class="form-group  col-12">
        <label>عنوان المشروع<span
                class="text-danger">*</span></label>
        <input name="name" placeholder="ادخل عنوان المشروع" value="{{ old('name', $data->name ?? '') }}"
               class="form-control  {{ $errors->has('name') ? 'border-danger' : '' }}" type="text"
               maxlength="255"/>
    </div>
    <div class="form-group  col-6">
        <label class="" >اسعار المشروع<span
                class="text-danger">*</span></label>
        <div class="row">
            <input name="price_from" placeholder="ادخل اقل سعر" value="{{ old('price_from', $data->price_from ?? '') }}"
                   class="form-control col-6  {{ $errors->has('price_from') ? 'border-danger' : '' }}" type="number"
                   maxlength="255"/>
            <input name="price_to" placeholder="ادخل اعلي سعر" value="{{ old('price_to', $data->price_to ?? '') }}"
                   class="form-control  col-6  {{ $errors->has('price_to') ? 'border-danger' : '' }}" type="number"
                   maxlength="255"/>
        </div>
    </div>
    <div class="form-group  col-6">
        <label class="" >مساحات المشروع<span
                class="text-danger">*</span></label>
        <div class="row">
            <input name="area_from" placeholder="ادخل اقل مساحه" value="{{ old('area_from', $data->area_from ?? '') }}"
                   class="form-control col-6  {{ $errors->has('area_from') ? 'border-danger' : '' }}" type="number"
                   maxlength="255"/>
            <input name="area_to" placeholder="ادخل اعلي مساحه" value="{{ old('area_to', $data->area_to ?? '') }}"
                   class="form-control  col-6  {{ $errors->has('area_to') ? 'border-danger' : '' }}" type="number"
                   maxlength="255"/>
        </div>
    </div>
    <div class="form-group col-4">
        <label>النوع</label>
        <select name="type_id"
                class="form-control form-control-solid form-control-lg">
            @foreach($Type as $row)
                <option
                    @if(Request::segment(1)== 'projects' && Request::segment(2)== 'edit')
                    {{ $row->id == old('type_id',  $data->type_id)  ? 'selected' : '' }}
                    @else
                    {{ $row->id == old('type_id') ? 'selected' : '' }}
                    @endif
                    value="{{ $row->id }}">{{ $row->name }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group col-4">
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
                    value="{{ $row->id }}">{{ $row->name }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group col-4">
        <label>المنطقه</label>
        <select name="location_id"
                class="form-control form-control-solid form-control-lg">
            @foreach($Location as $row)
                <option
                    @if(Request::segment(1)== 'projects' && Request::segment(2)== 'edit')
                    {{ $row->id == old('location_id',  $data->location_id)  ? 'selected' : '' }}
                    @else
                    {{ $row->id == old('location_id') ? 'selected' : '' }}
                    @endif
                    value="{{ $row->id }}">{{ $row->name }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group col-12">
        <label>وصف المميزات<span
                class="text-danger">*</span></label>
        <div class="">
                <textarea class="form-control {{ $errors->has('feature') ? 'border-danger' : '' }} "
                          placeholder="ادخل المميزات" name="feature"
                          rows="5">{{ old('feature', $data->feature ?? '') }}</textarea>
        </div>
    </div>
    <div class="form-group col-12">
        <label>وصف الملحوظات<span
                class="text-danger">*</span></label>
        <div class="">
                <textarea class="form-control {{ $errors->has('description') ? 'border-danger' : '' }} "
                          placeholder="ادخل الملحوظات" name="description"
                          rows="5">{{ old('description', $data->description ?? '') }}</textarea>
        </div>
    </div>
    <div class="form-group col-md-6">
        <label>صورة المشروع الاساسيه<span
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
        <h6 class="text-dark">صورة المشروع الاضافيه<span
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

