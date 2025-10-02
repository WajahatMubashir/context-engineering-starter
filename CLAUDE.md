# Global Rules for WordPress Enterprise Theme

## Coding Standards
- Follow the **WordPress Coding Standards (WPCS)** for all PHP code.
- Use **PSR-4 autoloading** conventions in `inc/` for modular PHP files.
- Use **BEM naming convention** for CSS classes.
- Use **ESLint + Prettier** rules for JavaScript (if added).
- All code must be formatted consistently.

## Security & Data Handling
- Escape all output with `esc_html()`, `esc_attr()`, `wp_kses()`, etc.
- Sanitize all input (`sanitize_text_field()`, `sanitize_email()`, etc.).
- Always use **nonces** for form submissions and AJAX requests.
- Follow the principle of least privilege in capabilities checks.

## Internationalization
- Wrap all user-facing strings in `__()`, `_e()`, `esc_html__()`, etc.
- Use the theme text domain: **`mytheme`**.
- Place translation files in a `languages/` directory.

## Theme Structure
- Place all extra functionality in `inc/` (e.g., `inc/customizer.php`, `inc/cpt-portfolio.php`).
- Keep **functions.php** lightweight; it should only bootstrap the theme.
- Use **theme.json** for block editor settings.
- Create and register **block patterns** under `patterns/` with handles like `mytheme/hero-banner`.

## File & Code Limits
- No file should exceed **500 lines** — split into smaller modules.
- Comment code thoroughly, especially hooks and filters.
- Provide docblocks (`/** ... */`) for all functions and classes.

## Testing & Validation
- Add PHPUnit tests for:
  - Theme setup (menus, supports, sidebars).
  - Custom Post Types / Taxonomies.
  - Customizer settings.
  - Block patterns.
- Run **PHPCS** with WordPress standard:
