import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

console.log('app.js loaded at ' + new Date().toISOString());
Pusher.logToConsole = true;

// Echo.private(`App.Models.Doctor.31`)
//         .listen('.new-notification', (notification) => {
//             console.log("📬 إشعار جديد:", notification);
//             alert('📢 إشعار جديد: ' + notification.title); // أو أي تصرف تريده
//         });
