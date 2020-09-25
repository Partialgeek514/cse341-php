$(".clickModel").click(function() {
    var activeImg = $(this);
    var imgId = activeImg.attr("id");
    var imgSrc = activeImg.attr("src");
    $("#modelImg").attr("src", imgSrc);
    $("#model").css("display", "block");
    $.get("../captions.php", {character:imgId}, function(data, status, xhr) {
        console.log(status);
        if (status == "success") {
            $("#caption").html("<p>" + data + "</p>");
        }
    })
})

$("#closeButton").click(function() {
    $("#model").css("display", "none");
})