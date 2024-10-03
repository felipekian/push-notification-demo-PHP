self.addEventListener('push', (event) => {
  
  // { "title":"Hello Boy", "body":"Deu certo rapá", "icon":"icon.png", "url":"./?message=helloboy" }
  
  const notification = event.data.json();

  event.waitUntil(self.registration.showNotification(notification.title, {
    body: notification.body,
    icon:notification.icon,
    data:{
      notificationURL: notification.url
    }
  }));
});

self.addEventListener('notificationclick', (event) => {
  event.waitUntil(clients.openWindow(event.notification.data.notificationURL));
});