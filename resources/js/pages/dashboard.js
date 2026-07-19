import Chart from 'chart.js/auto';
import { designTokens } from '../shared/theme/tokens';

export function initializeDashboardChart() {
    const canvas = document.getElementById('activity-chart');

    if (! canvas) {
        return;
    }

    new Chart(canvas, {
        type: 'line',
        data: {
            labels: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'],
            datasets: [{
                label: 'System events',
                data: [38, 62, 48, 78, 58, 88, 70],
                borderColor: designTokens.colors.primary,
                backgroundColor: 'rgba(255, 127, 69, 0.12)',
                fill: true,
                tension: 0.35,
                pointRadius: 3,
            }],
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: { legend: { display: false } },
            scales: {
                y: { beginAtZero: true, grid: { color: 'rgba(148, 163, 184, 0.15)' } },
                x: { grid: { display: false } },
            },
        },
    });
}
