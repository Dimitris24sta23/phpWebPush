$(function(){
  $('.deleteDevices').click(function (e) {
    e.preventDefault();
    var id = JSON.parse($(this).attr('data-id'));
    $.ajax({
      url : 'delete_devices.php',
      data: {
        "id": id,
      },
      type: "POST",
      success : function(response){
        //alert (response);
        alert(response);
      }, //end success
      error: function(xhr) {

      }
    }); //end ajax

  });
});




