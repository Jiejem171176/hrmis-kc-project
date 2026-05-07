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

---

## Locked RBAC Rules

| Rule ID | Rule |
|---|---|
| RBAC-01 | The system shall include the following initial roles: Super Admin, HR Admin, Payroll Admin, Managing Director, HOD, Employee. |
| RBAC-02 | Managing Director is also an Employee, but with executive-level permissions. |
| RBAC-03 | Managing Director is not a Super Admin and shall not manage technical system configuration, roles, or permissions. |
| RBAC-04 | Payroll Admin is a finance/payroll processing role and shall only process payroll-related instructions after HR or approval flow confirmation. |
| RBAC-05 | Payroll Admin shall not freely edit employee master data unless permission is explicitly granted later. |
| RBAC-06 | HOD is an Employee with department-level approval responsibility. |
| RBAC-07 | Access control shall use a combination of role, permission, employee profile, department scope, and approval matrix. |

---

## Locked Employee Core Rules

| Rule ID | Rule |
|---|---|
| EMP-CORE-01 | Employee module shall start with master data foundation before creating the employees table. |
| EMP-CORE-02 | The employees table shall reference master tables using foreign keys, not plain text fields, for branch, department, position, job grade and employment status. |
| EMP-CORE-03 | Each employee may be linked to one user account. |
| EMP-CORE-04 | Managing Director, HOD, Payroll Admin and HR Admin are also employees if they are part of the company workforce. |
| EMP-CORE-05 | Super Admin may be a system-only account or an employee-linked account, depending on deployment needs. |
| EMP-CORE-06 | Employee Number shall be the official internal employee identifier and must be unique. |
| EMP-CORE-07 | Personal email and work email shall be stored separately. |
| EMP-CORE-08 | Reporting manager shall be handled using self-reference relationship on employees table. |

---

## Locked Master Data Foundation Rules

| Rule ID | Rule |
|---|---|
| MASTER-01 | Master data tables shall be created before the employees table. |
| MASTER-02 | Each master data table shall have a unique code and name. |
| MASTER-03 | Each master data table shall support active/inactive status using `is_active`. |
| MASTER-04 | Master data shall not be hardcoded in forms. |
| MASTER-05 | Employees table shall reference master data using foreign keys. |
| MASTER-06 | Branches represent company locations such as HQ, Johor and Melaka. |
| MASTER-07 | Departments may belong to a branch. |
| MASTER-08 | Positions may belong to a department where applicable. |
| MASTER-09 | Job grades shall represent employee grade or level. |
| MASTER-10 | Employment statuses shall represent employment lifecycle such as Probation, Confirmed, Contract, Resigned, Terminated or Retired. |
| MASTER-11 | Master data shall be seedable for initial setup. |
| MASTER-12 | Master data shall not be deleted if already used by employees. It should be deactivated instead. |
| MASTER-13 | Master data and HR domain tables shall use ULID primary keys unless there is a strong reason to use auto-increment IDs. |
| MASTER-14 | Master data tables shall support timestamps. |
| MASTER-15 | Master data tables may support soft deletes where appropriate. |

---

## Locked Branch Rules

| Rule ID | Rule |
|---|---|
| BRANCH-01 | `branches` table shall use ULID primary key. |
| BRANCH-02 | `branches` table shall have unique code and name. |
| BRANCH-03 | `branches` table shall support branch description. |
| BRANCH-04 | `branches` table shall support contact information: email, phone and address. |
| BRANCH-05 | `branches` table shall support `is_hq` flag. |
| BRANCH-06 | `branches` table shall support `is_active` flag. |
| BRANCH-07 | `branches` table shall support soft deletes. |
| BRANCH-08 | Branch model shall use `HasUlids` and `SoftDeletes`. |
| BRANCH-09 | Branch model shall include fillable fields: code, name, description, email, phone, address, is_hq and is_active. |
| BRANCH-10 | Branch model shall include departments relationship. |
| BRANCH-11 | Branch model shall not include employeeJobs relationship yet until EmployeeJob model/table exists. |

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

| 15 | Create auth view folder and login page | PASS |
| 16 | Create manual auth controller and connect login route | PASS |
| 17 | Add login POST route and form submission | PASS |
| 18 | Add basic login validation | PASS |
| 19 | Create first test user seeder | PASS |
| 20 | Implement real login using Auth::attempt() | PASS |
| 21 | Add logout route and controller method | PASS |
| 22 | Protect Admin route with auth middleware | PASS |
| 23 | Protect ESS route with auth middleware | PASS |

Step 24: Update PROJECT_PROGRESS.md with manual authentication implementation progress.

| 25 | Install Spatie Permission package and migrate RBAC tables | PASS |
| 26 | Add Spatie HasRoles trait to User model | PASS |
| 27A | Fix and seed initial RolePermissionSeeder | PASS |
| 27B | Analyze and lock updated RBAC roles and rules | PASS |
| 28 | Update RolePermissionSeeder with locked roles and permissions | PASS |
| 29 | Assign Super Admin role to test user | PASS |
| 30 | Register Spatie middleware aliases | PASS |
| 31 | Protect Admin route with access admin portal permission | PASS |
| 32 | Protect ESS route with access ess portal permission | PASS |

Step 33: Update PROJECT_PROGRESS.md with RBAC foundation progress.

| 35 | Analyze and lock Employee Core foundation rules | PASS |

Step 36: Update PROJECT_PROGRESS.md with locked Employee Core foundation rules.

| 37A | Analyze and align Branch migration and Branch model | PASS |
| 37B | Analyze and lock Master Data Foundation rules | PASS |
| 38 | Create branches table migration and Branch model | PASS |
| 39 | Create BranchSeeder and seed branches | PASS |
| 40 | Create departments table migration and Department model | PASS |
| 41 | Create DepartmentSeeder and seed departments | PASS |
| 42 | Create positions table migration and Position model | PASS |
| 43 | Create PositionSeeder and seed positions | PASS |
| 44 | Create job_grades table migration and JobGrade model | PASS |
| 45 | Create JobGradeSeeder and seed job grades | PASS |
| 46 | Create employment_statuses table migration and EmploymentStatus model | PASS |
| 47 | Create EmploymentStatusSeeder and seed employment statuses | PASS |
| 48 | Verify all master data tables and relationships | PASS |

Step 49: Update PROJECT_PROGRESS.md with Master Data Foundation progress.

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
