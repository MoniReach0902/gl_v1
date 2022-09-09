let helper = {
    delayRefresh: function () {
        setTimeout(function () {
            location.reload();
        }, 2000);
    },
    setLoading: function (isLoading) {
        if (isLoading) {
            $(".global_loading").show();
            $(".formactionbutton").attr("disabled", true);
        } else {
            $(".global_loading").delay(300).fadeOut("fast");

            setTimeout(function () {
                $(".formactionbutton").delay(5000).attr("disabled", false);
            }, 1000);
        }
    },
    callbackHandler: function (jsondata, callback) {
        var fn = window[callback];
        if (typeof fn === "function") {
            fn(jsondata);
        } else {
            var fn = this[callback];
            if (typeof fn === "function") fn(jsondata);
        }
    },

    isObject: function (val) {
        let myreturn = false;

        if (val === null) {
            return false;
        } else if (typeof val === "function" || typeof val === "object") {
            myreturn = true;
        }
        return myreturn;
    },

    closeairwindow: function () {
        if ($("#modal_windows2").is(":visible")) {
            $("#modal_windows2").modal("hide");

            $("#modal_windows").modal("show");
        } else {
            $("#modal_windows").modal("hide");
        }
    },

    silentHandler: function (
        route,
        frmID,
        frmExtraFields,
        setting,
        popModal,
        container,
        loading_indicator
    ) {
        if (popModal.show) {
            if (!!popModal.size && popModal.size == "")
                popModal.size = "modal-lg";

            if (popModal.modal == "modal_media") {
                $("#modal_media .modal-dialog")
                    .removeClass("modal-xl")
                    .removeClass("modal-sm")
                    .removeClass("modal-lg")
                    .removeClass("modal-fullscreen")
                    .addClass(popModal.size);

                $("#air_media").html("");
                $("#modal_media").modal("show");
            } else {
                $("#modal_windows .modal-dialog")
                    .removeClass("modal-xl")
                    .removeClass("modal-sm")
                    .removeClass("modal-lg")
                    .removeClass("modal-fullscreen")
                    .addClass(popModal.size);

                if ($("#modal_windows").is(":visible")) {
                    $("#modal_windows").modal("hide");
                    $("#modal_windows2").modal("show");
                } else {
                    $("#air_windows").html("");
                    $("#modal_windows").modal("show");
                }
            }
        }

        /**/
        let form = document.createElement("form");
        if (!!frmID) {
            if (frmID.includes(".")) {
                form = $(frmID);
            } else {
                form = $("#" + frmID);
            }
        }
        let fd = new FormData(form[0]);
        if (!!frmExtraFields) {
            for (var key in frmExtraFields) {
                if (frmExtraFields.hasOwnProperty(key)) {
                    fd.append(key, frmExtraFields[key]);
                }
            }
        }

        fd.append("_token", env.token);
        let mode = "axios";
        if (!!setting) {
            mode = !!setting.mode ? setting.mode : mode;
        }

        fd.append("action_handler_mode", mode);
        fd.append("permission", "no");
        let that = this;
        axios({
            method: "post",
            url: route,
            data: fd,
            headers: { "Content-Type": "multipart/form-data" },
        })
            .then(function (response) {
                // handle succes
                let get_content = response.data;

                if (!!setting && typeof setting.fnSuccess === "function") {
                    setting.fnSuccess(get_content);
                }
                var htmml = "";
                if (that.isObject(get_content)) {
                    /*work with Close Window, Taost or any Alert*/

                    if (
                        !!get_content.message &&
                        get_content.message.length > 0
                    ) {
                        that.successAlert(get_content.message);
                    }

                    if (!!get_content.callback) {
                        if (get_content.callback.toLowerCase() == "formreset") {
                            form[0].reset();
                        } else {
                            that.callbackHandler(
                                get_content,
                                get_content.callback
                            );
                        }
                    }
                    if (!!get_content.html) {
                        html = get_content.html;
                    } else {
                        html = "";
                        that.closeairwindow();
                    }
                } else {
                    html = get_content;
                }

                if (!!container && html != "") {
                    if (popModal.modal == "modal_media") {
                        $("#air_media").html("").html(get_content);
                        return null;
                    } else {
                        if (
                            $("#modal_windows").is(":visible") &&
                            container == "air_windows"
                        ) {
                            $("#air_windows").html("").html(get_content);
                            return null;
                        }
                        if ($("#modal_windows2").is(":visible")) {
                            $("#air_windows2").html("").html(get_content);
                            return null;
                        }
                    }
                    $("#" + container).html("");
                    $("#" + container).html(html);
                }
            })
            .catch(function (error) {
                if (!!error.response) {
                    let errors = error.response.data;
                    if (!!errors.message && errors.message.length > 0) {
                        that.errorAlert(errors.message);
                    }
                    ////
                    if (!!errors.data && errors.type == "validator") {
                        for (var key in errors.data) {
                            if (errors.data.hasOwnProperty(key)) {
                                let container = key.replace(".", "-");

                                if ($("#" + container + "-error").length == 0) {
                                    const myArray = container.split("-");
                                    $("#" + myArray[0] + "-error").after(
                                        '<span id="' +
                                            container +
                                            '-error" class="error invalid-feedback show">' +
                                            errors.data[key][0] +
                                            "</span>"
                                    );
                                } else {
                                    $("#" + container + "-error")
                                        .show()
                                        .html(errors.data[key][0]);
                                }
                            }
                        }
                    }
                }
                if (!!setting && typeof setting.fnError === "function") {
                    setting.fnError(error.response);
                }
            })
            .then(function () {
                // always executed
                if (!!setting && typeof setting.fnAlways === "function") {
                    setting.fnAlways();
                }
            });
    },
    redirectto: function (jsondata) {
        window.location.href = jsondata.data.route;
    },
    submitPerpage: function (sort, order, querystr, objname) {
        let perpage = $("#txtperpage_" + objname).val();
        var url = "?perpage=" + perpage;
        if (!!sort) {
            url = url + "&sort=" + sort;

            if (!!order) {
                url = url + "&order=" + order;
            }
        }

        if (!!querystr && querystr.length > 0) {
            querystrurl = querystr.join("&");
            url = url + "&" + querystrurl;
        }

        $(location).attr("href", url);
    },
    makeDropdownByJson: (element, data, selectIndex, introductionMsg) => {
        let dropdown = $(element);
        dropdown.empty();
        if (!!introductionMsg) {
            dropdown.append(
                '<option selected="true" disabled>' +
                    introductionMsg +
                    "</option>"
            );
        }
        dropdown.prop("selectedIndex", 0);
        //let data = [{ "id": "1", "title": "test1" }];
        $.each(data, function (key, entry) {
            if (selectIndex == entry.id) {
                dropdown
                    .append(
                        $("<option></option>")
                            .attr("value", entry.id)
                            .text(entry.title)
                    )
                    .attr("checked");
            } else {
                dropdown.append(
                    $("<option></option>")
                        .attr("value", entry.id)
                        .text(entry.title)
                );
            }
        });
    },

    errorAlert: (message) => {
        notif({
            msg: message,
            type: "error",
            position: "right",
            fade: true,
            clickable: true,
            timeout: 2000,
        });
    },

    successAlert: (message) => {
        notif({
            msg: message,
            type: "success",
            position: "right",
            fade: true,
            clickable: true,
            timeout: 2000,
        });
    },

    /**+++++ enable and disable Element of form +++*/
    enableDisableByLang: (combo, lang, group_ele, enable_id) => {
        //elements_id must be ARRAY
        for (i = 0; i < lang.length; i++) {
            combo
                .parent()
                .children("#" + group_ele + lang[i])
                .addClass("hide");
        } //end for
        combo
            .parent()
            .children("#" + group_ele + enable_id)
            .removeClass("hide");
    },

    setInfoByEle: (jsondata) => {
        // closeairwindow();
        $.each(jsondata.data, function (key, val) {
            $(key).val(val);
            $(key).html(val);
        });
    },
    num: 33,
};
