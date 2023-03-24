<?php

  include 'inc/header.php';
  include 'Controller/Message.php';
  $msg = new Message();

  if(isset($_POST['sendmsg'])){
    $result = $msg->adminmsg($_POST);
  }

  include 'inc/navbar.php';
  include 'inc/cover.php';
  include 'inc/about.php';
  include 'inc/contact.php';
  include 'inc/footer.php';
 ?>

<script>
$(function(){
  // Initialize slider
  $( "#main_range_cover" ).slider({
    range: true,
    min: 4000,
    max: 100000,
    values: [<?php if(isset($range1) && isset($range2)){ echo $range1.','.$range2;} else{?> 100,100000 <?php } ?>],
    slide: function( event, ui ) {
      $( "#input_range_cover" ).val( "Ksh. " + ui.values[ 0 ] + " - Ksh. " + ui.values[ 1 ] );
    }
  });

  // Set initial value of input field
  $( "#input_range_cover" ).val( "Ksh. " + $( "#main_range_cover" ).slider( "values", 0 ) +
   " - Ksh. " + $( "#main_range_cover" ).slider( "values", 1 ) );

 // Handle manual input of price range
  $( "#input_range_cover" ).on( "change", function() {
  var inputVal = $(this).val().replace( /[^\d]/g, "" );
  var lowerVal = parseInt(inputVal.substr(0, inputVal.length / 2));
  var upperVal = parseInt(inputVal.substr(inputVal.length / 2));
  var sliderValues = $( "#main_range_cover" ).slider( "option", "values" );

  if (lowerVal < sliderValues[0]) {
    lowerVal = sliderValues[0];
  } else if (lowerVal > sliderValues[1]) {
    lowerVal = sliderValues[1];
  }

  if (upperVal > sliderValues[1]) {
    upperVal = sliderValues[1];
  } else if (upperVal < sliderValues[0]) {
    upperVal = sliderValues[0];
  }

  $( "#main_range_cover" ).slider( "values", [ lowerVal, upperVal ] );
});



});
</script>