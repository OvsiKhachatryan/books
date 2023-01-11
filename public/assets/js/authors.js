function createAuthor(event, form) {
    event.preventDefault();

    let formdata = $(form).serialize();
    $.post('/author/create', formdata, function (resp) {
        if (resp) {
            $(form).find("input[name='name']").val('');
            message.success.show('The author successfully added!');
        } else {
            message.danger.show('The author did not add!');
        }
    });
}

function editAuthor(event, form) {
    event.preventDefault();

    let formdata = $(form).serialize();
    $.post('/author/update', formdata, function (resp) {
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
    window.location.href = `/authors?${query}`;
});

$(document).on("click", ".btn-delete", function () {
    const self = this;
    $.post('/author/delete', { id: $(self).attr("data-id") }, function (resp) {
        if (resp) {
            $(self).closest("tr").remove();
            message.success.show('The author deleted!');
        } else {
            message.danger.show('The author did not deleted!');
        }
    });
});