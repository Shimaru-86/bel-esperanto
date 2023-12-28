// Importe o Workbox
importScripts('https://storage.googleapis.com/workbox-cdn/releases/5.1.2/workbox-sw.js');

const CACHE = "pwabuilder-page";
const VERSION = "v1.0"; // Adicionando uma versão

const offlineFallbackPage = "offline.html";

self.addEventListener("message", (event) => {
  if (event.data && event.data.type === "SKIP_WAITING") {
    self.skipWaiting();
  }
});

self.addEventListener('install', async (event) => {
  event.waitUntil(
    caches.open(CACHE + VERSION) // Incluindo a versão no nome do cache
      .then((cache) => cache.add(offlineFallbackPage))
  );
});

// Registre a estratégia "Network First" para as rotas específicas
workbox.routing.registerRoute(
  new RegExp('^https://seusite.com/rota'), // Substitua com a rota desejada
  new workbox.strategies.NetworkFirst()
);

if (workbox.navigationPreload.isSupported()) {
  workbox.navigationPreload.enable();
}

self.addEventListener('fetch', (event) => {
  if (event.request.mode === 'navigate') {
    event.respondWith((async () => {
      try {
        const preloadResp = await event.preloadResponse;

        if (preloadResp) {
          return preloadResp;
        }

        // Utilize a estratégia "Network First" para buscar na rede primeiro
        const networkResp = await fetch(event.request);

        // Se a busca na rede for bem-sucedida, armazene o recurso em cache
        if (networkResp && networkResp.status === 200) {
          const cache = await caches.open(CACHE);
          cache.put(event.request, networkResp.clone());
        }

        return networkResp;
      } catch (error) {

        const cache = await caches.open(CACHE);
        const cachedResp = await cache.match(offlineFallbackPage);
        return cachedResp;
      }
    })());
  }
});
