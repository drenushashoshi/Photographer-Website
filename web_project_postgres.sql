-- PostgreSQL database schema for web_project

-- Enable UUID extension
CREATE EXTENSION IF NOT EXISTS "uuid-ossp";

-- Create tables
CREATE TABLE contact_form_data (
    id SERIAL PRIMARY KEY,
    first_name VARCHAR(50) NOT NULL,
    last_name VARCHAR(50) NOT NULL,
    fiance_first_name VARCHAR(50) NOT NULL,
    fiance_last_name VARCHAR(50) NOT NULL,
    email VARCHAR(100) NOT NULL,
    phone VARCHAR(20) NOT NULL,
    event_date DATE NOT NULL,
    event_type VARCHAR(20) NOT NULL,
    event_location VARCHAR(255) NOT NULL,
    guests VARCHAR(20) NOT NULL,
    love_story TEXT NOT NULL,
    contact_method VARCHAR(20) NOT NULL,
    how_found VARCHAR(20) NOT NULL
);

CREATE TABLE newsletter_subscribers (
    id SERIAL PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL UNIQUE
);

CREATE TABLE portofolio (
    id SERIAL PRIMARY KEY,
    image_path VARCHAR(255) NOT NULL,
    description TEXT NOT NULL,
    last_edited_by INTEGER,
    added_by INTEGER
);

CREATE TABLE portofolio_couples (
    id SERIAL PRIMARY KEY,
    image_path VARCHAR(100) NOT NULL,
    description VARCHAR(200) NOT NULL,
    last_edited_by INTEGER,
    added_by INTEGER
);

CREATE TABLE portofolio_nature (
    id SERIAL PRIMARY KEY,
    image_path VARCHAR(100) NOT NULL,
    description VARCHAR(200) NOT NULL,
    last_edited_by INTEGER,
    added_by INTEGER
);

CREATE TABLE portofolio_weddings (
    id SERIAL PRIMARY KEY,
    description VARCHAR(255),
    image_path VARCHAR(255),
    last_edited_by INTEGER,
    added_by INTEGER
);

CREATE TABLE "user" (
    id SERIAL PRIMARY KEY,
    name VARCHAR(20) NOT NULL,
    surname VARCHAR(30) NOT NULL,
    age INTEGER NOT NULL,
    email VARCHAR(20) NOT NULL,
    password VARCHAR(20) NOT NULL,
    roli VARCHAR(20) NOT NULL DEFAULT 'user'
);

-- Add foreign key constraints
ALTER TABLE portofolio_weddings
    ADD CONSTRAINT fk_last_edited_by
    FOREIGN KEY (last_edited_by)
    REFERENCES "user" (id)
    ON DELETE SET NULL;

-- Insert sample data (optional)
INSERT INTO "user" (name, surname, age, email, password, roli) VALUES
('Ela', 'Doe', 29, 'eladoe@gmail.com', 'elaa123', 'admin'),
('Drena', 'Shoshi', 28, 'drenashoshi@gmail.com', 'drena123', 'admin');

-- Add indexes
CREATE INDEX idx_contact_form_email ON contact_form_data(email);
CREATE INDEX idx_newsletter_email ON newsletter_subscribers(email);
CREATE INDEX idx_user_email ON "user"(email); 