// import Echo from 'laravel-echo';

// import Pusher from 'pusher-js';
window.Pusher = Pusher;



window.Echo = new Echo({
    broadcaster: 'pusher',
    key: key, // ⚠️ لا تحط المفتاح السري
    cluster:cluster,
    forceTLS: true,
    enabledTransports: ['ws', 'wss'],
});
Pusher.logToConsole = true;

function receiveNotification(privateChannel)
{
    Echo.private(privateChannel)
        .listen('.new-notification', (notification) => {
            alert('📢 إشعار جديد: ' + notification.title);
            var $notificationBody = createNotification();
            $notificationBody.find('.notification-label').text(notification.title);
            $notificationBody.find('.notification-subtext').text(notification.body);
            $notificationBody.find('.notification-date').text(notification.timestamp);
            $notificationBody.find('#route-name').attr('href',notification.route_name );

            $('#notification-list').prepend($notificationBody);
            var notificationCount = parseInt($('#notification-count').text());
            notificationCount++;
            $('#notification-count').text(notificationCount);
            showNotification(notification.title);
            // $('#dropdown-menu-notification').show();
        });
}

function createNotification()
{
    return $( `
    <a id="route-name" class="d-flex p-3 border-bottom" href="#">
        <div class="notifyimg bg-primary">
            <i class="la la-check-circle text-white"></i>
        </div>
        <div class="mr-3">
            <h5 class="notification-label mb-1">Project has been approved</h5>
            <div class="notification-subtext">4 hour ago</div>
            <div class="notification-date text-muted">2025-08-11 12:30</div>
        </div>
        <div class="mr-auto">
            <i class="las la-angle-left text-left text-muted"></i>
        </div>
    </a>
`);
}

function showNotification(title) {
    $(function() {
        notif({
            msg: title,
            type: "success"
        });
    });
}


