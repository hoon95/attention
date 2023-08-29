$(".coup_img").click(function() {
    $(".coup_hidden").trigger("click");
})

const myModalEl = document.getElementById("myModal");
myModalEl.addEventListener("shown.bs.modal", function() {
    $(this)
});