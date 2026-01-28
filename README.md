# Admin Panel & User Management System

Sistem admin panel untuk mengelola user, role, dan data aplikasi dengan autentikasi dan akses terkontrol.

## ✨ Fitur Utama

- 🔐 **Login & Register** - Sistem autentikasi dengan Laravel Breeze
- 👥 **Role & Permission** - Manajemen role (Admin / Staff) dengan Spatie Permission
- 👤 **CRUD User** - Manajemen pengguna lengkap dengan search, filter, dan pagination
- 📋 **CRUD Data Karyawan** - Manajemen data karyawan dengan semua fitur CRUD
- 🔍 **Search & Filter** - Pencarian dan filter data yang powerful
- 📄 **Pagination** - Navigasi halaman yang user-friendly
- 📊 **Export Data** - Export ke Excel dan PDF
- 📝 **Activity Log** - Tracking semua aktivitas sistem

## 🛠️ Tech Stack

- **Laravel 12** - PHP Framework
- **Blade** - Templating Engine
- **Tailwind CSS 3** - CSS Framework
- **MySQL/SQLite** - Database
- **Spatie Laravel Permission** - Role & Permission Management
- **Spatie Laravel Activitylog** - Activity Logging
- **Maatwebsite Excel** - Excel Export
- **Barryvdh DomPDF** - PDF Export
- **Pest** - Testing Framework

## 📋 Requirements

- PHP >= 8.2
- Composer
- Node.js & NPM
- MySQL atau SQLite

## 🚀 Installation

1. Clone repository:
```bash
git clone https://github.com/yourusername/admin-panel.git
cd admin-panel
```

2. Install dependencies:
```bash
composer install
npm install
```

3. Setup environment:
```bash
cp .env.example .env
php artisan key:generate
```

4. Configure database di `.env`:
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=admin_panel
DB_USERNAME=root
DB_PASSWORD=
```

5. Run migrations dan seeders:
```bash
php artisan migrate
php artisan db:seed
```

6. Build assets:
```bash
npm run build
# atau untuk development
npm run dev
```

7. Start server:
```bash
php artisan serve
```

## 👤 Default Users

Setelah menjalankan seeder, default users yang tersedia:

- **Admin**
  - Email: `admin@example.com`
  - Password: `password`

- **Staff**
  - Email: `staff@example.com`
  - Password: `password`

## 📁 Project Structure

```
admin-panel/
├── app/
│   ├── Exports/          # Excel export classes
│   ├── Http/
│   │   ├── Controllers/  # Application controllers
│   │   ├── Requests/     # Form request validation
│   │   └── Middleware/   # Custom middleware
│   └── Models/           # Eloquent models
├── database/
│   ├── factories/        # Model factories
│   ├── migrations/       # Database migrations
│   └── seeders/          # Database seeders
├── resources/
│   ├── views/            # Blade templates
│   ├── css/              # CSS files
│   └── js/               # JavaScript files
└── routes/               # Application routes
```

## 🧪 Testing

Run tests dengan Pest:
```bash
php artisan test
```

## 📝 License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

## 🙏 Credits

- [Laravel](https://laravel.com)
- [Spatie](https://spatie.be)
- [Tailwind CSS](https://tailwindcss.com)
