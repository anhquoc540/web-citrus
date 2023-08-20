// active menu
$(document).ready(function () {
    $(".nav-item .nav-link").click(function () {
        $(".nav-link").removeClass("active");
        $(this).addClass("active");
    });
});

// phai co thang nay moi call ajax duoc
$.ajaxSetup({
    headers: {
        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
    },
});

function deleteDisease(id) {
    if (confirm("Bạn chắc chắn muốn xóa dòng dữ liệu này?")) {
        $.ajax({
            type: "DELETE",
            datatype: "JSON",
            data: { id },
            url: "/admin/diseases/delete",
            success: function (result) {
                if (result.error == false) {
                    alert(result.message);
                    location.reload();
                } else {
                    alert("Error, please try again");
                }
            },
        });
    }
}

function deleteTherapy(id) {
    if (confirm("Bạn chắc chắn muốn xóa dòng dữ liệu này?")) {
        $.ajax({
            type: "DELETE",
            datatype: "JSON",
            data: { id },
            url: "/admin/therapies/delete",
            success: function (result) {
                if (result.error == false) {
                    alert(result.message);
                    location.reload();
                } else {
                    alert("Error, please try again");
                }
            },
        });
    }
}

function deleteProduct(id) {
    if (confirm("Bạn chắc chắn muốn xóa dòng dữ liệu này?")) {
        $.ajax({
            type: "DELETE",
            datatype: "JSON",
            data: { id },
            url: "/admin/products/delete",
            success: function (result) {
                if (result.error == false) {
                    alert(result.message);
                    location.reload();
                } else {
                    alert("Error, please try again");
                }
            },
        });
    }
}

function deleteProductStore(id) {
    if (confirm("Bạn chắc chắn muốn xóa dòng dữ liệu này?")) {
        $.ajax({
            type: "DELETE",
            datatype: "JSON",
            data: { id },
            url: "/expert/stores/delete",
            success: function (result) {
                if (result.error == false) {
                    alert(result.message);
                    location.reload();
                } else {
                    alert("Error, please try again");
                }
            },
        });
    }
}

function deleteApprove(id) {
    if (confirm("Bạn chắc chắn muốn xóa dòng dữ liệu này?")) {
        $.ajax({
            type: "DELETE",
            datatype: "JSON",
            data: { id },
            url: "/admin/approves/" + id,
            success: function (result) {
                if (result.error == false) {
                    alert(result.message);
                    location.reload();
                } else {
                    alert("Error, please try again");
                }
            },
        });
    }
}

function deleteUser(id) {
    if (confirm("Bạn chắc chắn muốn xóa dòng dữ liệu này?")) {
        $.ajax({
            type: "DELETE",
            datatype: "JSON",
            data: { id },
            url: "/admin/users/" + id,
            success: function (result) {
                if (result.error == false) {
                    alert(result.message);
                    location.reload();
                } else {
                    alert("Error, please try again");
                }
            },
        });
    }
}
