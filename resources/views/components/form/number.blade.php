
<div class="container">
    <div class="form-group row">
        <div class=" col-sm-4">
            <label for="{{ $id }}" class="input-group-text col-form-label">{{ $label }}</label>
        </div>
        <div class="col-sm-8">
            <input type="number"
                name="{{ $id }}" id="{{ $id }}"
                step="{{ $step ?? 'any' }}"
                class="form-control {{ $errors->has($id) ? 'is-invalid' : '' }}"
                placeholder="{{ $back_text ?? '' }}" value="{{ $value ?? null }}">
                @if ($errors->has($id))
                    <div class="invalid-feedback">
                        {{ $errors->first($id) }}
                    </div>
                @endif
        </div>
    </div>
</div>
