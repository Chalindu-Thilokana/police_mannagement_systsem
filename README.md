# 👮‍♂️ Police Complaint Management System

A secure and transparent web-based complaint management system designed for the Sri Lanka Police to handle public complaints efficiently. This Laravel 11 application allows citizens to submit complaints online, and enables admins and officers to process, assign, investigate, and resolve them with accountability.

---

## ⚙️ Tech Stack

- **Laravel 11**
- **Jetstream (Livewire stack)**
- **Livewire 3**
- **Tailwind CSS**
- **Laravel Sanctum**
- **SweetAlert2** (`realrashid/sweet-alert`)
- **DOMPDF** (`barryvdh/laravel-dompdf`)
- **MySQL**
- **PHP ^8.2**

---

## 🎯 Key Features

### 👤 Users (Citizens)
- Register and verify email
- Submit complaints online
- Track complaint status in real-time
- Download complaint reports as PDFs
- Update profile or delete account

### 🧑‍💼 Super Admin
- Create/manage Branch Admins & Sub Admins
- Add complaint categories and police branches
- View system-wide complaint statistics
- Manage all users and data
- Update profile or delete account

### 🏢 Branch Admin
- Create Branch Sub Admin accounts
- Assign complaints to Sub Admins
- Transfer complaints to relevant branches
- View and update complaint details
- Manage own branch complaints and users

### 🕵️ Branch Sub Admin (Investigation Officer)
- Investigate assigned complaints
- Add inquiry comments and update status
- Download and print complaint details
- Manage own profile

---

## 🛡️ Role-Based Access

This system uses **manual role-based access** via a `role` column in the users table. Roles include:

- `super_admin`
- `branch_admin`
- `branch_sub_admin`
- `user` (citizen/complainant)

Access control is handled via condition checks in controllers and Blade views.

```php
@if(auth()->user()->role === 'branch_admin')
    // show admin features
@endif


🚀 Installation
git clone https://github.com/yourusername/police-complaint-system.git
cd police-complaint-system

composer install
npm install && npm run build

cp .env.example .env
php artisan key:generate

# Configure .env with your DB credentials
php artisan migrate --seed

php artisan serve
