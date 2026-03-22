-- 1. Global Settings (Logo, Contact, SEO Default)
CREATE TABLE IF NOT EXISTS settings (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    clinic_name TEXT,
    logo TEXT,
    contact_email TEXT,
    phone_number TEXT,
    address TEXT,
    google_maps_url TEXT,
    footer_text TEXT
);

-- 2. Dental Services (RCT, Braces, etc.)
CREATE TABLE IF NOT EXISTS services (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    title TEXT NOT NULL,
    description TEXT,
    icon_path TEXT,
    slug TEXT UNIQUE
);

-- 3. Doctors Team
CREATE TABLE IF NOT EXISTS doctors (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    name TEXT NOT NULL,
    designation TEXT,
    image_path TEXT,
    bio TEXT
);

-- 4. Appointment Leads
CREATE TABLE IF NOT EXISTS appointments (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    patient_name TEXT NOT NULL,
    phone TEXT NOT NULL,
    service_requested TEXT,
    appointment_date DATE,
    problem_details TEXT,
    status TEXT DEFAULT 'Pending',
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP
);

-- 5. SEO Management (Page wise)
CREATE TABLE IF NOT EXISTS seo_meta (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    page_name TEXT UNIQUE,
    meta_title TEXT,
    meta_description TEXT,
    keywords TEXT
);

-- 6. Admin User
CREATE TABLE IF NOT EXISTS admin_users (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    username TEXT UNIQUE,
    password_hash TEXT
);
