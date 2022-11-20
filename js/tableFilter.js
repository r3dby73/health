//console.clear();
function formTable(selector){
  var wrapper = document.querySelector(selector);
  var form = wrapper.getElementsByTagName("form")[0];
  var table = wrapper.getElementsByTagName("table")[0];
  
  form.onkeyup = function(ev){
    
    var 
     direction = form.elements[0].value,
     doctorName  = form.elements[1].value,
     date_ = form.elements[2].value,
     time_ = form.elements[3].value;
   

   for(var i = 1; i < table.rows.length; i++){  
     table.rows[i].className = "";
     
     if( 
       table.rows[i].cells[1].innerHTML.indexOf(direction) == -1 ||
       table.rows[i].cells[2].innerHTML.indexOf(doctorName) == -1  ||
       table.rows[i].cells[3].innerHTML.indexOf(date_) == -1 ||
         table.rows[i].cells[4].innerHTML.indexOf(time_) == -1
     ){
       table.rows[i].className = "hidden-row";
     }

   }    

  }  
}
formTable(".container-table");