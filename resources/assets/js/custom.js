$('.file-input').change(function () {
    let fileName = $(this)[0].files[0].name;

    $(this).next('span.file-control').text(fileName);
});