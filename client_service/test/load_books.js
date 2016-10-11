$(document).ready(function(){
	

console.log("starting");
  $.post
  (
  "https://localhost/client_service/booksHandler.php", 
  {
  column:"title",
  title:"Classical Mythology"
  },
  function(data)
  {
	
	var response = JSON.parse(data);
	
	console.log(data);
	//return response;
	
	//console.log(response.length);
	//console.log(response[0].author);
  }
  );
  
 // console.log('ID: ' + profile.getId()); // Do not send to your backend! Use an ID token instead.
  //console.log('Name: ' + profile.getName());
  //console.log('Image URL: ' + profile.getImageUrl());
  //console.log('Email: ' + profile.getEmail());

});
