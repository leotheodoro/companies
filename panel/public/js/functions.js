function handleModalDelete(url, element) {
    let form = $(element).find('#formDelete');
    form.attr('action', url);

    $(element).modal('show');
}
