$(".coup_img").click(function() {
    $(".coup_hidden").trigger("click");
})


$(".day_date").on("click", function () {
    $("#coup_type_date").prop("disabled", false);
});
