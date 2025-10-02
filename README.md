# WordPress Enterprise Theme

This repository is a scaffold for building an enterprise-ready WordPress theme using **Claude Code** and the **context-engineering workflow**.

## Structure

- **CLAUDE.md** → Global coding standards and rules (WordPress Coding Standards, file size limits, i18n, tests).  
- **INITIAL.md** → First feature request: describes the enterprise theme (CPTs, block patterns, customizer, accessibility).  
- **examples/** → Reference snippets Claude should mimic:
  - `functions.php` (menus, supports, assets)
  - `inc/customizer.php` (customizer patterns)
  - `tests/test_theme_setup.php` (PHPUnit tests for theme setup)
- **PRPs/** → Where Product Requirement Prompts (PRPs) will be generated.  
- **.claude/commands/** → Commands to generate & execute PRPs.  
- **README.md** → You are here.  

## Workflow with Claude Code

1. **Generate PRP**  
/generate-prp INITIAL.md
→ Creates a detailed Product Requirements Prompt under `PRPs/`.

2. **Execute PRP**  
/execute-prp PRPs/your-wordpress-theme.md
→ Claude writes code, runs tests, and iterates until success.

## Development

- Place theme code under `wp-content/themes/mytheme/`.
- Activate via WP Admin → Appearance → Themes, or with WP-CLI:
wp theme activate mytheme

## Testing

Run PHPUnit (with wp-phpunit) to validate setup:  
vendor/bin/phpunit


## Standards

- WordPress Coding Standards (PHPCS)  
- BEM CSS naming  
- Escape output, sanitize input  
- Internationalize all strings with `__()` or `_e()`  



