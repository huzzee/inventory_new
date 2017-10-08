
var saleable2 = document.getElementById('switch4').checked;
//console.log(saleabel2);
if(saleable2 == true)
{
	$('.unitPrice').prop('disabled', false);
}



$('#switch4').change(function(){

	var saleable = $(this).is(':checked');
	//console.log(saleable);

	if(saleable == true)
	{
		$('.unitPrice').prop('disabled', false);
	}
	else if(saleable == false)
	{
		$('.unitPrice').prop('disabled', true);
	}
});

$('#discount_percent').keyup(function(){
	var diss = $(this).val();

	var price =  document.getElementById('unit_price').value;
	//console.log(price);

	var disscount = diss * price/100;

	//console.log(disscount);
	var diss_price = document.getElementById('discount_price').value = price - disscount;


});

$('#unit_price').keyup(function(){
	var price = $(this).val();

	var diss =  document.getElementById('discount_percent').value;
	//console.log(price);

	var disscount = diss * price/100;

	var diss_price = document.getElementById('discount_price').value = price - disscount;


});
