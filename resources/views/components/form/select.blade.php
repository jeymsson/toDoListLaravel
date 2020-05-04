
<div class="container">
    <div class="form-group row">
        <div class=" col-sm-4">
            <label for="{{ $id }}" class="input-group-text col-form-label">{{ $label }}</label>
        </div>
        <div class="col-sm-8">
            <select name="{{$id ?? null}}" id="{{$id ?? null}}" class="form-control {{$class??null}}">
                @isset($array) @foreach ($array as $i)
                    <option value="{{$i['cod']}}">{{$i['des']}}</option>
                @endforeach @endisset
            </select>
        </div>
    </div>
</div>
