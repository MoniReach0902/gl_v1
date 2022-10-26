<div style="display: flex; padding:15px 5px 5px 5px">
	{{-- per page --}}
    <div style="display: flex; flex-grow: 1; align-items: baseline">
        {{-- num --}}
        <div style="width:190px">
            <div class="input-group input-group-sm">
                <div class="input-group-prepend">
                    <span class="input-group-text">{{ __('dev.display') }} #</span>
                </div>
                <input type="number" class="form-control" max="150" id="txtperpage_{{ $obj_info['name'] }}" value="{{$recordinfo['perpage']}}">
                <div class="input-group-append">
                    <button type="button" class="btn btn-secondary" onclick='helper.submitPerpage("{{$sort}}","{{$order}}",{{json_encode($querystr )}},"{{ $obj_info["name"] }}")'>{{ __('dev.go') }}!</button>
				</div>
            </div>
        </div>
        {{-- info --}}
		<div style="padding: 0px 5px">
			{{$recordinfo['from']}} - {{$recordinfo['to']}} {{ __('dev.of') }} {{$recordinfo['total']}}  {{ __('dev.record') }}
		</div>
    </div>


	{{-- pagination --}}
    <div style="display:flex; flex-grow:1; justify-content: flex-end">
        {!! $paginationlinks !!}
    </div>
</div>
