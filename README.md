
# Multimedia


A Wikipedia-like multimedia platform with role-based features.

---

## System Features by Role

### Client
- Manage lists
- Search articles  
- View search history  
- Like articles  
- Comment on articles  
- Customize feed  
- Manage profile  

### Editor
- Add articles  
- Edit any article  
- Delete **only their own** articles  


### Admin
- Manage users  
- Generate reports  
- Remove articles  
- Remove comments  
- View user-submitted article reports  

---

## Setup Instructions

1. Install [XAMPP](https://www.apachefriends.org/index.html).  
2. Copy the project folder into `xampp/htdocs/`.  
3. Start **Apache** and **MySQL** via the XAMPP control panel.  
4. Open your browser and go to `http://localhost/phpmyadmin`.  
5. Create a new database named `multimedia`.  
6. Import the provided `.sql` database file located in the project folder.  
7. Open `http://localhost/multimedia/views/Shared/index.php` in your browser to run the project.

---

## Project Structure

- `/models` — Data models  
- `/views` — Frontend views  
- `/controllers` — Business logic controllers  
- `/composer` — Composer dependencies  
- `/database` — Database export files  
- `/docs` — Documentation including diagrams and SRS  

---
