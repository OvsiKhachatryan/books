$('.authors').select2({
    placeholder: "Select Authors",
    allowClear: true
});

function createBook(event, form) {
    event.preventDefault();

    let formdata = $(form).serialize();
    $.post('/book/create', formdata, function (resp) {
        if (resp) {
            $(form).find("input[name='name']").val('');
            $(".authors").val("").trigger('change');
            message.success.show('The book successfully added!');
        } else {
            message.danger.show('The book did not add!');
        }
    });
}

function editBook(event, form) {
    event.preventDefault();

    let formdata = $(form).serialize();
    $.post('/book/update', formdata, function (resp) {
        if (resp) {
            message.success.show('The book successfully updated!');
        } else {
            message.danger.show('The book did not update!');
        }
    });
}

$(document).on("click", ".btn-filter", function () {
    let search = $(".search").val();
    let sortColumn = $(".sort-column").find("option:selected").val();
    let sortType = $(".sort").find("option:selected").val();
    let query = "";
    if (search != "") {
        query += `&search=${search}`;
    }
    if (sortColumn != "") {
        query += `&sort_column=${sortColumn}`;
    }
    if (sortType != "") {
        query += `&sort=${sortType}`;
    }
    if (query[0] == "&") {
        query = query.slice("1");
    }
    window.location.href = `/?${query}`;
});

$(document).on("click", ".btn-delete", function () {
    const self = this;
    $.post('/book/delete', { id: $(self).attr("data-id") }, function (resp) {
        if (resp) {
            $(self).closest("tr").remove();
            message.success.show('The book deleted!');
        } else {
            message.danger.show('The book did not deleted!');
        }
    });
});