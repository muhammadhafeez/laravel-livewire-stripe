
# About This Project

Welcome to the **Simple Laravel Livewire Project**! This project utilizes **Laravel** and **Livewire** to create interactive, dynamic user interfaces with minimal JavaScript. Livewire allows you to build modern, reactive applications with the power of Laravel without writing a lot of custom JavaScript.

---

## Requirements

Before you begin, make sure your development environment meets the following requirements:

- **PHP >= 8.1**
- **Composer** (for managing PHP dependencies)
- **Laravel >= 11**
- **Node.js** *(optional, required only if using Livewire with Alpine.js or other front-end dependencies)*

---

## Installation Instructions

Follow the steps below to set up the project on your local machine:

### 1. **Install PHP Dependencies**

In your project directory, run the following command to install the PHP dependencies listed in `composer.json`:

```bash
composer install
```

### 2. **Install JavaScript Dependencies** (Optional)

If your project uses JavaScript libraries like **Alpine.js** or other front-end dependencies, you need to install the JavaScript packages.

Run the following command in your project directory:

```bash
npm install
```


### 3. **Run the Project Locally**

Once the dependencies are installed, you can run your application on a local server.

To start the development server, run:

```bash
php artisan serve
```

This will launch the application at `http://localhost:8000` (or the URL shown in your terminal).
