$(document).on("ready", function () {
    "use strict";

    function confirmation() {
        return confirm(CONFIRMATION_MSG);
    }

    $(".confirm").click(function () {
        event.preventDefault();
        if (confirmation() === true) {
            $(this).parent().submit();
        }
    });

    $(".btnDeleteAll").click(function () {
        event.preventDefault();
        if (confirmation() === true) {
            $("#deletesData").submit();
        }
    });

    $(".confirmDeleteItem").click(function () {
        const Self = $(this);
        event.preventDefault();
        if (confirmation() === true) {
            $("#delete-form").prop("action", Self.data("id")).submit();
        }
    });

    $(".confirmRestoreItem").click(function () {
        const Self = $(this);
        event.preventDefault();
        if (confirmation() === true) {
            $("#restore-form").prop("action", Self.data("id")).submit();
        }
    });

    $(".CustomActionBtn").click(function () {
        const Self = $(this);
        event.preventDefault();
        if (confirmation() === true) {
            var dataID = Self.data("id");
            $("#" + dataID).submit();
        }
    });

    $(".BtnStatus").click(function () {
        const Self = $(this);
        event.preventDefault();
        if (confirmation() === true) {
            $("#statusForm").prop("action", Self.data("id")).submit();
        }
    });

    $(".BtnCustomAction").click(function () {
        const Self = $(this);
        event.preventDefault();
        if (confirmation() === true) {
            $("#CustomActionForm").prop("action", Self.data("id")).submit();
        }
    });

    $(".btn_confirm").click(function (e) {
        e.preventDefault();
        if (confirmation() === true) {
            // Here Code
            $(this).parent().submit();
        }
    });

    // Check box select in table
    $(document).on("click", "#DataSelect", function () {
        const roleCheck = $(".DataCheckBox");
        if (
            $("#DataSelect")
                .parents(".table")
                .find("tbody input:not(:disabled)").length
        ) {
            if ($("#DataSelect").prop("checked") === true) {
                roleCheck.prop("checked", true);
                $(".btnDeleteAll").css("display", "block");
            } else {
                roleCheck.prop("checked", false);
                $(".btnDeleteAll").css("display", "none");
            }
        } else {
            $("#DataSelect").prop("checked", false);
        }
    });

    $(document).on("click", ".DataCheckBox", function () {
        if ($(this).parents("tbody").find(".DataCheckBox:checked").length > 0) {
            $(".btnDeleteAll").css("display", "block");
        } else {
            $(".btnDeleteAll").css("display", "none");
        }
    });

    $(".IntVal").bind("keyup change", function () {
        $(this).val(Math.abs($(this).val()));
    });
    $(".numericValue").bind("keyup change", function () {});

    if ($(".preview_images").length > 0) {
        $(".preview_images").magnificPopup({
            delegate: "a",
            type: "image",
            gallery: { enabled: true },
        });
    }

    if ($(".preview_images_pro").length > 0) {
        $(".preview_images_pro").magnificPopup({
            delegate: "a",
            type: "image",
            gallery: { enabled: true },
        });
    }

    if ($(".open_img").length > 0) {
        $(".open_img").magnificPopup({ delegate: "a", type: "image" });
    }

    $("#select_permissions").click(function () {
        if ($(this).prop("checked") === true) {
            $(".checked_permission").prop("checked", true);
        } else {
            $(".checked_permission").prop("checked", false);
        }
    });

    $(document).on("click", ".selectBoxPermission", function () {
        var Self = $(this);
        var Children = Self.parents(".panel-default").find(
            ".checked_permission"
        );
        if (Self.prop("checked") === true) {
            Children.prop("checked", true);
        } else {
            Children.prop("checked", false);
        }
    });

    $(document).on("keyup change", "#price", function () {
        var Self = $(this);
        $("#discount").prop("max", Self.val());
        checkDiscount();
    });

    $(document).on("keyup change", "#discount", function () {
        checkDiscount();
    });

    $(document).on("keyup bind change", ".checkLang", function () {
        if (/[a-zA-Z0-9]/.test($(this).val().charAt(0))) {
            $(this).css("direction", "ltr");
        } else {
            $(this).css("direction", "rtl");
        }
    });

    $(document).on("change click", ".CollectingByAdmin", function () {
        if ($(this).prop("checked") === true) {
            let ShippingBySeller = $(".ShippingBySeller");
            ShippingBySeller.parent().css("display", "none");
            ShippingBySeller.prop("disabled", true);
        }
    });

    $(document).on("change click", ".CollectingBySeller", function () {
        if ($(this).prop("checked") === true) {
            let ShippingBySeller = $(".ShippingBySeller");
            ShippingBySeller.parent().css("display", "block");
            ShippingBySeller.prop("disabled", false);
        }
    });

    $(document).on("submit", "form", function () {
        $(this)
            .find("#submit")
            .attr("disabled", true)
            .append('<i class="fa fa-spinner fa-spin spinnerBTN"></i>');
        $(this).find("#submit").parent().find("a").hide();
    });

    function checkDiscount() {
        var Discount = $("#discount");
        var Price = $("#price");
        var AfterDiscount = $("#after_discount");
        // Check If discount value larger than price
        if (parseFloat(Discount.val()) > parseFloat(Price.val())) {
            Discount.parent().addClass("has-error");
            AfterDiscount.val(parseFloat(Price.val()));
        } else {
            Discount.parent().removeClass("has-error");
            AfterDiscount.val(
                parseFloat(Price.val()) - parseFloat(Discount.val())
            );
        }
    }



    $("#textName").on("change keyup keypress", function (event) {
        $("#textDisplay").empty();
        $("#textDisplay").html($(this).val());
        getSetHeight("#name_height", "#textDisplay");
        var ew = event.which;
        if (ew == 32) return true;
        if (48 <= ew && ew <= 57) return true;
        if (65 <= ew && ew <= 90) return true;
        if (97 <= ew && ew <= 122) return true;
        return false;
    });

    $("#searchForm").submit(function () {
        $(this)
            .find("input[name], select[name]")
            .filter(function () {
                return !this.value;
            })
            .prop("name", "");
    });

    // Warning Pending Seller
    $("#notic").pulsate({
        color: "#cba348",
    });
});


/****************************************************
 * Icons
 ***************************************************/
$("#changeIconSize").on("keyup change", function () {
    $(this).val(Math.abs($(this).val()));
    if ($(this).val() > 100) {
        $(this).val(100);
    }
    if ($(this).val() < 40) {
        $(this).val(40);
    }
    $(".icons_table .icon_shape i").css("font-size", $(this).val() + "px");
});

$(".icon_box").click(function () {
    copyToClipboard($(this));
});

function copyToClipboard(element) {
    var $temp = $("<input>");
    $("body").append($temp);
    $temp.val(element.data("content")).select();
    document.execCommand("copy");
    $temp.remove();
    element.append("<span>تم النسخ بنجاح</span>");
    setTimeout(function () {
        element.find("span").remove();
    }, 1000);
}
//
//
// $(window).on('load', function () {
//
//     // $('#name_height').val($('#textDisplay').height());
// });

/**
 * DataTables
 */
$(document).on("click", ".select-checkbox", function () {
    let checked = $(this).get(0).checked;
    $(this)
        .parents(".table")
        .find("input[type=checkbox]")
        .prop("checked", checked);

    toggleDeleteSelectedBtn();
});

$(document).on("click", ".data-item", function () {
    let status =
        $(this).parents(".table").find(".data-item:checked").length ==
        $(this).parents(".table").find(".data-item").length
            ? true
            : false;

    $(".select-checkbox").prop("checked", status);
    toggleDeleteSelectedBtn();
});

$(document).on("click", ".delete-selected-btn", function () {
    let action = $(this).data("action");
    let dataTableTarget = $(this).data("datatable");

    let data = new FormData();
    data.append("_token", $("meta[name='_token'").attr("content"));

    // Fill all inputs
    $.each($("input[name='data[]']:checked"), function (index) {
        data.append(`data[${index}]`, $(this).val());
    });

    if (!confirm("are you sure?")) {
        return false;
    }

    $.ajax({
        url: action,
        type: "POST",
        data: data,
        processData: false,
        contentType: false,
        cache: false,
        beforeSend: function () {
            $("#loader").fadeIn();
            $("#errorsList").html("");
        },
        success: function (data) {
            $("#loader").fadeOut();
            if (data.status) {
                Swal.fire({
                    text: data.message,
                    icon: "success",
                    showConfirmButton: false,
                });
                $(".delete-selected-btn").hide();
                $(dataTableTarget).DataTable().draw();
            }
        },
        error: function (jqXHR, textStatus, errorThrown) {
            $("#pageloader").fadeOut();
            $("#errorsList").html("");
            var data = jqXHR.responseJSON;
            // Handle errors result;
            appendAjaxErrorsTo(data, "#errorsList");
        },
    });
});

// Show or hide delete selected btn
function toggleDeleteSelectedBtn() {
    if ($(".table").find(".data-item:checked").length > 0) {
        $(".delete-selected-btn").show();
    } else {
        $(".delete-selected-btn").hide();
    }
}

// Main scripts
function appendAjaxErrorsTo(errorPayload, errorDiv) {
    let errorsBag = document.createElement("ul");

    // Handle Laravel error bags
    if (errorPayload.errors) {
        errors = errorPayload.errors;
        for (let error in errors) {
            for (let errorString of errors[error]) {
                let errorItem = document.createElement("li");
                errorItem.innerHTML = errorString;
                errorsBag.appendChild(errorItem);
            }
        }
    }

    // Type of custom message payload
    if (errorPayload.message.length > 0) {
        let errorItem = document.createElement("li");
        errorItem.innerHTML = errorPayload.message;
        errorsBag.appendChild(errorItem);
    }

    $(errorDiv).html(errorsBag.innerHTML).show();
}
