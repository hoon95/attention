$(".coup_img").click(function() {
    $(".coup_hidden").trigger("click");
})

$(".infinite_date").on("click", function () {
    $("#regdate").prop("disabled", true);
});

$(".day_date").on("click", function () {
    $("#regdate").prop("disabled", false);
});
