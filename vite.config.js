import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
                'resources/css/filament/admin/theme.css'
            ],
            refresh: [
                'app/Filament/**',           // Mengawasi semua Resource, Page, & Widget Filament
                'app/Providers/Filament/**', // Mengawasi pengaturan panel
                'app/Models/**',             // Mengawasi perubahan relasi Model
                'resources/views/**',        // Mengawasi file tampilan Blade
                'routes/**',                 // Mengawasi perubahan rute
            ],
        }),
    ],
});
