<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.4.3/jquery.min.js"></script>
<meta http-equiv="Content-Type" content="application/xhtml+xml; charset=utf-8" />
<select name="region" onchange="load(this)">
    <option>choose Country</option> 
    <?php

	require_once('count.php');
    foreach ($arModels as $region => $cityList){
        echo '<option value="' . $region . '">' . $region . '</option>' . "\n"; 
    } 
    ?>
</select>
 
<select name="city" id = "selectId"  onchange="FFF(this)"  >
    <option >Choose city</option>    
</select>
     
<script>
function load(select){
    var citySelect = $('[name="city"]');   
	$.getJSON('ajax.php', {
		action:'getCity',
		region:select.value
    }, 
    function(cityList){ 
        citySelect.html(''); 
        $.each(cityList, function(i){ 
         citySelect.append('<option value="' +  i + '">' + this + '</option>'); 
         }); 
    });
} 


   function FFF(rt){             
     $.ajax({
       type: "GET",
       url: "https://en.wikipedia.org/w/api.php?action=opensearch&search=" +rt.options[rt.value].text + "&callback=?",
       contentType: "application/json; charset=utf-8",
       async: false,
       dataType: "json",
       success: function (data) {
                  var sel = document.getElementById("selectId"); 
                  var txt = sel.options[sel.selectedIndex].text;    
                    if(data[0] === txt){
                      window.open((data[3][0]));
                }                                     
       },
      error: function (errorMessage) {
                alert(errorMessage);
      }
   });
  }
              
            
</script>
