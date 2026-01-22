# CookUp — WordPress Recipe Website

**CookUp** is a WordPress-based recipe website built as a portfolio project.  
The project includes a fully custom WordPress theme and custom plugins, developed to demonstrate practical skills in WordPress theme and plugin development.

---

## 🌍 Project Overview

CookUp is a content-driven website for publishing, browsing, and searching cooking recipes.  
It focuses on clean structure, custom functionality, and user-friendly navigation.

The repository contains:
- a **custom WordPress theme**
- **custom WordPress plugins**
- no core WordPress files (only custom development)

---
## ✨ Key Features

### 🧩 Custom Theme (CookUp Theme)
- Custom front page with hero section and latest recipes
- Recipes listing page with category-based previews
- Single recipe page with custom fields
- Category pages with category-specific search
- Search results page
- About & Contact pages
- Custom header and footer
- Newsletter subscription using Custom Post Type
- Responsive navigation (desktop & mobile)
- Font Awesome icons integration

### 🔌 Custom Plugin (Cooking Tips Plugin)
- Custom Post Type **Cooking Tips**
- Custom meta field (Tip Author)
- Widget for displaying cooking tips
- Shortcodes:
  - `[cooking_tips]` — tips list
  - `[cooking_tip_block]` — random tip block
- Custom CSS styled to match the CookUp theme

---
## 🛠 Tech Stack

- WordPress
- PHP
- HTML5
- CSS3
- JavaScript
- Advanced Custom Fields (ACF – free version)
- Font Awesome

---

## 📂 Repository Structure

```bash
cokup-wordpress-site/
├─ wp-content/
│ ├─ themes/
│ │ └─ cookup-theme/
│ │    └─ README.md
│ └─ plugins/
│    └─ cooking-tips-plugin/
│         └─ README.md
└─ README.md
````
Each theme and plugin contains its own detailed `README.md` with:

- Feature descriptions  
- Screenshots  
- Installation instructions  
- File structure  

---

## 🚀 Installation (Local)

1. Install WordPress locally (XAMPP / Local WP / MAMP)

2. Copy the theme folder:
   ```bash
   wp-content/themes/cookup-theme
	````
3. Copy the plugin folder:
	```bash
   wp-content/plugins/cooking-tips-plugin
	````
4. Activate the CookUp Theme

5. Activate the Cooking Tips Plugin

6. Install Advanced Custom Fields (ACF) (free version)

7. Add categories, recipes, and cooking tips via the admin panel

## 🎯 Purpose of the Project

This project was created as a portfolio project to demonstrate:

- Custom WordPress theme development

- Custom plugin development (CPT, widgets, shortcodes)

- Understanding of WordPress architecture

- Clean and structured PHP code

- Ability to build real-world content-based websites

## 🧾 Notes

- No WordPress core files are included in this repository

- All PHP, CSS, and JS code is custom-written

- External documentation and tutorials were used only as learning references

- The project reflects the current state of development and may be extended in the future

## 👩‍💻 Author

Developed by Eleonora Kopiika
