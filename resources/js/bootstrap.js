/**
 * We'll load the axios HTTP library which allows us to easily issue requests
 * to our Laravel back-end. This library automatically handles sending the
 * CSRF token as a header based on the value of the "XSRF" token cookie.
 */

import axios from 'axios'; // Importa a biblioteca Axios
window.axios = axios; // Atribui a Axios ao objeto global window

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest'; // Define um cabeçalho padrão para todas as requisições

/**
 * Echo exposes an expressive API for subscribing to channels and listening
 * for events that are broadcast by Laravel. Echo and event broadcasting
 * allows your team to easily build robust real-time web applications.
 */

// import Echo from 'laravel-echo'; // Importa a biblioteca Echo (comentar se não for necessário)

// import Pusher from 'pusher-js'; // Importa a biblioteca Pusher (comentar se não for necessário)
// window.Pusher = Pusher; // Atribui a Pusher ao objeto global window

// Configuração do Echo para uso com Pusher
// window.Echo = new Echo({
//     broadcaster: 'pusher', // Especifica o tipo de broadcaster (neste caso, Pusher)
//     key: import.meta.env.VITE_PUSHER_APP_KEY, // Chave da aplicação Pusher obtida de variáveis de ambiente
//     cluster: import.meta.env.VITE_PUSHER_APP_CLUSTER ?? 'mt1', // Cluster Pusher obtido de variáveis de ambiente
//     wsHost: import.meta.env.VITE_PUSHER_HOST ? import.meta.env.VITE_PUSHER_HOST : `ws-${import.meta.env.VITE_PUSHER_APP_CLUSTER}.pusher.com`, // Host WebSocket
//     wsPort: import.meta.env.VITE_PUSHER_PORT ?? 80, // Porta WebSocket
//     wssPort: import.meta.env.VITE_PUSHER_PORT ?? 443, // Porta WebSocket segura
//     forceTLS: (import.meta.env.VITE_PUSHER_SCHEME ?? 'https') === 'https', // Força o uso de TLS se necessário
//     enabledTransports: ['ws', 'wss'], // Transportes habilitados
// });
