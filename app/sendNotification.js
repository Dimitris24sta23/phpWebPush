$(function(){
  $('.sendNotification').click(function (e) {
    e.preventDefault();
    var subscription = JSON.parse($(this).attr('data-payload'));
    console.log(subscription)

    $.ajax({
      url : 'send_push_notification.php',
      data: {
        "payload": subscription
      },
      type: "POST",
      success : function(response){
        //alert (response);
      }, //end success
      error: function(xhr) {

      }
    }); //end ajax

  });
});




