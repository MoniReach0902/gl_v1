<div class="modal fade" id="modal_windows" data-backdrop="static" tabindex="-1" role="dialog"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen">
        <div class="modal-content">
            <div class="modal-header" style="padding: 5px 10px;">
                <h5 class="modal-title">
                    {{-- {{ config('app.name') }} --}}
                    {{--  --}}
                    <small>
                        <div class="global_loading spinner-border text-info spinner-border-sm" role="status"
                            style="display: none;">
                            <span class="sr-only">Loading...</span>
                        </div>
                    </small>

                    {{--  --}}
                </h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" style="padding:0 !important">
                <div class="row">
                    <div class="col-xl-12 col-sm-12 col-12 col-md-12 col-lg-12">
                        <span id="air_windows">

                            <div class="row">
                                <div class="col-lg-12 col-md-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <div>
                                                <h6 class="card-title mb-1">File Upload</h6>
                                                <p class="text-muted card-sub-title">Dropify is a jQuery plugin to
                                                    create a beautiful file uploader that converts a standard
                                                    <code>input type="file"</code> into a nice drag & drop zone with
                                                    previews and custom styles.</p>
                                            </div>
                                            <div class="row mb-4">
                                                <div class="col-sm-12 col-md-4">
                                                    <input type="file" class="dropify" data-height="200" />
                                                </div>
                                                <div class="col-sm-12 col-md-4 mg-t-10 mg-md-t-0">
                                                    <input type="file" class="dropify"
                                                        data-default-file="../assets/img/photos/1.jpg"
                                                        data-height="200" />
                                                </div>
                                                <div class="col-sm-12 col-md-4 mg-t-10 mg-md-t-0">
                                                    <input type="file" class="dropify" disabled="disabled" />
                                                </div>
                                            </div>
                                            <div>
                                                <input id="demo" type="file" name="files"
                                                    accept=" image/jpeg, image/png, text/html, application/zip, text/css, text/js"
                                                    multiple />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </span>
                    </div>

                </div>
            </div>
            <div class="modal-footer justify-content-end" style="padding: 5px 10px;">
                {{-- <button type="button" class="btn btn-default" data-bs-dismiss="modal">Close</button> --}}
                <a href="javascript:void(0);" class="btn-link" data-bs-dismiss="modal">Close</a>
            </div>
        </div>

    </div>

</div>

{{--  --}}

<div class="modal fade" id="modal_media" data-backdrop="static" tabindex="-1" role="dialog"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen">
        <div class="modal-content">
            <div class="modal-header" style="padding: 5px 10px;">
                <h5 class="modal-title">
                    {{ config('app.name') }}
                    {{--  --}}
                    <small>
                        <div class="global_loading spinner-border text-info spinner-border-sm" role="status"
                            style="display: none;">
                            <span class="sr-only">Loading...</span>
                        </div>
                    </small>

                    {{--  --}}
                </h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" style="padding:0 !important">
                <div class="row">
                    <div class="col-xl-12 col-sm-12 col-lg-12 col-md-12">
                        <span id="air_media">


                        </span>
                    </div>

                </div>
            </div>
            <div class="modal-footer justify-content-end" style="padding: 5px 10px;">
                {{-- <button type="button" class="btn btn-default" data-bs-dismiss="modal">Close</button> --}}
                <a href="javascript:void(0);" class="btn-link" data-bs-dismiss="modal">Close</a>
            </div>
        </div>

    </div>

</div>
