$(document).ready(function() {
$("#xmlerror").hide();
$("#xmlnoerror").hide();
$("#phperror").hide();
$("#phpnoerror").hide();
$("#validatexml").click(function() {
var code = $("#xmlcode").val();
$.post("validate.php", {
val: "XML",
code1: code
}, function(data) {
if (data == '') {
$("#xmlerror").hide();
$("#xmlnoerror").show();
} else {
$("#xmlerror").show();
$("#xmlnoerror").hide();
}
});
});
$("#validatephp").click(function() {
var code = $("#phpcode").val();
$.post("validate.php", {
val: "PHP",
code1: code
}, function(data) {
if (data.startsWith("No syntax errors") == true) {
$("#phperror").hide();
$("#phpnoerror").show();
} else {
$("#phperror").show();
$("#phpnoerror").hide();
}
});
});
});
