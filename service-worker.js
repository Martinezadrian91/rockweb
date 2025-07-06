self.addEventListener('install', e => {
  e.waitUntil(
    caches.open('rock-server-cache').then(cache => {
      return cache.addAll([
        './',
        './index.html',
        './icono-192.png'
      ]);
    })
  );
});

self.addEventListener('fetch', e => {
  e.respondWith(
    caches.match(e.request).then(response => response || fetch(e.request))
  );
});