```markdown
# Hostel Management System (HMS)

![NIT Calicut Logo](https://www.nitc.ac.in/static/img/nitc_logo.png)

A comprehensive Hostel Room Allocation System built for National Institute of Technology Calicut (NITC) as part of a DBMS course project.

## 📌 Table of Contents
- [Project Overview](#-project-overview)
- [Features](#-features)
- [Technology Stack](#-technology-stack)
- [Installation](#-installation)
- [System Architecture](#-system-architecture)
- [Usage](#-usage)
- [Documentation](#-documentation)
- [Contributors](#-contributors)
- [License](#-license)

## 🚀 Project Overview

The Hostel Management System is designed to streamline the hostel room allocation process at NIT Calicut. It provides:
- Student registration and login
- Hostel manager/admin interface
- Room allocation and management
- Messaging system between students and administrators
- Profile management for all users

## ✨ Features

### Student Portal
- User registration and authentication
- Hostel application submission
- View allocated room details
- Message hostel administrators
- Profile management

### Admin/Manager Portal
- Student room allocation
- View allocated/empty rooms
- Process hostel applications
- Communicate with students
- Manage hostel information

## 💻 Technology Stack

### Frontend
- HTML5, CSS3, JavaScript
- Bootstrap 4
- jQuery

### Backend
- PHP
- MySQL

### Tools
- Git (Version Control)
- XAMPP (Local Server)

## 🛠️ Installation

1. **Prerequisites**:
   - XAMPP/WAMP server installed
   - PHP 7.0+
   - MySQL 5.7+

2. **Setup Instructions**:
   ```bash
   # Clone the repository
   git clone https://github.com/yourusername/Hostel-Management-System.git
   
   # Move files to XAMPP htdocs folder
   cp -r Hostel-Management-System /opt/lampp/htdocs/
   
   # Import database
   mysql -u root -p < database_schema.sql
   ```

3. **Configuration**:
   - Update database credentials in `includes/config.inc.php`
   - Ensure proper file permissions for uploads

## 🏗️ System Architecture

```
HMS/
├── web/                # Frontend assets
├── web_home/           # Homepage components
├── includes/           # PHP includes and core functions
├── admin/              # Admin panel
└── Documentation/      # Project documentation
```

## 📖 Usage

1. Access the system at `http://localhost/Hostel-Management-System`
2. Login as:
   - Student (Roll number and password)
   - Admin/Hostel Manager (Username and password)

## 📚 Documentation

Complete project documentation is available in the `Documentation/` folder:
- [SRS.md](Documentation/SRS.md) - Software Requirements Specification
- [SDD.md](Documentation/SDD.md) - System Design Document
- [UserManual.md](Documentation/UserManual.md) - User Guide

## 👥 Contributors

- [Bharat Reddy](https://www.linkedin.com/in/bharat-reddy/)
- Prajwal
- Rakesh

## 📜 License

This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details.

---

**NIT Calicut** © 2023 - Hostel Management System (DBMS Course Project)


