import './bootstrap';

import Alpine from 'alpinejs';
import { initializeDashboardChart } from './pages/dashboard';
import { initializeNotifications } from './shared/notifications';

document.addEventListener('DOMContentLoaded', () => {
    initializeNotifications();
    initializeDashboardChart();
});

window.Alpine = Alpine;

Alpine.start();
