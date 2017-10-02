
'use strict';


// Check if the current browser actually supports push messaging
if ('serviceWorker' in navigator && 'PushManager' in window) {
  console.log('Service Worker and Push is supported');

  navigator.serviceWorker.register('service-worker.js')
    .then(function(swReg) {
      console.log('Service Worker is registered', swReg);
      swRegistration = swReg;
      initialiseUI();
    })
    .catch(function(error) {
      console.error('Service Worker Error', error);
    });
} else {
  console.warn('Push messaging is not supported');
}




const applicationServerPublicKey = 'BD8SozdRZ5kh_f8yVZk1yluzpJPF3FpanXk9ucrlwoJf2hMMA1R41z7LgO_K3F6QmuUs2EHLBRdPWj4f3xDFzKU';


let isSubscribed = false;
let swRegistration = null;

function urlB64ToUint8Array(base64String) {
  const padding = '='.repeat((4 - base64String.length % 4) % 4);
  const base64 = (base64String + padding)
    .replace(/\-/g, '+')
    .replace(/_/g, '/');

  const rawData = window.atob(base64);
  const outputArray = new Uint8Array(rawData.length);

  for (let i = 0; i < rawData.length; ++i) {
    outputArray[i] = rawData.charCodeAt(i);
  }
  return outputArray;
}


function initialiseUI() {

  // Set the initial subscription value
  swRegistration.pushManager.getSubscription()
    .then(function(subscription) {
      isSubscribed = !(subscription === null);
      if (isSubscribed) {
        console.log('getSubscription: User is subscribed.');
        $('.userSub').html("You are subscribed");
        const payload = document.querySelector('.payload');
        payload.textContent = JSON.stringify(subscription);
        $('.subscription').show();
      } else {
        console.log('getSubscription: User is NOT subscribed.');
        $('.userSub').html("You are not subscribed");
        subscribeUser();
      }
    });


}

function sendWelcomeNotification(){
  var subscription = JSON.parse($(".payload").html());
  console.log(subscription)

  var payload = {
    "title": "XE Notifications",
    "message": "Ευχαριστούμε για την εγγραφή σας!",
    "icon": "https://promotion.xe.gr/xePush/images/smalltile.png",
    "image": "https://promotion.xe.gr/xePush/images/image.jpg"
  };

  payload = JSON.stringify(payload);

  $.ajax({
    url : 'app/send_push_notification.php',
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
}

function updateSubscriptionOnServer(subscription) {
  // TODO: Send subscription to application server
  const showpayload = document.querySelector('.payload');
  showpayload.textContent = JSON.stringify(subscription);

  const payload = JSON.stringify(subscription);

  console.log(payload);

  let user_email = "demo@demo.com";
  let age = 20;

  $.ajax({
    url : 'app/subscribeUser.php',
    data: {
      "email": user_email,
      "age": age,
      "payload": payload
    },
    type: "POST",
    success : function(response){
      console.log ('success');
      sendWelcomeNotification();
    }, //end success
    error: function(xhr) {

    }
  }); //end ajax


}

function subscribeUser() {
  const applicationServerKey = urlB64ToUint8Array(applicationServerPublicKey);
  swRegistration.pushManager.subscribe({
    userVisibleOnly: true,
    applicationServerKey: applicationServerKey
  })
    .then(function(subscription) {
      console.log('User is now subscribed.');
      $('.userSub').html("You are subscribed");
      $('.subscription').show();
      updateSubscriptionOnServer(subscription);

      isSubscribed = true;

    })
    .catch(function(err) {
      console.log('Failed to subscribe the user: ', err);
    });
}
