import Swal from 'sweetalert2';
import { designTokens } from './theme/tokens';

export function initializeNotifications() {
    const toast = document.querySelector('[data-toast]');

    if (toast) {
        Swal.fire({
            toast: true,
            position: 'top-end',
            icon: toast.dataset.type || 'success',
            title: toast.dataset.message,
            showConfirmButton: false,
            timer: 3500,
        });
    }

    document.querySelectorAll('[data-confirm]').forEach((element) => {
        element.addEventListener('click', async (event) => {
            event.preventDefault();

            const result = await Swal.fire({
                title: element.dataset.confirm || 'Are you sure?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: designTokens.colors.primary,
                confirmButtonText: 'Continue',
            });

            if (result.isConfirmed) {
                element.closest('form')?.submit();
            }
        });
    });
}
