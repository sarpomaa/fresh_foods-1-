function onloadCust() {

	// where the images should be displayed in the html page
	var content = document.getElementById("cust_table");

// Create table & header 
   var cust_table = document.createElement("table");
   cust_table.style.width = "1000px";
   cust_table.className = "table table-bordered";

            // creating the header of the table
            var t_head= cust_table.createTHead();
            var row = t_head.insertRow(0);
           
            var cell = row.insertCell(0);
            cell.innerHTML = "<b>Firstname</b>";
             
             var cell1 = row.insertCell(1);
            cell1.innerHTML = "<b>Lastname </b>";
            
            var cell2 = row.insertCell(2);
            cell2.innerHTML = "<b>E-mail </b>";
            
            var cell3 = row.insertCell(3);
            cell3.innerHTML = "<b>Contact Number</b>";
           
            var cell4 = row.insertCell(4);
            cell4.innerHTML = "Address</b>";

            var cell5 = row.insertCell(5);
            cell5.innerHTML = "<b>City</b>";
            
            var cell6 = row.insertCell(6);
            cell6.innerHTML = "<b>Profile Picture</b>"

            var tds = document.getElementsByTagName('thead');
            content. appendChild(cust_table);
            // ajax call
            
            var xhttp = new XMLHttpRequest();  
            xhttp.onreadystatechange = function() {
              if (this.readyState == 4 && this.status == 200) {
                var product = JSON.parse(this.responseText);


                //inserting on row of data
                
                //for each map in the list of maps
                product.forEach(function(map){
                  // customer firstname
                  var row1 = t_head.insertRow(1);
                  var cell = row1.insertCell(0);
                  cell.innerHTML = map["customer_fname"];


                  // customer lastname

                  var cell1 = row1.insertCell(1);
                  cell1.innerHTML = map["customer_lname"];
                  // customer email
                  var cell2 = row1.insertCell(2);
                  cell2.innerHTML = map["customer_email"];
                  // contact
                  var cell3 = row1.insertCell(3);
                  cell3.innerHTML = map["customer_contact"];

                  var cell4 = row1.insertCell(4);
                  cell4.innerHTML = map["customer_address"];

                  var cell5 = row1.insertCell(5);
                  cell5.innerHTML = map["customer_city"];

                  var img1 = document.createElement("img");
                  img1.src = "../../images/" + map["product_image"];
                  img1.style.width = "100px";
                  img1.style.height = "130px";

                  var cell6 = row1.insertCell(6);
                  cell6.appendChild(img1);
                });
              }
            }

xhttp.open("GET", "../../php/view.php", true);
xhttp.send();


}

