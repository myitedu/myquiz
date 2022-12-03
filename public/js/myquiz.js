$(function () {
    $(".categories").click(function () {
        let category_id = $(this).data('category_id');
        let has_questions = $(this).data('has_questions');
        if (has_questions){
            document.location = "/questions/"+category_id;
        }else{
            alert("This category does not have questions yet \n Be the first to create questions");
        }

    })
})
