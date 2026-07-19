# Enterprise Authentication Pages Brief

## Objective
Redesign the existing Laravel Breeze login, registration, and forgot-password screens to closely match the user-provided reference: a centered, orange-outlined authentication stage on a warm off-white page, with a white form card on the left and a dark teal visual panel on the right. Use original code and visuals, preserve all existing authentication behavior, and keep the solution reusable.

## Target audience
Business users and administrators accessing the Laravel Enterprise Boilerplate.

## Existing application and scope
Project: `F:\boilerplate`

Modify only:
- `resources/views/layouts/guest.blade.php`
- `resources/views/auth/login.blade.php`
- `resources/views/auth/register.blade.php`
- `resources/views/auth/forgot-password.blade.php`

Reuse existing Blade components where they remain appropriate. Do not create new components, routes, controllers, assets, dependencies, folders, or architectural layers. Preserve Vite and Tailwind.

## Reference composition
- Full viewport warm ivory/peach background.
- Centered landscape authentication frame, roughly 1280x720 at large desktop sizes, dark teal background, thin 4px coral border, rounded corners, and subtle shadow.
- White left form card inset from the stage edges, around 40-44% width, generous padding, modest rounded corners.
- Dark teal right panel with an extremely subtle dashboard/chart background and an original central security/account illustration.
- Footer/copyright note inside the right panel.
- Mobile: collapse to a clean single white card with a compact teal visual header or small illustration; no overflow and no unusably tall empty canvas.

## Branding and palette
- Brand is `Laravel Enterprise`, not Loxcy.
- Use an original compact LE identity mark consistent with the welcome page.
- Deep teal `#073b40` / `#083f45`.
- Darker teal `#032d32`.
- Coral orange `#ff7f45`.
- Warm canvas `#fff9f5`.
- White card and muted slate body copy.
- Mint may be used sparingly for success/security states.

## Shared guest layout
Refactor `layouts/guest.blade.php` into the reusable outer shell. Let individual views provide a page/illustration variant using component attributes or slots only if this fits the current anonymous-component conventions. Ensure other Breeze guest pages that already use `<x-guest-layout>` still render safely with sensible defaults. Do not break reset-password, confirm-password, or verify-email screens.

The right-side visual must be original and code-native—an abstract account/security console made of SVG/HTML: account card, shield/lock, analytics lines/bars, decorative orbit/blob. It should evoke the reference's polished illustration without copying the proprietary character artwork or dashboard screenshot. Keep SVG intrinsic dimensions.

## Login page
- Brand/logo, heading `Log in to your account`, succinct welcome copy.
- Email and password fields with inline leading icons.
- Remember checkbox and real forgot-password link on one row.
- Full-width dark teal Log in button.
- Footer prompt linking to registration when route exists.
- Preserve session status, validation errors, old email, autocomplete, CSRF, and POST route.
- Do not show nonfunctional Google/Facebook buttons.

## Registration page
- Heading `Create your account` and succinct onboarding copy.
- Name, email, password, confirmation fields with leading icons.
- Preserve validation errors, old values, autocomplete, CSRF, and POST route.
- Full-width dark teal Create account button.
- Footer prompt linking to login.
- Do not add a mandatory terms checkbox because no terms workflow currently exists.

## Forgot-password page
- Heading `Forgot your password?`.
- Warm pale-orange guidance panel matching the reference.
- Email field with icon and validation/status handling.
- Full-width dark teal `Send reset link` button.
- Clear back-to-login link.
- Preserve CSRF and password.email POST behavior.

## Typography and controls
Use the existing project font stack. Strong geometric SaaS hierarchy through weight/tracking. Inputs approximately 48-52px tall, thin slate borders, clear labels, orange/teal focus treatment, visible focus rings, and accessible contrast. Avoid excessive uppercase.

## Functional and quality requirements
- Correct guest/auth routes and POST forms.
- Accessible labels, error association where feasible, keyboard focus, semantic headings.
- Desktop visual match at 1440px and robust layouts at 768px and 375px.
- No horizontal overflow.
- No external assets or network calls.
- No fake social authentication.
- Preserve `@vite(['resources/css/app.css','resources/js/app.js'])`.
- Add intrinsic width/height to SVGs.
- Verify with `php artisan view:cache`, relevant auth tests, `npm.cmd run build`, and fresh browser renders with correct asset MIME types.

## Memorable element
An original coral account-access console floating over a subtle teal operational dashboard, visually customized per auth context where practical (login/account, registration/onboarding, forgot-password/lock), while sharing one maintainable layout.
