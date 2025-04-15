# 📚 BookFlow - Library Management System

BookFlow is a modern web-based library management system built with Laravel that allows users to browse, borrow, and return books while providing administrators with powerful tools to manage the library's collection and users.

## ✨ Features

### For Users
- 👤 User authentication and profile management
- 📖 Browse available books with detailed information
- 🔍 Search and filter books
- 📱 Responsive design for mobile and desktop
- 📚 Borrow and return books
- 📋 View borrowing history
- 🔔 Real-time status updates

### For Administrators
- 🔐 Secure admin authentication
- 📊 Dashboard with library statistics
- 👥 User management
- 📚 Book inventory management
- 📝 Add/Edit/Delete books
- 👁️ Monitor borrowed books
- 🎛️ System configuration

## 🚀 Getting Started

### Prerequisites
- PHP >= 8.1
- Composer
- MySQL
- Node.js & NPM

### Installation

1. Clone the repository
```bash
git clone https://github.com/yourusername/BookFlow.git
cd BookFlow
```

2. Install PHP dependencies
```bash
composer install
```

3. Install NPM dependencies
```bash
npm install
```

4. Create and configure environment file
```bash
cp .env.example .env
php artisan key:generate
```

5. Configure your database in `.env`
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=bookflow
DB_USERNAME=your_username
DB_PASSWORD=your_password
```

6. Run migrations and seeders
```bash
php artisan migrate --seed
```

7. Build assets
```bash
npm run build
```

8. Start the development server
```bash
php artisan serve
```

## 📝 Default Credentials

### Admin Login
```
Email: admin@bookflow.com
Password: admin123
```

### Sample User Accounts
```
Email: john@example.com
Password: password123

Email: jane@example.com
Password: password123
```

## 🏗️ Project Structure

```
BookFlow/
├── app/
│   ├── Http/Controllers/    # Controllers
│   ├── Models/             # Eloquent models
│   └── ...
├── database/
│   ├── migrations/         # Database migrations
│   └── seeders/           # Database seeders
├── resources/
│   ├── views/             # Blade templates
│   ├── css/              # Stylesheets
│   └── js/               # JavaScript files
├── routes/
│   └── web.php           # Web routes
└── ...
```

## 🔄 Features in Detail

### Book Management
- Complete CRUD operations for books
- Image upload for book covers
- Book availability tracking
- Borrowing history

### User Management
- User registration and authentication
- Profile management
- Borrowing limits
- History tracking

### Admin Dashboard
- Overview of library statistics
- User management
- Book management
- Borrowing management

## 🛠️ Built With

- [Laravel](https://laravel.com/) - The PHP framework
- [Bootstrap](https://getbootstrap.com/) - Frontend framework
- [MySQL](https://www.mysql.com/) - Database
- [Vite](https://vitejs.dev/) - Frontend build tool

## 🤝 Contributing

1. Fork the Project
2. Create your Feature Branch (`git checkout -b feature/AmazingFeature`)
3. Commit your Changes (`git commit -m 'Add some AmazingFeature'`)
4. Push to the Branch (`git push origin feature/AmazingFeature`)
5. Open a Pull Request

## 📄 License

This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details.

## 👥 Authors

- Your Name - *Initial work* - [YourGithub](https://github.com/yourusername)

## 🙏 Acknowledgments

- Laravel Team for the amazing framework
- Bootstrap Team for the frontend framework
- All contributors who have helped this project grow

## 📞 Support

For support, email support@bookflow.com or create an issue in the GitHub repository.
