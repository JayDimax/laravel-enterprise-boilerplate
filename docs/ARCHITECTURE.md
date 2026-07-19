# Architecture and Extension Guide

The core contains authentication, authorization, settings, auditing, notifications, reusable UI, and infrastructure only. Business capabilities belong in independently owned modules. Follow PSR-12, SOLID, DRY, and KISS; use Form Requests for validation, policies for authorization, resource controllers for HTTP orchestration, and services for reusable workflows.

## Core folders

- `app/Http`: controllers, middleware, and requests.
- `app/Models`: framework-wide `User` and `AuditLog` models.
- `app/Services`: cross-cutting image, notification, permission, and audit services.
- `app/Traits`: opt-in UUID, status, slug, and audit behavior.
- `resources/views/components`: reusable Blade design system.
- `Modules/IAM`: identity administration HTTP, validation, policy, and route ownership.
- `Modules/Settings`: settings application service, persistence model, HTTP, validation, and routes.

## Creating a module

Create a module only after a stable capability boundary exists. Follow the IAM and Settings modules: register one provider, let the module own its routes and backend implementation, and keep genuinely shared UI in the central Blade design system. Add `Application`, `Domain`, `Infrastructure`, `Http`, `Resources`, `database`, or `tests` folders only when the module actually needs them. Prefix permissions with the capability name, such as `inventory.items.view`.

Existing public route names are compatibility contracts. Module extraction must preserve them unless a documented migration is provided.

Blade components accept attributes and named slots. Services are constructor-injected and expose small operations. Pure presentation helpers live in `app/Support/helpers.php`; workflows belong in services. Use dot-separated permission names, seed idempotently, authorize in controllers/policies, and hide unavailable navigation with Blade authorization directives.
