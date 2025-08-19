Science Blog – Full Stack Website Design Documentation
📌 Project Title:

SciVerse – Full Stack Science Blog

🎯 Objective:

To build a fully functional and dynamic blog platform focused on science topics using HTML/CSS for the frontend, PHP for backend logic, and MySQL for data storage. The goal is to allow users to read, publish, and manage science-related blog posts in a clean, responsive interface.

🧱 Technologies Used:

HTML5 – For semantic structure and content markup

CSS3 – For responsive and custom styling

PHP (OOP + Procedural) – Backend server-side logic

MySQL – Database for storing posts, comments, and users

Font Awesome / Google Fonts – For icons and improved typography

(Optional) JavaScript – For UI interactivity (form validation, toggles)

🗂️ Project Structure:

sciverse/

├── index.php

├── post.php

├── login.php

├── register.php

├── admin/

│   ├── dashboard.php

│   ├── add-post.php

│   ├── edit-post.php

│   └── manage-users.php

├── includes/

│   ├── db.php

│   ├── header.php

│   ├── footer.php

│   └── auth.php

├── css/

│   └── style.css

├── js/

│   └── script.js 

├── uploads/

│   └── (post images)

└── sql/

    └── database.sql

🖼️ Key Features:
1. Frontend (User Interface)

Homepage with recent blog posts and featured articles

Responsive blog card layout with post images and excerpts

Single post view (post.php) with full content, author, date, and comment section

Author info and social media sharing links

2. Backend (Admin Panel)

Secure login/register system

Admin dashboard to:

Create, edit, delete blog posts

Manage registered users and comments

File/image upload functionality for blog banners

3. Database (MySQL)

Tables for:

users (id, name, email, password, role)

posts (id, title, content, image, author_id, date)

comments (id, post_id, name, comment_text, date)

🧑‍💻 Design and UX Highlights:

Responsive Design: Mobile-first layout using flexible grid and media queries

Modular Codebase: Includes, functions, and reusable components using PHP

User Roles: Basic role-based access (admin vs reader)

Security Measures: Input sanitization, basic session management, prepared SQL statements

✅ Outcome:

A fully functional science blog platform ready for real-world use or expansion.

Demonstrates proficiency in frontend design, backend logic, and database integration.

Strong full-stack portfolio piece to showcase dynamic content management and user interactivity.
