# Reusable Application-Wide Business Design System Brief

## Objective
Translate the redesigned welcome page's business visual language into the existing authenticated Laravel Enterprise Boilerplate as a reusable design system. Apply it consistently across the dashboard, users, roles, permissions, settings, audit logs, profile, and change-password experiences while preserving the established modular architecture and avoiding duplicate components/layouts.

## Audience
Enterprise administrators and operational users who need a calm, professional, information-dense workspace.

## Architectural mandate
- Existing project: `F:\boilerplate`.
- Refactor existing design tokens, layout, Blade components, and shared module views.
- Do not create a new layout, theme layer, module-specific theme, or duplicate component.
- IAM has no module-owned Blade views: keep `resources/views/administration/index.blade.php`, `form.blade.php`, and `show.blade.php` shared across users/roles/permissions.
- Settings and audit remain in `resources/views/system`.
- Preserve every route name/URL, middleware/permission guard, `@can`/`@canany`, controller/request class, form method/name, CSRF directive, validation bag, session key, Alpine state/event, chart canvas ID, and logout POST behavior.
- Keep existing light/dark-mode behavior functional.

## Source design language
The welcome page at `resources/views/welcome.blade.php` is the visual reference:
- Deep petrol teal `#083b40`; dark teal `#03282c`.
- Coral `#ff7f45` with hover `#f16f36`.
- Warm canvas/surface `#fff8f3`, pale coral, clean white, mint `#d9eee7`, operational green `#44b989`.
- Regular, calmer typography: body 400; navigation/labels 500; headings/actions up to 600. Avoid black/extrabold and minimize bold.
- Broad spacing, crisp rectangular/softly rounded business cards, restrained shadows, thin borders, coral active accents, clear data hierarchy.
- No external fonts/assets or network dependencies.

## Phase 1 — shared tokens and base CSS
1. Update `resources/js/shared/theme/tokens.js` as the single source of truth. Preserve existing semantic keys (`navy`, `primary`, `accent`, `mist`, `success`, `warning`, `danger`, radius/shadow keys) but remap them to teal/coral/warm values. Add aliases only when repeated semantic use clearly needs them. Do not add a second palette.
2. Keep `tailwind.config.js` consuming these tokens. Modify only if required for semantic aliases; do not introduce an external font.
3. Update `resources/css/app.css` base typography, selection, focus, body color/canvas, dark-mode-safe styling, and reusable `@layer components` patterns only where they genuinely remove repeated classes.
4. Update `resources/js/pages/dashboard.js` hard-coded chart colors to the new teal/coral/mint palette without changing data/initialization behavior.

## Phase 2 — authenticated shell
Refactor `resources/views/layouts/app.blade.php`:
- Deep teal sidebar, coral active indicators, mint/teal muted text, warm application canvas, white/warm sticky header, restrained border/shadow system.
- Original compact `LE` / Laravel Enterprise identity consistent with welcome/auth pages; do not add logo assets.
- Lighter typography throughout.
- Keep mobile sidebar overlay/toggle, all Alpine state, dark toggle/storage, notification/user menus, search affordance, permissions, route highlighting, user identity, toast marker, footer runtime information, and logout behavior.
- Fix visible encoding artifacts such as `Â·`/`âŒ˜` if encountered.

Update existing `sidebar-link.blade.php` and `sidebar-group.blade.php` without changing their public props/API. Use the existing icon component.

## Phase 3 — reusable UI primitives
Restyle existing components rather than creating replacements:
- `page-title.blade.php`
- `card.blade.php`
- `button.blade.php`
- `input.blade.php`, `select.blade.php`, `textarea.blade.php`, `checkbox.blade.php`, `radio.blade.php`
- `table.blade.php`
- `badge.blade.php`
- `alert.blade.php`
- `empty-state.blade.php`
- `loading.blade.php`
- `breadcrumb.blade.php`
- `modal.blade.php`

Preserve every existing prop, slot, variant/tone/size option, loading/disabled state, table toolbar/head/footer/loading/empty/sticky behavior, modal focus/event/transition/width behavior, accessibility state, and horizontal table scrolling.

Unify existing Breeze components used by profile and remaining auth flows—do not create profile-specific controls:
- `text-input.blade.php`
- `input-label.blade.php`
- `input-error.blade.php`
- `primary-button.blade.php`
- `secondary-button.blade.php`
- `danger-button.blade.php`
- `auth-session-status.blade.php`

Danger/destructive states must remain clearly red and distinct from coral brand actions.

Leave provably unused legacy navigation components alone unless shared-component changes visibly require consistency. Do not reintroduce `layouts/navigation.blade.php` into the app shell.

## Phase 4 — page-level adoption
Apply focused direct-class cleanup only where shared component updates do not fully carry the system:

### Dashboard — `resources/views/dashboard.blade.php`
- Warm metric cards, coral/mint data accents, lighter metric/header typography, teal chart/support styling.
- Preserve all dynamic metrics, loops, permission-gated quick actions, and chart canvas ID.

### Users / roles / permissions
- `resources/views/administration/index.blade.php`: shared search/table/action/selection design for all three sections; preserve Alpine query/selection behavior and permission actions.
- `resources/views/administration/form.blade.php`: shared create/edit experience; preserve section branching, exact field names, methods, and route behavior.
- `resources/views/administration/show.blade.php`: consistent details experience; preserve `$section`/`$id` architecture.
- Do not split these into separate templates.

### Settings and audit
- `resources/views/system/settings.blade.php`: consistent grouped form surfaces; preserve PUT method and exact fields/checkbox names.
- `resources/views/system/audit.blade.php`: consistent search/table/filter surface; preserve export/print and current data structure.

### Profile and password
- `resources/views/profile/edit.blade.php`: replace stock Breeze gray shells with existing `<x-page-title>` and `<x-card>` composition while retaining the three existing partials.
- Update the three profile partials (`update-profile-information-form`, `update-password-form`, `delete-user-form`) to use the same visual system while preserving IDs, error bags, email verification flow, status strings, methods, autocomplete, modal event names, and destructive confirmation.
- `resources/views/account/password.blade.php`: align remaining direct classes; preserve `password.update`, PUT, CSRF, and exact password names.

### Remaining auth safety
Check `confirm-password.blade.php`, `reset-password.blade.php`, and `verify-email.blade.php` after Breeze component changes. Modify page markup only if needed to avoid visual regression; preserve auth behavior. Do not redesign login/register/forgot or guest layout unless required by component interaction.

## Typography rules
- Default/body/description/table cell: 400.
- Labels/nav/chips/breadcrumbs: 500.
- Page headings/card headings/buttons/metrics: 600 maximum.
- Avoid `font-black`, `font-extrabold`, and widespread `font-bold` in the authenticated system.
- Preserve hierarchy with size, space, border, tone, and alignment rather than excessive weight.

## Interaction/accessibility
- Visible coral focus rings with sufficient contrast.
- Active navigation must not rely on color alone (indicator/background/icon treatment).
- Preserve semantic headings/labels/error messages.
- Maintain keyboard-operable menus, modal focus trap/escape, mobile sidebar, forms, tables, and links.
- Maintain `prefers-reduced-motion` behavior where transitions exist.
- No horizontal viewport overflow at 375px; tables may scroll inside their own containers.
- Dark mode must remain legible and functional even though light mode is the primary design target.

## Memorable design element
The authenticated shell should feel like the operational counterpart of the welcome page: a deep-teal navigation rail with a thin coral active signal, warm content canvas, and data cards that use coral/mint accents sparingly. The relationship should be unmistakable without turning the admin UI into a marketing page.

## Verification
Run:
- `php artisan optimize:clear`
- `php artisan view:cache`
- `npm.cmd run build`
- `php artisan route:list`
- `php artisan test`
- `vendor\bin\pint --test`

Visually inspect on a fresh server with correct CSS/JS MIME types:
- dashboard
- administration users/roles/permissions index and representative form/show pages
- settings
- audit logs
- profile
- account password
- mobile sidebar at 375px
- light and dark modes
- representative modal/table/form/error/focus states

Use existing seeded admin credentials only for local QA. Do not expose or alter credentials.
