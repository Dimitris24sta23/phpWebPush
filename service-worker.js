self.addEventListener('push', function(e) {

  var data = JSON.parse(e.data.text());
  console.log(data);

  var options = {
    body: data.message,
    icon: data.icon,
    image: data.image,
    vibrate: [100, 50, 100],
    data: {
      dateOfArrival: Date.now(),
      primaryKey: '2'
    }
  };
  e.waitUntil(
    self.registration.showNotification(data.title, options)
  );
});