



$('.add_itemlist').click(function(){
	//alert('ok');
	var item_id = $('.name_of_item').val();
	var item_name = $('.name_of_item option:selected').text();
	var qnt_item = $('.qnt_item').val();
	

	if(item_name !== null && qnt_item !== '')
	{

		var html = `
					<tr>
			            <td>`+item_name+`<input type="hidden" name="item_id[]" value="`+item_id+`"></td>
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