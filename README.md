<p align="center">
    <a href="https://laravel.com" target="_blank">
        <img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo">
    </a>
</p>

<p align="center">
    <a href="https://github.com/laravel/framework/actions">
        <img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status">
    </a>
    <a href="https://packagist.org/packages/laravel/framework">
        <img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads">
    </a>
    <a href="https://packagist.org/packages/laravel/framework">
        <img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version">
    </a>
    <a href="https://packagist.org/packages/laravel/framework">
        <img src="https://img.shields.io/packagist/l/laravel/framework" alt="License">
    </a>
</p>

# **HMVC Laravel + Vue.js Full-Stack Application**
🚀 **Developed by:** **Eng. Hassan Gomaa**  
📌 **Repository:** [GitHub - hassangomaa/hmvc-laravel](https://github.com/hassangomaa/hmvc-laravel)  

---

## **🌟 About This Project**
This project is a **highly modular Laravel application** based on **HMVC architecture**, fully integrated with **Vue.js** for frontend interaction. It includes:
- ✅ **RESTful API**
- ✅ **Vue.js SPA (Single Page Application)**
- ✅ **Blade Views (Laravel MVC)**
- ✅ **Dockerized Development Environment**
- ✅ **Unit & Feature Testing**
- ✅ **GitHub Actions CI/CD Pipeline**
- ✅ **Full Authentication System**
- ✅ **Modular Code Structure (HMVC)**

---

## **🔹 Features**
- **🔹 HMVC Architecture**: Organized in **Modules** for better scalability.
- **🔹 Vue.js Frontend**: Uses Vue 3 (Composition API, Vue Router, Bootstrap).
- **🔹 Laravel Blade Views**: Traditional MVC with templating support.
- **🔹 API with Authentication**: Secure REST API endpoints with JWT.
- **🔹 Dockerized Setup**: Runs using Docker & Docker Compose.
- **🔹 Unit & Feature Testing**: PHPUnit & Pest for complete test coverage.
- **🔹 GitHub Actions CI/CD**: Automated testing and deployments.
- **🔹 Web & API Support**: Vue SPA & Laravel Blade co-exist.
- **🔹 Pagination & Performance Optimizations**.
- **🔹 Role-Based Access Control (RBAC)** *(Upcoming Feature).*

---

## **🛠️ Tech Stack**
| Technology  | Usage |
|-------------|----------------|
| Laravel 11  | Backend & API  |
| Vue.js 3    | Frontend (SPA) |
| Bootstrap 5 | UI Components  |
| Docker & Docker Compose | Containerized Setup |
| Nginx       | Web Server |
| MySQL       | Database |
| PHPUnit & Pest | Testing |
| GitHub Actions | CI/CD |

---

## **📂 Project Structure**
```
hmvc-laravel/
│── app/
│   ├── Modules/
│   │   ├── User/            # User Module (CRUD & Auth)
│   │   ├── Blog/            # Blog Module (CRUD)
│   │   ├── Item/            # Item Management Module
│── bootstrap/
│── config/
│── database/
│── docker/
│── public/
│── resources/
│   ├── js/
│   │   ├── components/      # Vue Components (Navbar, Forms, Tables)
│   │   ├── views/           # Vue Pages (Home, Create, Edit)
│   │   ├── router.js        # Vue Router Configuration
│   │   ├── app.js           # Vue Application Entry
│   ├── views/
│   │   ├── layouts/         # Blade Layouts
│   │   ├── home.blade.php   # Laravel Home View
│── routes/
│   ├── api.php              # API Routes
│   ├── web.php              # Web Routes (Blade & Vue)
│── tests/
│   ├── Unit/                # Unit Tests
│   ├── Feature/             # Feature Tests (API, UI)
│── .github/
│   ├── workflows/ci.yml     # GitHub Actions CI/CD Workflow
│── Dockerfile
│── docker-compose.yml
│── vite.config.js           # Vite Configuration for Vue
│── README.md
```

---

## **🛠️ Installation & Setup**
### **📌 1. Clone Repository**
```bash
git clone https://github.com/hassangomaa/hmvc-laravel.git
cd hmvc-laravel
```

### **📌 2. Docker Setup**
Ensure **Docker** & **Docker Compose** are installed, then run:
```bash
docker-compose up -d
```

### **📌 3. Configure Environment**
Copy the `.env.example` file:
```bash
cp .env.example .env
```
Then update **database credentials** to match **Docker MySQL settings**.

### **📌 4. Install Dependencies**
```bash
composer install
npm install
```

### **📌 5. Run Migrations & Seed Database**
```bash
php artisan migrate --seed
```

### **📌 6. Start Laravel Backend**
```bash
php artisan serve
```

### **📌 7. Start Vue Frontend (Vite)**
```bash
npm run dev
```

---

## **🌐 API Endpoints**
| Method | Endpoint | Description |
|--------|----------|-------------|
| **GET** | `/api/items` | Get all items (paginated) |
| **POST** | `/api/items` | Create a new item |
| **GET** | `/api/items/{id}` | Get item details |
| **PUT** | `/api/items/{id}` | Update item |
| **DELETE** | `/api/items/{id}` | Delete item |

---

## **🛠️ Running Tests**
### **✅ Unit & Feature Tests**
Run all tests:
```bash
php artisan test
```

Run a specific test:
```bash
php artisan test --filter ItemTest
```

---

## **🐳 Docker Configuration**
### **📌 Docker-Compose Services**

---

## **🚀 CI/CD with GitHub Actions**
GitHub Actions is configured to **run tests on every push**.

📌 **`.github/workflows/ci.yml`**

---

## **🎯 Conclusion**
This **HMVC Laravel + Vue.js project** is designed for **scalability, performance, and modularity**. With **API-driven architecture, Docker support, testing, and CI/CD**, it’s ready for **production deployment**.

🚀 **Developed & Maintained by:**  
**Eng. Hassan Gomaa**  
📍 GitHub: [hassangomaa](https://github.com/hassangomaa)  

---

🔥 **Enjoy building with HMVC Laravel + Vue.js!** 🚀
