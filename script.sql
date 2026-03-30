CREATE EXTENSION IF NOT EXISTS pgcrypto;

CREATE TABLE IF NOT EXISTS utilisateurs (
    id SERIAL PRIMARY KEY,
    username VARCHAR(50) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS articles (
    id SERIAL PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    slug VARCHAR(255) UNIQUE NOT NULL,
    content TEXT NOT NULL,
    excerpt TEXT,
    image VARCHAR(255),
    alt_image VARCHAR(255),
    meta_title VARCHAR(255),
    meta_description VARCHAR(160),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    status VARCHAR(20) DEFAULT 'draft'
);

CREATE INDEX IF NOT EXISTS idx_articles_slug ON articles(slug);
CREATE INDEX IF NOT EXISTS idx_articles_status ON articles(status);

-- Generated with password_hash('admin', PASSWORD_DEFAULT)
INSERT INTO utilisateurs (username, password)
VALUES ('admin', '$2y$12$VnOYqGXRIOt0pUBGvgf2rusmY/JjVnpMrCLOghSqVQozmaTV7dDPK')
ON CONFLICT (username) DO NOTHING;