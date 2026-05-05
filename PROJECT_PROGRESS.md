# HRMIS KC SDN BHD - Project Progress

## Project Baseline

- Project Name: HRMIS KC SDN BHD
- Laravel Version: 13.7.0
- PHP Version: 8.3+
- Database: PostgreSQL
- Local Environment: Laravel Herd
- IDE: Visual Studio Code
- Frontend: Blade + Tailwind
- Auth Approach: Manual Auth Setup
- Starter Kit: None
- Architecture: Modular Monolith

---

## Locked Authentication Rules

| Rule ID | Rule |
|---|---|
| AUTH-01 | The system uses manual authentication. No Laravel Breeze, Jetstream, Fortify starter flow, or starter kit. |
| AUTH-02 | Login uses email and password. |
| AUTH-03 | The default Laravel `users` table remains the authentication source. |
| AUTH-04 | The employee profile table will be created later and linked to the `users` table. |
| AUTH-05 | One user can have one employee profile. |
| AUTH-06 | Admin portal is only for authenticated users with suitable role or permission. |
| AUTH-07 | ESS portal is only for authenticated employee users. |
| AUTH-08 | The system shall support first-time account setup for newly created employees. When HR Admin creates a new Employee record, the system shall create a linked user account and send a first-time setup email to the employee. The employee must complete first-time password setup before accessing ESS. The system shall not email plain-text passwords to employees. Email verification and password reset will be implemented as part of the authentication foundation, but may be phased if needed. |
| AUTH-09 | Manual auth will include login form, login controller, logout process and auth middleware. |
| AUTH-10 | After login, Admin users go to `/admin`; Employee or ESS users go to `/ess`. |


- Admin and ESS must be separated.
- Database schema and Eloquent models are the source of truth.
- One module must be developed at a time.
- Each module must go through:
  - Analyze
  - Lock Rules
  - Implement
  - Test
  - Freeze

---

## Phase 01 - Project Foundation

| Step | Description | Status |
|---|---|---|
| 01 | Create fresh Laravel 13 project | PASS |
| 02 | Verify Laravel Herd domain | PASS |
| 03 | Configure PostgreSQL connection | PASS |
| 04 | Verify default migrations | PASS |
| 05 | Update APP_NAME | PASS |
| 06 | Create separated route files for Admin, ESS and Auth | PASS |
| 07 | Create basic Admin and ESS views | PASS |
| 08 | Create layout folders | PASS |
| 09 | Create Admin layout | PASS |
| 10 | Create ESS layout | PASS |
| 11 | Replace default welcome page with HRMIS landing page | PASS |
| 13 | Analyze and lock manual authentication rules | PASS |
---

## Current Route Structure

| Area | File | Prefix | Route Name |
|---|---|---|---|
| Web | routes/web.php | / | home |
| Auth | routes/auth.php | - | - |
| Admin | routes/admin.php | /admin | admin.dashboard |
| ESS | routes/ess.php | /ess | ess.dashboard |

---

## Current View Structure

```text
resources/views/
├── admin/
│   └── dashboard.blade.php
├── ess/
│   └── dashboard.blade.php
├── layouts/
│   ├── admin/
│   │   └── app.blade.php
│   └── ess/
│       └── app.blade.php
└── welcome.blade.php
