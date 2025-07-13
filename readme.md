**TASKFLOW**
---

```markdown
# TaskFlow

**TaskFlow** is a simple task management application built with CodeIgniter 3. It allows users to create, edit, and delete tasks. This project does **not include user authentication**, and is intended for local usage or internal development environments.

---

## 🎯 Key Features

- Task Management (CRUD)
- Task statistics on the dashboard
- Modern UI using Bootstrap 5
- Basic REST API (GET/POST/PUT/DELETE)
- Color-coded categories and priorities
- Task filtering by status, priority, and category

---

## 📦 Project Structure

```

taskflow/
├── application/
│   ├── controllers/     # Dashboard, Tasks, API
│   ├── models/          # Task\_model
│   ├── views/           # Dashboard and tasks pages
│   └── config/          # Database, routing, autoload config
├── assets/              # CSS, JS, and images
├── system/              # CodeIgniter core
├── index.php
├── composer.json
└── .gitignore

1. **Installation**:
   
	```` 
	**Clone or extract** into your local server folder (e.g., `htdocs` for XAMPP):
	```bash
	git clone https://github.com/yourusername/taskflow.git
	````

3. **Create a MySQL database** and import the initial schema:

   ```sql
   CREATE DATABASE taskflow_db;
   USE taskflow_db;

   -- Tables `tasks` and `categories` are required
   ```

4. **Edit the database configuration**:

   ```
   application/config/database.php
   ```

5. **Set the base URL**:

   ```
   application/config/config.php
   $config['base_url'] = 'http://localhost/taskflow/';
   ```

6. **Run the application** in your browser:

   ```
   http://localhost/taskflow
   ```

---

## 📌 Usage

* **Dashboard** displays overall task statistics and recent activity.
* **Task Management**:

  * Create, edit, delete tasks
  * Filter tasks by status (pending, in progress, completed), priority, or category
* **Predefined Categories**: Listed in the `categories` table
* **Status Control**: Tasks can be updated directly from the main list

---

## 🧰 Technologies Used

* PHP 7.x / 8.x
* CodeIgniter 3.x
* Bootstrap 5
* jQuery
* MySQL / MariaDB

---

## 📝 Notes

* There is no login or role-based user system.
* Ideal for prototypes, student projects, or internal tools.

---

## 🔌 API Endpoints

TaskFlow provides a few basic public API endpoints:

| Method | Endpoint          | Description              |
| ------ | ----------------- | ------------------------ |
| GET    | `/api/tasks`      | Retrieve all tasks       |
| GET    | `/api/tasks/{id}` | Retrieve a specific task |
| POST   | `/api/tasks`      | Create a new task (JSON) |
| PUT    | `/api/tasks/{id}` | Update a task (JSON)     |
| DELETE | `/api/tasks/{id}` | Delete a task            |
| GET    | `/api/stats`      | Retrieve dashboard stats |

Sample JSON body for `POST` or `PUT`:

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

* [ ] Add user authentication (Login, Admin/User roles)
* [ ] UI for category management
* [ ] Export to PDF/Excel
* [ ] Task deadline notifications (email / popup)
* [ ] Fully responsive design for mobile
* [ ] Dark mode support

Feel free to contribute and help us bring these features to life!

---

## 🤝 Contributing

Contributions are welcome! To get started:

1. Fork this repository
2. Create a new branch (`git checkout -b feature-name`)
3. Commit your changes (`git commit -m 'Add new feature'`)
4. Push your branch (`git push origin feature-name`)
5. Open a Pull Request

Please include a clear explanation of what you changed and why.

---

## 📄 License

This project is licensed under the **MIT License**.
See `license.txt` for more information.

---
