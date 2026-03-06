import "./bootstrap";
import Alpine from "alpinejs";

window.Alpine = Alpine;

/**
 * Logika Dark Mode menggunakan Alpine Store.
 * Store ini menyimpan status 'isDark' yang bisa diakses dengan $store.theme.isDark di Blade.
 */
Alpine.store("theme", {
    // 1. Inisialisasi status berdasarkan localStorage atau preferensi sistem
    isDark:
        localStorage.getItem("theme") === "dark" ||
        (!localStorage.getItem("theme") &&
            window.matchMedia("(prefers-color-scheme: dark)").matches),

    init() {
        this.apply();
    },

    /**
     * Fungsi untuk mengganti tema (Toggle)
     */
    toggle() {
        this.isDark = !this.isDark;
        // Simpan pilihan ke localStorage agar tidak hilang saat refresh
        localStorage.setItem("theme", this.isDark ? "dark" : "light");
        this.apply();
    },

    /**
     * Menerapkan class 'dark' pada elemen root HTML
     */
    apply() {
        if (this.isDark) {
            document.documentElement.classList.add("dark");
        } else {
            document.documentElement.classList.remove("dark");
        }
    },
});

/**
 * Listener Global untuk menangkap event 'toggle-theme'.
 * Di NavBar.blade, kita memicu ini dengan @click="$dispatch('toggle-theme')"
 */
window.addEventListener("toggle-theme", () => {
    Alpine.store("theme").toggle();
});

// Memulai mesin Alpine.js
Alpine.start();
