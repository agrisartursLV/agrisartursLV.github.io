$(document).ready(function() {
$("#spons1").hide();
$("#spons2").hide();
$("#loginMenu").hide();
$("#sponsorButton2").hide();

//function for slidedown info sponsor.
$("#sponsorButton").click(function() {
$("#spons1").slideDown("slow");
$("#spons2").slideDown("slow");
$("#sponsorButton").hide();
$("#sponsorButton2").show();
});
$("#sponsorButton2").click(function() {
$("#spons1").fadeOut("slow");
$("#spons2").fadeOut("slow");
$("#sponsorButton").show();
$("#sponsorButton2").hide();
});
//login buttons
$("#loginButton").click(function() {
$("#loginMenu").fadeIn("slow");
});
$("#closeLogin").click(function() {
$("#loginMenu").fadeOut("slow");
});





});