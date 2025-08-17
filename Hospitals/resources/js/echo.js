import Echo from 'laravel-echo'

window.Echo = new Echo({
  broadcaster: 'pusher',
  key: 'b5db412577a06d1e1447',
  cluster: 'mt1',
  forceTLS: true
});
