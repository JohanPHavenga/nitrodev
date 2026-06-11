import Alpine from 'alpinejs';
window.Alpine = Alpine;

// Theme store — initial value comes from the anti-FOUC script in <head>
Alpine.store('theme', {
    dark: document.documentElement.getAttribute('data-theme') === 'dark',
    toggle() {
        this.dark = !this.dark;
        if (this.dark) {
            document.documentElement.setAttribute('data-theme', 'dark');
            localStorage.setItem('nitrodev-theme', 'dark');
        } else {
            document.documentElement.removeAttribute('data-theme');
            localStorage.setItem('nitrodev-theme', 'light');
        }
    },
});

Alpine.start();

// Reveal on scroll via IntersectionObserver
document.addEventListener('DOMContentLoaded', () => {
    const io = new IntersectionObserver((entries) => {
        entries.forEach((entry) => {
            if (entry.isIntersecting) {
                entry.target.classList.add('in');
                io.unobserve(entry.target);
            }
        });
    }, { threshold: 0.14 });

    document.querySelectorAll('.reveal').forEach((el, i) => {
        el.style.transitionDelay = (i % 3 * 60) + 'ms';
        io.observe(el);
    });
});
