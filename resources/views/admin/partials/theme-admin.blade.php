{{-- 
  =========================================================================
  EMILY ROYCE STUDIO - CENTRAL ADMIN PANEL THEME CONFIGURATION
  All existing admin panel styling (backgrounds, text, headings, buttons, 
  sidebar, navbar, tables, inputs, cards, radiuses, shadows, hover/active states)
  are managed from THIS SINGLE LOCATION.
  =========================================================================
--}}
<style>
:root {
    /* 1. ADMIN BACKGROUND COLORS */
    --admin-bg-canvas: #FBF9F5;
    --admin-bg-sidebar: #FFFFFF;
    --admin-bg-card: #FFFFFF;
    --admin-bg-[#141518]: #141518;
    --admin-bg-stone-50: #F8F7F4;
    --admin-bg-stone-100: #F4F2EB;
    --admin-bg-accent-light: rgba(197, 168, 128, 0.15);

    /* 2. ADMIN TEXT COLORS */
    --admin-color-[#141518]: #141518;
    --admin-color-heading: #141518;
    --admin-color-[#3A3C44]: #3A3C44;
    --admin-color-[#525560]: #525560;
    --admin-color-muted: #626570;
    --admin-color-white: #FFFFFF;

    /* 3. ADMIN BRAND & ACCENT COLORS */
    --admin-color-accent: #C5A880;
    --admin-color-accent-hover: #B3956B;
    --admin-color-gold: #9E825A;

    /* 4. ADMIN BORDER & TABLE COLORS */
    --admin-border-color: #E5E2D9;
    --admin-border-stone-100: #F0EDE5;
    --admin-border-stone-200: #E5E2D9;

    /* 5. ADMIN TYPOGRAPHY FONTS */
    --admin-font-sans: 'Plus Jakarta Sans', sans-serif;
    --admin-font-heading: 'Space Grotesk', sans-serif;

    /* 6. ADMIN RADIUSES */
    --admin-radius-card: 1.5rem;   /* 24px - rounded-3xl */
    --admin-radius-button: 0.75rem; /* 12px - rounded-xl */
}

/* Global Admin Panel Styling Rules */
body {
    background-color: var(--admin-bg-canvas) !important;
    color: var(--admin-color-[#141518]) !important;
    font-family: var(--admin-font-sans) !important;
}

h1, h2, h3, h4, h5, h6, .font-heading {
    font-family: var(--admin-font-heading);
}

aside {
    background-color: var(--admin-bg-sidebar) !important;
    border-color: var(--admin-border-color) !important;
}

::-webkit-scrollbar-track { background: var(--admin-bg-canvas); }
::-webkit-scrollbar-thumb { background: var(--admin-color-accent); border-radius: 3px; }
</style>

<script>
    tailwind.config = {
        theme: {
            extend: {
                colors: {
                    brand: {
                        dark: 'var(--admin-bg-[#141518])',
                        sidebar: 'var(--admin-bg-sidebar)',
                        card: 'var(--admin-bg-card)',
                        accent: 'var(--admin-color-accent)',
                        accentHover: 'var(--admin-color-accent-hover)',
                        border: 'var(--admin-border-color)'
                    }
                },
                fontFamily: {
                    sans: ['var(--admin-font-sans)'],
                    heading: ['var(--admin-font-heading)']
                }
            }
        }
    }
</script>
