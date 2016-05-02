$(document).ready(function(){
	$("div#jenisCustomer").hide();



	$("input[name=jenis-user]").on("click", function(){
		var selectedValue = $("input[name=jenis-user]:checked").val();

		if (selectedValue == "Customer") {
			$("div#jenisCustomer").show();
			$("div#region").hide();
		}
		else if (selectedValue == "Pedagang" ) {
			$("div#jenisCustomer").hide();
			$("div#tanggalDistribusi").hide();
			
		}
	})
});