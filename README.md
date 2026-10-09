# 🎯 Service Center Management System (SCMS)

A web-based platform for home-appliance service centers that manages complaints, technician assignments, and repair status end to end.

## 🌟 Overview

SCMS automates the day-to-day operations of a service center:

- **Customer & complaint registration** — capture customer, appliance, and problem details
- **Dealer management** — distributors register and manage their own service calls
- **Technician assignment** — assign technicians to calls and track their availability
- **Service call lifecycle** — from `Assigned` through `In Progress` to `Close`, with parts, GST, discount and payment details
- **Role-based dashboards** — separate admin and dealer views with summary metrics and charts

## ✨ Features

- Separate login and dashboards for admins, dealers and technicians
- Session handling with automatic idle-timeout and logout
- AJAX-driven updates and toast notifications (no full page reloads)
- Responsive, mobile-ready Bootstrap 4 interface built on AdminLTE
- DataTables for sortable, searchable listings
- Chart.js dashboards for service-volume and status overview

## 🛠️ Tech Stack

| Layer | Technology |
|---|---|
| Frontend | HTML5, CSS3, Bootstrap 4, JavaScript (AJAX, jQuery) |
| Backend | Core PHP 7+ (custom `Database.php` / `BaseModel.php` classes) |
| Database | MySQL |
| UI Template | AdminLTE 3, DataTables, Chart.js, SweetAlert2 |
| Tools | XAMPP/Apache, MySQL Workbench, VS Code |

## 📁 Project Structure

```
SCMS/
├── assets/                # UI assets (not committed — see below)
├── classes/               # Database, BaseModel, Customer, Complaint,
│                          # Technician, Dealer, ServiceCall
├── config/
│   ├── config.sample.php  # Copy to config.php and add your credentials
├── controllers/           # Form-handling controllers per module
├── database/
│   └── schema.sql         # Schema + demo seed data
├── Dealer/                # Dealer-facing portal (own config + assets)
├── includes/              # Shared header, navbar, sidebar, footer, scripts
├── pages/                 # Views: dashboard, complaint, customer,
│                          # servicecall, technician, dealer
├── public/                # Entry points: index, login, logout
└── index.php
```

## ⚙️ Installation

1. **Get the UI assets.** The `assets/` folders are third-party AdminLTE template files (~82 MB) and are intentionally not committed to keep the repo lightweight. Download the [AdminLTE 3](https://github.com/ColorlibHQ/AdminLTE) template and copy its `dist/` folder into:

   - `SCMS/assets/`
   - `SCMS/Dealer/assets/`

2. **Configure the database.** Create your database and import the schema:

   ```bash
   mysql -u root -p < database/schema.sql
   ```

3. **Create your config files.** The real config files are git-ignored and must be created locally:

   ```bash
   cp config/config.sample.php config/config.php
   cp Dealer/dealerConfig/config.sample.php Dealer/dealerConfig/config.php
   ```

   Then edit both files and set your own `DB_USER`, `DB_PASS`, `DB_HOST` and `DB_NAME`.

4. **Run the project.** Start Apache and MySQL from XAMPP and open:

   ```
   http://localhost/SCMS/
   ```

### Demo Accounts

Provided in `database/schema.sql` for local testing only:

| Role | Username | Password |
|---|---|---|
| Admin | `demo_admin` | `demo1234` |
| Technician | `demo_tech` | `demo1234` |
| Dealer | `demo_dealer` | `demo1234` |

## ⚠️ Security Notes

This is an academic project. Two things to fix before any real deployment:

1. **Passwords are stored and compared in plaintext.** Use `password_hash()` and `password_verify()` instead.
2. **Validate and escape all user input.** The existing code uses `htmlspecialchars(strip_tags(...))` in places, but a proper prepared-statement layer for every query is the correct fix.

Also note that `config.php` and `database/schema.sql` are excluded from version control so real credentials and user data are never committed.

## 🚀 Future Enhancements

- Technician portal for updating assigned tasks in the field
- Customer-facing mobile app for tracking repair status
- Advanced analytics and downloadable reports
- Migrate passwords to hashing and add CSRF/rate-limiting protections