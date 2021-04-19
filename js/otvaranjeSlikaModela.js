// Kropujemo slike da budu male
$(".mala").css({'width': '285px',
                'height': '500px'});

$("#prvaVelika").hide();
$("#drugaVelika").hide();
$("#trecaVelika").hide();
$("#cetvrtaVelika").hide();

$("#prvaPojedinost").click(function() {

    $("#prvaVelika").show()
                    .css("position", "fixed")
                    .css("top", "0")
                    .css("left", "0")
                    .css("right", "0")
                    .css("bottom", "0")
                    .css("width", "100vw")
                    .css("height", "100vh")
                    .css("z-index", "1")
});
$("#prvaVelika").click(function() {
    $("#prvaVelika").hide();

});

$("#drugaPojedinost").click(function() {

    $("#drugaVelika").show()
                    .css("position", "fixed")
                    .css("top", "0")
                    .css("left", "0")
                    .css("right", "0")
                    .css("bottom", "0")
                    .css("width", "100vw")
                    .css("height", "100vh")
                    .css("z-index", "1")
});
$("#drugaVelika").click(function() {
    $("#drugaVelika").hide();

});


$("#trecaPojedinost").click(function() {

    $("#trecaVelika").show()
                    .css("position", "fixed")
                    .css("top", "0")
                    .css("left", "0")
                    .css("right", "0")
                    .css("bottom", "0")
                    .css("width", "100vw")
                    .css("height", "100vh")
                    .css("z-index", "1")
});
$("#trecaVelika").click(function() {
    $("#trecaVelika").hide();

});

$("#cetvrtaPojedinost").click(function() {

    $("#cetvrtaVelika").show()
                    .css("position", "fixed")
                    .css("top", "0")
                    .css("left", "0")
                    .css("right", "0")
                    .css("bottom", "0")
                    .css("width", "100vw")
                    .css("height", "100vh")
                    .css("z-index", "1")
});
$("#cetvrtaVelika").click(function() {
    $("#cetvrtaVelika").hide();

});
