<div class="card-body row">
    <div class="form-group  col-3">
        <label>الاسم<span
                class="text-danger">*</span></label>
        <input name="name" placeholder="ادخل الاسم"  value="{{ old('name', $data->name ?? '') }}" class="form-control  {{ $errors->has('name') ? 'border-danger' : '' }}" type="text"
               maxlength="255" />
    </div>
    <div class="form-group  col-3">
        <label>البريد الالكتروني<span
                class="text-danger">*</span></label>
        <input name="email" placeholder="ادخل البريد الالكتروني"  value="{{ old('email', $data->email ?? '') }}" class="form-control  {{ $errors->has('email') ? 'border-danger' : '' }}" type="email"
               maxlength="255" />
    </div>
    <div class="form-group  col-3">
        <label>رقم الهاتف<span
                class="text-danger">*</span></label>
        <input name="phone" placeholder="ادخل رقم الهاتف"  value="{{ old('phone', $data->phone ?? '') }}" class="form-control  {{ $errors->has('phone') ? 'border-danger' : '' }}" type="number"
               maxlength="255" />
    </div>
    <div class="form-group  col-3">
        <label>العنوان<span
                class="text-danger">*</span></label>
        <input name="address" placeholder="ادخل العنوان"  value="{{ old('address', $data->address ?? '') }}" class="form-control  {{ $errors->has('address') ? 'border-danger' : '' }}" type="text"
               maxlength="255" />
    </div>
    <div class="form-group  col-6">
        <label>الرقم السري
                @if(request()->segment(2) == 'create') <span class="text-danger">*</span>@endif
        </label>
        <input name="password" placeholder="ادخل الرقم السري"  value="{{ old('password') }}" class="form-control  {{ $errors->has('password') ? 'border-danger' : '' }}" type="password"
               maxlength="255" />
    </div>
    <div class="form-group  col-6">
        <label>الرقم تاكيد السري
            @if(request()->segment(2) == 'create') <span class="text-danger">*</span> @endif
        </label>
        <input name="password_confirmation" placeholder="ادخل تاكيد الرقم السري"  value="{{ old('password_confirmation') }}" class="form-control  {{ $errors->has('password_confirmation') ? 'border-danger' : '' }}" type="password"
               maxlength="255" />
    </div>


</div>
<div class="card-footer text-left">
    <button type="Submit" id="submit" class="btn btn-warning btn-default ">حفظ</button>
    <a href="{{ URL::previous() }}" class="btn btn-secondary">الغاء</a>
</div>

