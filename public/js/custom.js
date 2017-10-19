



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

$('.add_itemlist_purchased').click(function(){
	//alert('ok');
	var item_id = $('.name_of_item_puchase').val();
	var item_name = $('.name_of_item_puchase option:selected').text();
	var qnt_item = $('.qnt_item1').val();
	var rate_item = $('.rate_item').val();

	var total_amount = qnt_item * rate_item;
	

	if(item_name !== null && qnt_item !== '' && rate_item !== '')
	{

		var html = `
					<tr>
			            <td>`+item_name+`<input type="hidden" name="item_id[]" value="`+item_id+`"></td>
			            <td>`+qnt_item+`<input type="hidden" name="order_qnt[]" value="`+qnt_item+`"></td>
			            <td>`+rate_item+`<input type="hidden" name="item_rate[]" value="`+rate_item+`"></td>
			            <td>`+total_amount+`<input type="hidden" name="total_amount[]" value="`+total_amount+`"></td>
			            <td>
			            <button type="button" class="btn btn-icon btn-danger m-b-5 remove_item">
			            <i class="fa fa-remove"></i>
			            </button>
			            </td>
			        </tr>
		`;
		$('#item_row').append(html);
		//$('.name_of_item').val().prop('selected',true);



		

		$('.qnt_item1').val('');
		$('.rate_item').val('');
	}
	else{
		alert('please Select Item and enter Quantity');
	}
	
	
});



$('body').on('click', '.remove_item', function(){
	var itemData = $(this).parent().parent();
	itemData.remove();

	//console.log($("input[name='medicine_name[]']").val());
});



/*puchase Orders*/

$('.purchase_print').click(function(){
	//alert('ok');
	var order_id = $(this).data();
	//console.log(order_id);
	//return false;

	window.print();
	$.ajax({
	  url: "../pirinted",
	  type: "GET",
	  data: {order_id:order_id},
	  dataType: "json",
	  success: function(response) {
	  	//console.log(response);
	  	window.location.reload();
	  	
	  }
	
	  
	});
});

/*puchase Orders*/

/*grn Check*/

$('#purchase_code').keyup(function(){
	var purchase_code = $(this).val();

	$.ajax({
	  url: "../check_code",
	  type: "GET",
	  data: {purchase_code:purchase_code},
	  dataType: "json",
	  success: function(response) {
	  	
	  	//console.log(response.message);
	  	//return false;
	  	//window.location.reload();

	  	$('#chk_code').html(response.message);

	  	$('#purchase_info').html(response.sup_data);

	  	$('#table_item_body').html(response.item_data);
	  	
	  	
	  }
	
	  
	});
});