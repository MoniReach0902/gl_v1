<!-- Basic dropdown -->
{{-- <button class="btn btn-sm dropdown-toggle" type="button" data-toggle="dropdown"
aria-haspopup="true" aria-expanded="false"><i class="fa fa-bars"></i>
</button> --}}

<button type="button" class="btn btn-sm btn-outline-primary dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true"
    aria-expanded="false">
    <i class="fa fa-bars"></i>
</button>
<ul class="dropdown-menu" style="">
    @if (isset($edit) && $edit)
        <li>
            <a class="dropdown-item"
                href="{{ url_builder($obj_info['routing'], [$obj_info['name'], 'edit', $rowid], []) }}"><i
                    class="fa fa-edit me-2" style="color: var(--bs-cyan)"></i> @lang('btn.btn_edit')</a>
        </li>
    @endif


    @if (isset($istrash) && $istrash)

        @if (isset($restore) && $restore)
            <li>
                <a class="dropdown-item"
                    href="{{ url_builder($obj_info['routing'], [$obj_info['name'], 'restore', $rowid], []) }}">

                    <i class="fas fa-trash-restore me-2" style="color: var(--bs-success)"></i>
                    @lang('btn.btn_restore')

                </a>
            </li>
        @endif

        @if (isset($delete) && $delete)
            <li>
                <a class="dropdown-item"
                    href="{{ url_builder($obj_info['routing'], [$obj_info['name'], 'delete', $rowid], []) }}">

                    <i class="fas fa-times-circle me-2" style="color: var(--bs-danger)"></i>
                    @lang('btn.btn_deleted')

                </a>
            </li>
        @endif
    @else
        {{-- For Actice Side --}}
        @if (isset($trash) && $trash)
            <li>
                <a class="dropdown-item delete"
                        href="{{ url_builder($obj_info['routing'], [$obj_info['name'], 'totrash', $rowid], []) }}"><i
                        class="fe fe-trash me-2" style="color: var(--bs-yellow)"></i>@lang('btn.btn_trash')</a>
                <!--<a class="dropdown-item"
                   // {{--href="{{ url_builder($obj_info['routing'], [$obj_info['name'], 'totrash', $rowid], []) }}">--}}

                    <i class="fa fa-trash me-2" style="color: var(--bs-yellow)"></i>
                    {{--@lang('dev.trash')--}}

                </a>-->
            </li>
        @endif
        {{--  --}}
        @if (isset($remove) && $remove)
            <li>
                <a class="dropdown-item"
                    href="{{ url_builder($obj_info['routing'], [$obj_info['name'], 'delete', $rowid], []) }}"><i
                        class="fa fa-trash me-2 text-danger"></i>Remove</a>
            </li>
        @endif
        {{--  --}}

    @endif

</ul>
