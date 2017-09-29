$(function(){
  $('.sendNotification').click(function (e) {
    e.preventDefault();
    var subscription = JSON.parse($(this).attr('data-payload'));
    console.log(subscription)

    var payload = {
      "title": "XE Notifications",
      "message": "Ευχαριστούμε για την εγγραφή σας!",
      "icon": "https://promotion.xe.gr/xePush/images/smalltile.png",
      "image": "https://promotion.xe.gr/xePush/images/image.jpg"
    };

    payload = JSON.stringify(payload);

    $.ajax({
      url : 'send_push_notification.php',
      data: {
        "subscription": subscription,
        "payload": payload
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




