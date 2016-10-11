$(document).ready(function()
{
  $.post
  (
  "https://localhost/client_service/ordersHandler.php", 
  {
  userid:<?php echo $_SESSION['user_id'];?>,
  bookid:null,
  operation:'getOrders'
  },
  function(data)
  {
console.log("start");
console.log(data);	
	var response = JSON.parse(data);
	console.log(response.length);
	console.log(response[0].author);

for (var key=0, size=response.length; key<size;key++) {

  $('<tr>')
            .append( $('<td>').html('<img src = '+response[key].cover+ '>'
            ) )
            .append( $("<td>").html(
                "<a href=https://localhost/site/products.php?id=" + response[key].id + ">" + response[key].title +"</a>"
            ) )
            .append( $('<td>').html(
                response[key].price
            ) )
			.append( $('<td>').html(
                response[key].reviews
            ) )
            .appendTo('#orders_tbl');
}
	//$('#dataTable').html(r.join('')); 
	//$('#dataTable').html('<tr><td>a</td><td>b</td><td>c</td></tr>'); 
	//console.log(r.join(''));
 
  }
  );
});
