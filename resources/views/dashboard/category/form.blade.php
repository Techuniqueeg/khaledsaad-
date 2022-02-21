<div class="card-body row">
    <div class="form-group  col-12">
        <label>اسم القسم<span
                class="text-danger">*</span></label>
        <input name="name" placeholder="ادخل اسم القسم" value="{{ old('name', $data->name ?? '') }}"
               class="form-control  {{ $errors->has('name') ? 'border-danger' : '' }}" type="text"
               maxlength="255"/>
    </div>
</div>
<div class="card-footer text-left">
    <button type="Submit" id="submit" class="btn btn-warning btn-default ">حفظ</button>
    <a href="{{ URL::previous() }}" class="btn btn-secondary">الغاء</a>
</div>

