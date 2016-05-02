$(document).ready(function(){
	$("div#tanggal").hide();

	$("input[name=tgldistribusi]").on("click", function(){
		var selectedValue = $("input[name=tgldistribusi]:checked").val();

		if (selectedValue == "harilain") {
			$("div#tanggal").show();
		}
		else if (selectedValue == "hariini") {
			$("div#tanggal").hide();
		}
	})
});