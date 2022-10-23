@if (isset($new) && $new)
    <button id="btnnew_{{ $obj_info['name'] }}" type="button"
        class="formactionbutton btn btn-outline-primary button-icon"><i class="fe fe-plus me-2"></i>@lang('dev.new')</button>
@endif

@if (isset($istrash) && $istrash)
    @if (isset($active) && $active)
        <button id="btnactive_{{ $obj_info['name'] }}" type="button"
            class="formactionbutton btn btn-outline-info button-icon">

            <i class="fe fe-check"></i>@lang('dev.active')
        </button>
    @endif
@else
    @if (isset($trash) && $trash)
        <button id="btntrash_{{ $obj_info['name'] }}" type="button"
            class="formactionbutton btn btn-outline-warning button-icon"><i
                class="fe fe-trash me-2"></i>@lang('btn.btn_trash')</button>
    @endif

    @if (isset($import) && $import)
        <button id="btnimport_{{ $obj_info['name'] }}" type="button"
            class="formactionbutton btn btn-outline-success btn-flat ct-btn-action">
            <i class="fas fa-file-import me-2"></i>@lang('dev.import')
        </button>
    @endif

@endif
