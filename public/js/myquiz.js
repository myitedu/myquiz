$(function () {
    $(".categories").click(function () {
        let category_id = $(this).data('category_id');
        document.location = "/questions/"+category_id;
    })
})
