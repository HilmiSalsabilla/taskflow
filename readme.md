# TaskFlow

---

**TaskFlow** is a simple task management application built with CodeIgniter 3. It allows users to create, edit, and delete tasks. This project does **not include user authentication**, and is intended for local usage or internal development environments.

---

## 🎯 Key Features

- **User Authentication**: Login, registration, and role-based access (Admin/User).
- **Task Management (CRUD)**: Create, edit, delete, and view tasks.
- **Role Management**: Admin can manage user roles (Admin/User).
- **Admin Dashboard**: Admins can manage tasks and users.
- **User Management**: Admin can view and update user roles and track user activity.
- **Search**: Search for tasks and users based on specific filters.
- **Task Filtering**: Filter tasks by status (pending, in progress, completed), priority, and category.
- **Task Assignment**: Tasks can be assigned to individual users or teams (planned for future versions).
- **Task Notifications**: Email or popup notifications for task deadlines (planned for future versions).
- **Data Export**: Export task data to CSV/Excel files (planned for future versions).
- **Responsive UI**: Modern user interface built using **Bootstrap 5**.

---

## 📦 Project Structure

taskflow/
├── application/
│   ├── controllers/           # Dashboard, Tasks, Users, etc.
│   ├── models/                # Task\_model, User\_model, etc.
│   ├── views/                 # Dashboard, tasks, user management, etc.
│   └── config/                # Database, routing, autoload config
├── assets/                    # CSS, JS, and images
├── system/                    # CodeIgniter core
├── index.php
├── composer.json
└── .gitignore

---

## 📜 Installation

### 1. Clone or Extract the Project

````
---

Clone or extract the project to your local server folder (e.g., `htdocs` for XAMPP):

```bash
git clone https://github.com/HilmiSalsabilla/taskflow.git
````

### 2. Set Up Database

Create a MySQL database and import the initial schema:

```sql
CREATE DATABASE taskflow_db;
USE taskflow_db;

-- Create tables for users, tasks, and other necessary data
```

### 3. Edit Database Configuration

Configure your database connection in `application/config/database.php`:

```php
$db['default'] = array(
    'dsn'   => '',
    'hostname' => 'localhost',
    'username' => 'root',
    'password' => '',
    'database' => 'taskflow_db',
    'dbdriver' => 'mysqli',
    // ...
);
```

### 4. Set Base URL

Set the base URL in `application/config/config.php`:

```php
$config['base_url'] = 'http://localhost/taskflow/';
```

### 5. Run the Application

Now, navigate to `http://localhost/taskflow` in your browser.

---

## 📌 Usage

### Dashboard

The **Dashboard** shows overall task statistics and recent activity.

### Task Management

* Create, edit, and delete tasks.
* Filter tasks by **status**, **priority**, or **category**.
* Assign tasks to **users** or **teams**.

### User Management

* Admins can manage users, view last login, and update user roles.
* The **search functionality** allows searching for tasks and users by various criteria.

---

## 🧰 Technologies Used

* **PHP 7.x / 8.x**
* **CodeIgniter 3.x**
* **Bootstrap 5**
* **jQuery**
* **MySQL / MariaDB**

---

## 📝 Planned Improvements

* **Task Deadline Notifications**: Email or popup notifications for upcoming task deadlines.
* **Progress Tracking**: Track the progress of tasks and provide updates.
* **Export to CSV/Excel**: Export task data to CSV or Excel files.
* **Advanced Task Management**: Allow task assignment to multiple users or teams, with progress tracking and deadline management.

---

## 📡 API Endpoints

TaskFlow provides a few basic public API endpoints:

| Method | Endpoint          | Description              |
| ------ | ----------------- | ------------------------ |
| GET    | `/api/tasks`      | Retrieve all tasks       |
| GET    | `/api/tasks/{id}` | Retrieve a specific task |
| POST   | `/api/tasks`      | Create a new task (JSON) |
| PUT    | `/api/tasks/{id}` | Update a task (JSON)     |
| DELETE | `/api/tasks/{id}` | Delete a task            |
| GET    | `/api/stats`      | Retrieve dashboard stats |

**Sample JSON body for POST or PUT:**

```json
{
  "title": "Sample Task",
  "description": "Task description",
  "priority": "high",
  "category": "Development",
  "status": "pending",
  "due_date": "2025-07-30"
}
```

---

## 🛤 Roadmap

Planned improvements for future versions:

* **Task Deadline Notifications**: Email/popup notifications for upcoming task deadlines.
* **Export Tasks**: Export tasks to CSV/Excel.
* **Task Progress Tracking**: Track and update task progress.
* **Multiple User Assignments**: Assign tasks to multiple users or teams.

---

## 🤝 Contributing

Contributions are welcome! To get started:

1. Fork this repository.
2. Create a new branch (`git checkout -b feature-name`).
3. Commit your changes (`git commit -m 'Add new feature'`).
4. Push your branch (`git push origin feature-name`).
5. Open a Pull Request.

Please include a clear explanation of what you changed and why.

---

## 📄 License

This project is licensed under the **MIT License**.
See `license.txt` for more information.

---

Made with ❤️ by [Hilmi Salsabilla](https://github.com/HilmiSalsabilla)
