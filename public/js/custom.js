
var saleable2 = document.getElementById('switch4');
//console.log(saleabel2);
if(saleable2 !== null){
	if(saleable2.checked == true)
	{
		$('.unitPrice').prop('disabled', false);
	}
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
	var diss_price1 = document.getElementById('discount_price1').value = price - disscount;


});

$('#unit_price').keyup(function(){
	var price = $(this).val();

	var diss =  document.getElementById('discount_percent').value;
	//console.log(price);

	var disscount = diss * price/100;

	var diss_price = document.getElementById('discount_price').value = price - disscount;
	var diss_price1 = document.getElementById('discount_price1').value = price - disscount;


});



$('.add_itemlist').click(function(){
	//alert('ok');
	var item_name = $('.name_of_item').val();
	var qnt_item = $('.qnt_item').val();
	

	if(item_name !== null && qnt_item !== '')
	{

		var html = `
					<tr>
			            <td>`+item_name+`<input type="hidden" name="item_name[]" value="`+item_name+`"></td>
			            <td>`+qnt_item+`<input type="hidden" name="required_qnt[]" value="`+qnt_item+`"></td>
			            <td>
			            <button type="button" class="btn btn-icon btn-danger m-b-5 remove_item">
			            <i class="fa fa-remove"></i>
			            </button>
			            </td>
			        </tr>
		`;
		$('#item_row').append(html);
		//$('.name_of_item').val().prop('selected',true);



		

		$('.qnt_item').val('');
	}
	else{
		alert('please Select Item and enter Quantity');
	}
	
	
});

$('.checking').click(function(){
	alert($('#item_array'));
});



$('body').on('click', '.remove_item', function(){
	var itemData = $(this).parent().parent();
	itemData.remove();

	//console.log($("input[name='medicine_name[]']").val());
});