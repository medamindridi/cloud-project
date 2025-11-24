import Echo from 'laravel-echo';
import Pusher from 'pusher-js';

window.Pusher = Pusher;

window.Echo = new Echo({
  broadcaster: 'pusher',
  key: '2180113094f55d784c62',
  cluster: 'eu', // e.g. 'eu'
  forceTLS: true
});

window.Echo.channel('chat').listen('NewChatMessage', (e) => {
  document.getElementById('messages').insertAdjacentHTML(
    'beforeend',
    `<b><p style='display:inline'>${e.user} : </p></b><p style='display:inline'>${e.message}</p><br>`
  );
  const audio = new Audio('/notif/notif.wav');
  audio.play();
});

document.getElementById('chatForm').addEventListener('submit', function (event) {
  event.preventDefault();
  const message = document.getElementById('message').value;

  axios.post('/chat/add', { message: message })
    .then(function (response) {
      // Handle successful response (e.g., clear the form, show confirmation)
      document.getElementById('message').value = '';
    })
    .catch(function (error) {
      // Handle error (e.g., show error notification)
      alert('Error sending message');
    });
});
