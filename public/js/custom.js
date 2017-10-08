
var saleable2 = document.getElementById('switch4').checked;
//console.log(saleabel2);
if(saleable2 == true)
{
	$('.unitPrice').prop('disabled', false);
}

$('#unit_price').keyup(function(){

	var unit = document.getElementById('unit_nmbr').value;

	var price = $(this).val();

	var total = unit * price;

	$('#totalpricing').html(total);
	//console.log(total);
});

$('#unit_nmbr').keyup(function(){

	var unit = document.getElementById('unit_price').value;

	var price = $(this).val();

	var total = unit * price;

	$('#totalpricing').html(total);
	//console.log(total);
});

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
