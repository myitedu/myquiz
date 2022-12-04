$(function () {
    $(".categories").click(function () {
        let category_id = $(this).data('category_id');
        let is_clickable = $(this).data('is_clickable');
        if (is_clickable) {
            document.location = "/questions/" + category_id;
        }else{
            alert("Sorry this category does not have any questions entered yet");
        }
    })
})
