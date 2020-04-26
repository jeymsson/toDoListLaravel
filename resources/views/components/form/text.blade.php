
<div class="container">
    <div class="form-group row">
        <div class=" col-sm-2">
            <label for="{{ $id }}" class="input-group-text col-form-label">{{ $label }}</label>
        </div>
        <div class="col-sm-10">
            <input type="text" name="{{ $id }}" id="{{ $id }}" class="form-control" placeholder="{{ $back_text ?? '' }}" value="{{ $value ?? null }}">
        </div>
    </div>
</div>
