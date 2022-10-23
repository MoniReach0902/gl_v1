@if (isset($save) && $save)
    <a class="btnsave_{{ $obj_info['name'] }} formactionbutton btn-save text-muted mx-2 button-icon"
        data-savetype="save">
        <i class="fe fe-save me-2"></i>@lang('btn.btn_save')</a>
@endif

@if (isset($saveimport) && $saveimport)
    <button type="button"
        class="btnsaveimport_{{ $obj_info['name'] }} formactionbutton btn btn-outline-success mx-2 button-icon"
        data-savetype="save">
        <i class="fe fe-save me-2"></i>@lang('dev.save')
    </button>
@endif

@if (isset($apply) && $apply)
    <button type="button"
        class="btnsave_{{ $obj_info['name'] }} formactionbutton btn btn-outline-success btn-flat ct-btn-action"
        data-savetype="apply">
        <i class="fas fa-edit"></i><br>@lang('dev.apply')
    </button>
@endif

@if (isset($print) && $print)
    <button type="button"
        class="btnprint_{{ $obj_info['name'] }} formactionbutton btn btn-outline-info btn-flat ct-btn-action"
        data-savetype="save">
        <i class="fas fa-print"></i><br>@lang('dev.print')
    </button>
@endif

@if (isset($cancel) && $cancel)
    <a class="btncancel_{{ $obj_info['name'] }} formactionbutton btn-save button-icon text-muted">
        <i class="fe fe-arrow-left me-2"></i>@lang('btn.btn_back')
    </a>
@endif
