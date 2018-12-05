function down() {

  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
  	if (this.readyState == 4 && this.status == 200) {
  		var myObj = JSON.parse(this.responseText);
      console.log(myObj);
  		
      //Building the category dropdown
      for (i = 0; i < myObj[0].length; i++) {
        var catObject =  myObj[0][i];
        console.log(catObject['cat_name']);
        
        var cat_node = document.createElement("OPTION");                  
        // Create a <li> node
        var cat_text_node = document.createTextNode(catObject['cat_name']);
        cat_node.value = catObject['cat_id'];         
        // Create a text node
        cat_node.appendChild(cat_text_node);                              
        // Append the text to <li>
        document.getElementById("category").appendChild(cat_node);
      }

    }

 };

  xhttp.open("GET", "../../php/category.php", true);
  xhttp.send();
  }
