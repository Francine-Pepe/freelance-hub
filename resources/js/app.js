import Alpine from "alpinejs";

window.Alpine = Alpine;

Alpine.start();

/* Sidebar navigation */

const sidebar = document.querySelector(".sidebar");
const toggle = document.querySelector(".sidebar__toggle");
const nav = document.querySelector(".sidebar__nav");

if (sidebar && toggle && nav) {
    let lastScrollY = window.scrollY;
    let ticking = false;

    /* Toggle navigation */

    toggle.addEventListener("click", () => {
        const isOpen = sidebar.classList.toggle("is-menu-open");

        toggle.setAttribute("aria-expanded", String(isOpen));

        toggle.setAttribute(
            "aria-label",
            isOpen ? "Close navigation" : "Open navigation",
        );
    });

    /* Hide sidebar while scrolling down */

    const handleScroll = () => {
        const currentScrollY = window.scrollY;

        /* Always show sidebar at the top of the page */

        if (currentScrollY <= 10) {
            sidebar.classList.remove("is-hidden");

            lastScrollY = currentScrollY;

            return;
        }

        /* Keep sidebar visible while navigation is open */

        if (sidebar.classList.contains("is-menu-open")) {
            sidebar.classList.remove("is-hidden");

            lastScrollY = currentScrollY;

            return;
        }

        /* Ignore very small scroll movements */

        const difference = currentScrollY - lastScrollY;

        if (Math.abs(difference) < 8) {
            return;
        }

        /*  Scrolling down = hide
        | Scrolling up = show */

        if (currentScrollY > lastScrollY) {
            sidebar.classList.add("is-hidden");
        } else {
            sidebar.classList.remove("is-hidden");
        }

        lastScrollY = currentScrollY;
    };

    /* Optimise scroll handling */

    window.addEventListener(
        "scroll",
        () => {
            if (!ticking) {
                window.requestAnimationFrame(() => {
                    handleScroll();

                    ticking = false;
                });

                ticking = true;
            }
        },
        {
            passive: true,
        },
    );

    /* Close navigation after clicking a link */

    nav.querySelectorAll("a").forEach((link) => {
        link.addEventListener("click", () => {
            sidebar.classList.remove("is-menu-open");
            sidebar.classList.remove("is-hidden");

            toggle.setAttribute("aria-expanded", "false");

            toggle.setAttribute("aria-label", "Open navigation");
        });
    });
}
