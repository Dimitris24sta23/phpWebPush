
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

// Private key: r9Oz6tV7jq3hFIuKj0VlTKbVUhxmet5iCng1gsI6SeU (I will remove this from here)

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
        const payload = document.querySelector('.payload');
        payload.textContent = JSON.stringify(subscription);
      } else {
        console.log('getSubscription: User is NOT subscribed.');
        subscribeUser();
      }
    });


}

function updateSubscriptionOnServer(subscription) {
  // TODO: Send subscription to application server

  const showpayload = document.querySelector('.payload');
  showpayload.textContent = JSON.stringify(subscription);

  const payload = JSON.stringify(subscription);

  console.log(payload);

  let user_email = "dimitrisbor@hotmail.com";
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

      updateSubscriptionOnServer(subscription);

      isSubscribed = true;

    })
    .catch(function(err) {
      console.log('Failed to subscribe the user: ', err);
    });
}


/*
Firebase:
  AAAALK4XSMY:APA91bEUtgagfJ5e67u8P_YSph1z5I2x98vTsAE3qrJIHWGSZvwfrI98-y9lwdoPBEbDYD15dGC6Fu2pPLl9Q0TodsU2UYpR_erYSLd9rdBymqtANUZs3ln_8u47glkmkthDicrj09qx
  AIzaSyCU70c3XI8te1QoozpdqG0rQBJgW_UOgxk*/
