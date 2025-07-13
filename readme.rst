```markdown
# TaskFlow

**TaskFlow** is a simple task management system built with CodeIgniter 3. It allows users to create, edit, and delete tasks, and provides basic statistics through a dashboard. This project does not include authentication, and is intended for internal or educational use.

---

## 🚀 Features

- Task management (Create, Read, Update, Delete)
- Dashboard with task statistics
- Category and priority color labels
- Task filtering by status, priority, and category
- Basic JSON API for integration
- Bootstrap 5 responsive design

---

## 📁 Project Structure

```

taskflow/
├── application/
│   ├── controllers/
│   ├── models/
│   ├── views/
│   └── config/
├── assets/
├── system/
├── index.php
├── composer.json
└── .gitignore

````

---

## ⚙️ Installation

1. **Clone or download** this repository into your local server directory (e.g. `htdocs/` for XAMPP):

   ```bash
   git clone https://github.com/yourusername/taskflow.git
````

2. **Create a database** in MySQL and import the schema:

   ```sql
   CREATE DATABASE taskflow_db;
   -- Tables for `tasks` and `categories` are required
   ```

3. **Configure the database** in:

   ```
   application/config/database.php
   ```

4. **Set the base URL** in:

   ```
   application/config/config.php
   $config['base_url'] = 'http://localhost/taskflow/';
   ```

5. **Run the project** in your browser:

   ```
   http://localhost/taskflow
   ```

---

## 📌 Usage

* **Dashboard** shows total tasks, status overview, and recent tasks.
* **Tasks page** allows you to:

  * Create new tasks
  * Filter by status, priority, or category
  * Update status directly from task list
  * Edit or delete tasks

> Note: All features are public — there is no login or role-based access yet.

---

## 🔌 API Endpoints

| Method | Endpoint          | Description              |
| ------ | ----------------- | ------------------------ |
| GET    | `/api/tasks`      | Get all tasks            |
| GET    | `/api/tasks/{id}` | Get a specific task      |
| POST   | `/api/tasks`      | Create a new task        |
| PUT    | `/api/tasks/{id}` | Update a task            |
| DELETE | `/api/tasks/{id}` | Delete a task            |
| GET    | `/api/stats`      | Get dashboard statistics |

Example JSON for POST/PUT:

```json
{
  "title": "Sample Task",
  "description": "Details about the task",
  "priority": "high",
  "category": "Development",
  "status": "pending",
  "due_date": "2025-07-30"
}
```

---

## 🧠 Tech Stack

* PHP 7.x / 8.x
* CodeIgniter 3.x
* MySQL / MariaDB
* Bootstrap 5
* jQuery

---

## 🛤 Roadmap

Planned features for future development:

* [ ] User authentication system
* [ ] Role-based access (Admin/User)
* [ ] UI for managing categories
* [ ] Task export to PDF/Excel
* [ ] Notification for upcoming deadlines
* [ ] Fully responsive mobile view
* [ ] Dark mode

---

## 🤝 Contributing

Want to contribute? Great! Here's how:

1. Fork this repository
2. Create a new branch: `git checkout -b feature-name`
3. Commit your changes: `git commit -m 'Add feature'`
4. Push to your branch: `git push origin feature-name`
5. Open a Pull Request

We appreciate clean, documented code and clear descriptions of what you've done.

---

## 📄 License

This project is licensed under the **MIT License**. See `license.txt` for full details.

```
