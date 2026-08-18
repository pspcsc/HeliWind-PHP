CREATE DATABASE IF NOT EXISTS heliwind CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE heliwind;

SET SQL_MODE = 'NO_AUTO_VALUE_ON_ZERO';
START TRANSACTION;
SET time_zone = '+05:30';

CREATE TABLE IF NOT EXISTS users (
  id INT AUTO_INCREMENT PRIMARY KEY,
  full_name VARCHAR(150) NOT NULL,
  email VARCHAR(150) NOT NULL UNIQUE,
  mobile VARCHAR(20) DEFAULT NULL,
  username VARCHAR(100) NOT NULL UNIQUE,
  password VARCHAR(255) NOT NULL,
  role ENUM('Super Admin','Admin','Editor') DEFAULT 'Admin',
  profile_image VARCHAR(255) DEFAULT NULL,
  status TINYINT(1) DEFAULT 1,
  last_login DATETIME DEFAULT NULL,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO users (full_name,email,mobile,username,password,role,status)
VALUES ('Administrator','admin@heliwindenergy.com','8544247902','admin','admin123','Super Admin',1);

CREATE TABLE IF NOT EXISTS site_settings (
  id INT AUTO_INCREMENT PRIMARY KEY,
  site_name VARCHAR(200),
  tagline VARCHAR(255),
  company_name VARCHAR(255),
  email VARCHAR(150),
  phone VARCHAR(25),
  whatsapp VARCHAR(25),
  website VARCHAR(150),
  address TEXT,
  facebook VARCHAR(255),
  instagram VARCHAR(255),
  linkedin VARCHAR(255),
  youtube VARCHAR(255),
  twitter VARCHAR(255),
  logo VARCHAR(255),
  favicon VARCHAR(255),
  footer_logo VARCHAR(255),
  about_image VARCHAR(255),
  meta_title VARCHAR(255),
  meta_keywords TEXT,
  meta_description TEXT,
  google_map TEXT,
  google_analytics TEXT,
  facebook_pixel TEXT,
  copyright TEXT,
  status TINYINT(1) DEFAULT 1,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO site_settings (site_name,tagline,company_name,email,phone,whatsapp,website,address,copyright)
VALUES ('HeliWind Renewable Energy','Solar | Wind | EV Charging','HeliWind Renewable Energy','support@heliwindenergy.com','8544247902','8544247902','https://heliwindenergy.com','Ramjee Chak, Digha School Road, Opposite BSNL Telephone Exchange, Patna - 800018','© 2026 HeliWind Renewable Energy. All Rights Reserved.');

CREATE TABLE IF NOT EXISTS pages (
  id INT AUTO_INCREMENT PRIMARY KEY,
  page_name VARCHAR(150) NOT NULL,
  slug VARCHAR(150) NOT NULL UNIQUE,
  page_title VARCHAR(255),
  meta_description TEXT,
  content LONGTEXT,
  status TINYINT(1) DEFAULT 1,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS services (
  id INT AUTO_INCREMENT PRIMARY KEY,
  service_name VARCHAR(255) NOT NULL,
  slug VARCHAR(255) UNIQUE,
  short_description TEXT,
  description LONGTEXT,
  icon VARCHAR(255),
  image VARCHAR(255),
  banner VARCHAR(255),
  meta_title VARCHAR(255),
  meta_keywords TEXT,
  meta_description TEXT,
  sort_order INT DEFAULT 0,
  featured TINYINT(1) DEFAULT 0,
  status TINYINT(1) DEFAULT 1,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS projects (
  id INT AUTO_INCREMENT PRIMARY KEY,
  project_name VARCHAR(255),
  slug VARCHAR(255) UNIQUE,
  client_name VARCHAR(255),
  location VARCHAR(255),
  category VARCHAR(150),
  capacity VARCHAR(100),
  completion_date DATE,
  short_description TEXT,
  description LONGTEXT,
  thumbnail VARCHAR(255),
  banner VARCHAR(255),
  gallery TEXT,
  featured TINYINT(1) DEFAULT 0,
  status TINYINT(1) DEFAULT 1,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS testimonials (
  id INT AUTO_INCREMENT PRIMARY KEY,
  customer_name VARCHAR(255),
  company VARCHAR(255),
  designation VARCHAR(255),
  photo VARCHAR(255),
  rating INT DEFAULT 5,
  review LONGTEXT,
  featured TINYINT(1) DEFAULT 0,
  status TINYINT(1) DEFAULT 1,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS contact_enquiries (
  id INT AUTO_INCREMENT PRIMARY KEY,
  full_name VARCHAR(255),
  mobile VARCHAR(20),
  email VARCHAR(150),
  subject VARCHAR(255),
  message LONGTEXT,
  ip_address VARCHAR(50),
  enquiry_date DATETIME DEFAULT CURRENT_TIMESTAMP,
  is_read TINYINT(1) DEFAULT 0,
  status ENUM('New','In Progress','Closed') DEFAULT 'New'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS faqs (
  id INT AUTO_INCREMENT PRIMARY KEY,
  question VARCHAR(500),
  answer LONGTEXT,
  sort_order INT DEFAULT 0,
  status TINYINT(1) DEFAULT 1,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS hero_slides (
  id INT AUTO_INCREMENT PRIMARY KEY,
  title VARCHAR(255),
  subtitle TEXT,
  button_text VARCHAR(100),
  button_link VARCHAR(255),
  image VARCHAR(255),
  mobile_image VARCHAR(255),
  sort_order INT DEFAULT 1,
  status TINYINT(1) DEFAULT 1,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS partners (
  id INT AUTO_INCREMENT PRIMARY KEY,
  partner_name VARCHAR(255),
  logo VARCHAR(255),
  website VARCHAR(255),
  sort_order INT DEFAULT 0,
  status TINYINT(1) DEFAULT 1,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS gallery (
  id INT AUTO_INCREMENT PRIMARY KEY,
  title VARCHAR(255),
  category VARCHAR(150),
  cover_image VARCHAR(255),
  description TEXT,
  featured TINYINT(1) DEFAULT 0,
  status TINYINT(1) DEFAULT 1,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS gallery_images (
  id INT AUTO_INCREMENT PRIMARY KEY,
  gallery_id INT NOT NULL,
  image VARCHAR(255) NOT NULL,
  caption VARCHAR(255),
  sort_order INT DEFAULT 0,
  status TINYINT(1) DEFAULT 1,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  CONSTRAINT fk_gallery_images_gallery FOREIGN KEY (gallery_id) REFERENCES gallery(id) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS blogs (
  id INT AUTO_INCREMENT PRIMARY KEY,
  title VARCHAR(255) NOT NULL,
  slug VARCHAR(255) UNIQUE,
  short_description TEXT,
  description LONGTEXT,
  featured_image VARCHAR(255),
  author VARCHAR(150),
  publish_date DATE,
  meta_title VARCHAR(255),
  meta_keywords TEXT,
  meta_description TEXT,
  views INT DEFAULT 0,
  featured TINYINT(1) DEFAULT 0,
  status TINYINT(1) DEFAULT 1,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS certifications (
  id INT AUTO_INCREMENT PRIMARY KEY,
  title VARCHAR(255),
  certificate_no VARCHAR(100),
  issued_by VARCHAR(255),
  issue_date DATE,
  expiry_date DATE,
  certificate_image VARCHAR(255),
  description TEXT,
  status TINYINT(1) DEFAULT 1,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS newsletter (
  id INT AUTO_INCREMENT PRIMARY KEY,
  email VARCHAR(150) UNIQUE,
  subscribed_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  status TINYINT(1) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS seo_pages (
  id INT AUTO_INCREMENT PRIMARY KEY,
  page_name VARCHAR(150),
  page_url VARCHAR(255),
  meta_title VARCHAR(255),
  meta_keywords TEXT,
  meta_description TEXT,
  og_title VARCHAR(255),
  og_description TEXT,
  og_image VARCHAR(255),
  canonical_url VARCHAR(255),
  schema_markup LONGTEXT,
  status TINYINT(1) DEFAULT 1,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

COMMIT;
