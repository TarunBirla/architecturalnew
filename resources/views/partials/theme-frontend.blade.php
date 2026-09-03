{{-- 
  =========================================================================
  EMILY ROYCE STUDIO - CENTRAL FRONTEND THEME CONFIGURATION
  All existing frontend styling (colors, fonts, headings, buttons, 
  borders, inputs, cards, radiuses, shadows, hover/active states)
  are managed from THIS SINGLE LOCATION.
  =========================================================================
--}}
<style>
:root {
    /* 1. BACKGROUND COLORS */
    --fe-bg-canvas: #FBF9F5;
    --fe-bg-surface: #FFFFFF;
    --fe-bg-[#141518]: #141518;
    --fe-bg-stone-50: #F8F7F4;
    --fe-bg-stone-100: #F4F2EB;
    --fe-bg-accent-light: rgba(197, 168, 128, 0.15);

    /* 2. TEXT & HEADING COLORS */
    --fe-color-[#141518]: #141518;
    --fe-color-heading: #141518;
    --fe-color-[#3A3C44]: #3A3C44;
    --fe-color-[#525560]: #525560;
    --fe-color-muted: #626570;
    --fe-color-white: #FFFFFF;

    /* 3. BRAND & ACCENT COLORS */
    --fe-color-accent: #C5A880;
    --fe-color-accent-hover: #B3956B;
    --fe-color-gold: #9E825A;
    --fe-gradient-gold-start: #1A1B20;
    --fe-gradient-gold-mid: #9E825A;
    --fe-gradient-gold-end: #C5A880;

    /* 4. BORDER COLORS */
    --fe-border-color: #E5E2D9;
    --fe-border-stone-100: #F0EDE5;
    --fe-border-stone-200: #E5E2D9;
    --fe-border-stone-300: #D6D2C4;
    --fe-border-[#C5A880]: rgba(197, 168, 128, 0.4);

    /* 5. TYPOGRAPHY FONTS */
    --fe-font-sans: 'Plus Jakarta Sans', sans-serif;
    --fe-font-heading: 'Space Grotesk', sans-serif;
    --fe-font-serif: 'Playfair Display', serif;

    /* 6. BORDER RADIUSES */
    --fe-radius-card: 1.5rem;   /* 24px - rounded-3xl */
    --fe-radius-button: 0.75rem; /* 12px - rounded-xl */
    --fe-radius-pill: 9999px;   /* rounded-full */

    /* 7. SHADOWS */
    --fe-shadow-sm: 0 1px 2px 0 rgba(0, 0, 0, 0.05);
    --fe-shadow-md: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
    --fe-shadow-xl: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
}

/* Global Frontend Styling Rules */
body {
    background-color: var(--fe-bg-canvas) !important;
    color: var(--fe-color-[#141518]) !important;
    font-family: var(--fe-font-sans) !important;
    overflow-x: hidden;
}

h1, h2, h3, h4, h5, h6, .font-heading {
    font-family: var(--fe-font-heading);
}

.gold-gradient-text {
    background: linear-gradient(135deg, var(--fe-gradient-gold-start) 0%, var(--fe-gradient-gold-mid) 60%, var(--fe-gradient-gold-end) 100%);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
}

.glass-nav {
    background: rgba(255, 255, 255, 0.94);
    backdrop-filter: blur(16px);
    -webkit-backdrop-filter: blur(16px);
    border-bottom: 1px solid var(--fe-border-color);
}

.bg-blueprint {
    background-image: radial-gradient(rgba(197, 168, 128, 0.18) 1px, transparent 1px);
    background-size: 32px 32px;
}

::-webkit-scrollbar-track { background: var(--fe-bg-stone-100); }
::-webkit-scrollbar-thumb { background: var(--fe-color-accent); border-radius: 4px; }
::-webkit-scrollbar-thumb:hover { background: var(--fe-color-accent-hover); }
</style>

<script>
    tailwind.config = {
        theme: {
            extend: {
                colors: {
                    brand: {
                        dark: 'var(--fe-bg-[#141518])',
                        card: 'var(--fe-bg-surface)',
                        border: 'var(--fe-border-color)',
                        accent: 'var(--fe-color-accent)',
                        accentHover: 'var(--fe-color-accent-hover)',
                        light: 'var(--fe-bg-canvas)',
                        text: 'var(--fe-color-[#141518])',
                        muted: 'var(--fe-color-muted)'
                    }
                },
                fontFamily: {
                    sans: ['var(--fe-font-sans)'],
                    heading: ['var(--fe-font-heading)'],
                    serif: ['var(--fe-font-serif)']
                }
            }
        }
    }
</script>
