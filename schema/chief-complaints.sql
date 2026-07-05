-- =====================================================
-- CHIEF COMPLAINTS MASTER DATASET SCHEMA v4.0.0
-- Production-grade Hospital Information System (HIS)
-- Compatible: MySQL 8.0+, PostgreSQL 13+, SQLite 3.35+
-- =====================================================

-- =====================================================
-- 1. DEPARTMENTS MASTER
-- =====================================================
CREATE TABLE IF NOT EXISTS departments (
    id CHAR(4) PRIMARY KEY,
    name VARCHAR(100) NOT NULL UNIQUE,
    description TEXT,
    icon VARCHAR(50),
    active BOOLEAN DEFAULT true,
    display_order INT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- =====================================================
-- 2. AGE GROUPS
-- =====================================================
CREATE TABLE IF NOT EXISTS age_groups (
    id CHAR(2) PRIMARY KEY,
    label VARCHAR(50) NOT NULL UNIQUE,
    min_age INT NOT NULL,
    max_age INT NOT NULL,
    description TEXT,
    display_order INT,
    active BOOLEAN DEFAULT true,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- =====================================================
-- 3. GENDER MASTER
-- =====================================================
CREATE TABLE IF NOT EXISTS genders (
    id CHAR(1) PRIMARY KEY,
    name VARCHAR(50) NOT NULL UNIQUE,
    description TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- =====================================================
-- 4. CHIEF COMPLAINTS MASTER
-- =====================================================
CREATE TABLE IF NOT EXISTS chief_complaints (
    id CHAR(8) PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    category VARCHAR(100) NOT NULL,
    department_id CHAR(4),
    is_dental BOOLEAN DEFAULT false,
    is_emergency BOOLEAN DEFAULT false,
    description TEXT,
    min_age INT DEFAULT 0,
    max_age INT DEFAULT 120,
    gender_restriction VARCHAR(50) DEFAULT 'Both',
    active BOOLEAN DEFAULT true,
    frequency_percent DECIMAL(5, 2),
    icd_primary VARCHAR(10),
    synonyms_count INT DEFAULT 0,
    questions_count INT DEFAULT 0,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    created_by VARCHAR(100),
    updated_by VARCHAR(100),
    FOREIGN KEY (department_id) REFERENCES departments(id),
    INDEX idx_category (category),
    INDEX idx_department (department_id),
    INDEX idx_is_dental (is_dental),
    INDEX idx_active (active),
    INDEX idx_is_emergency (is_emergency),
    FULLTEXT INDEX ft_name (name)
);

-- =====================================================
-- 5. CHIEF COMPLAINT ALIASES (SYNONYMS)
-- =====================================================
CREATE TABLE IF NOT EXISTS complaint_aliases (
    id INT AUTO_INCREMENT PRIMARY KEY,
    complaint_id CHAR(8) NOT NULL,
    alias VARCHAR(255) NOT NULL,
    alias_type ENUM('synonym', 'abbreviation', 'slang', 'medical_term', 'lay_term') DEFAULT 'synonym',
    language VARCHAR(10) DEFAULT 'en',
    priority INT DEFAULT 0,
    active BOOLEAN DEFAULT true,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (complaint_id) REFERENCES chief_complaints(id) ON DELETE CASCADE,
    UNIQUE KEY unique_complaint_alias (complaint_id, alias),
    FULLTEXT INDEX ft_alias (alias),
    INDEX idx_complaint_id (complaint_id)
);

-- =====================================================
-- 6. QUESTION TEMPLATES
-- =====================================================
CREATE TABLE IF NOT EXISTS question_templates (
    id CHAR(10) PRIMARY KEY,
    complaint_id CHAR(8) NOT NULL,
    question_text VARCHAR(500) NOT NULL,
    question_type ENUM('textbox', 'textarea', 'dropdown', 'radio', 'checkbox', 'date', 'time', 'number', 'slider', 'boolean', 'multiple_select') NOT NULL,
    sequence_order INT NOT NULL,
    is_required BOOLEAN DEFAULT true,
    is_conditional BOOLEAN DEFAULT false,
    conditional_logic JSON,
    help_text TEXT,
    placeholder VARCHAR(255),
    min_value INT,
    max_value INT,
    step_value INT,
    unit VARCHAR(50),
    active BOOLEAN DEFAULT true,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (complaint_id) REFERENCES chief_complaints(id) ON DELETE CASCADE,
    INDEX idx_complaint_id (complaint_id),
    INDEX idx_sequence (complaint_id, sequence_order)
);

-- =====================================================
-- 7. QUESTION OPTIONS
-- =====================================================
CREATE TABLE IF NOT EXISTS question_options (
    id INT AUTO_INCREMENT PRIMARY KEY,
    question_template_id CHAR(10) NOT NULL,
    option_key VARCHAR(100) NOT NULL,
    option_label VARCHAR(255) NOT NULL,
    option_value VARCHAR(255),
    sequence_order INT,
    is_default BOOLEAN DEFAULT false,
    active BOOLEAN DEFAULT true,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (question_template_id) REFERENCES question_templates(id) ON DELETE CASCADE,
    UNIQUE KEY unique_question_option (question_template_id, option_key),
    INDEX idx_question_id (question_template_id)
);

-- =====================================================
-- 8. BODY LOCATIONS MASTER
-- =====================================================
CREATE TABLE IF NOT EXISTS body_locations (
    id CHAR(4) PRIMARY KEY,
    name VARCHAR(100) NOT NULL UNIQUE,
    description TEXT,
    parent_location_id CHAR(4),
    anatomical_code VARCHAR(50),
    active BOOLEAN DEFAULT true,
    display_order INT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (parent_location_id) REFERENCES body_locations(id),
    INDEX idx_parent (parent_location_id)
);

-- =====================================================
-- 9. BODY REGIONS
-- =====================================================
CREATE TABLE IF NOT EXISTS body_regions (
    id CHAR(4) PRIMARY KEY,
    region_name VARCHAR(100) NOT NULL UNIQUE,
    description TEXT,
    anatomical_system VARCHAR(100),
    icd_chapter VARCHAR(10),
    active BOOLEAN DEFAULT true,
    display_order INT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- =====================================================
-- 10. PAIN CHARACTERISTICS
-- =====================================================
CREATE TABLE IF NOT EXISTS pain_characteristics (
    id CHAR(4) PRIMARY KEY,
    characteristic VARCHAR(100) NOT NULL UNIQUE,
    description TEXT,
    category VARCHAR(50),
    active BOOLEAN DEFAULT true,
    display_order INT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- =====================================================
-- 11. PAIN SEVERITY LEVELS
-- =====================================================
CREATE TABLE IF NOT EXISTS pain_severity (
    id CHAR(2) PRIMARY KEY,
    level VARCHAR(50) NOT NULL UNIQUE,
    numeric_value INT NOT NULL UNIQUE,
    description TEXT,
    color_code VARCHAR(7),
    active BOOLEAN DEFAULT true,
    display_order INT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- =====================================================
-- 12. DURATION UNITS
-- =====================================================
CREATE TABLE IF NOT EXISTS duration_units (
    id CHAR(4) PRIMARY KEY,
    unit_name VARCHAR(50) NOT NULL UNIQUE,
    short_form VARCHAR(10),
    seconds_value INT,
    description TEXT,
    active BOOLEAN DEFAULT true,
    display_order INT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- =====================================================
-- 13. LATERALITY (SIDE/LOCATION)
-- =====================================================
CREATE TABLE IF NOT EXISTS laterality (
    id CHAR(4) PRIMARY KEY,
    value VARCHAR(50) NOT NULL UNIQUE,
    description TEXT,
    abbreviation VARCHAR(3),
    active BOOLEAN DEFAULT true,
    display_order INT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- =====================================================
-- 14. TIMING OF SYMPTOMS
-- =====================================================
CREATE TABLE IF NOT EXISTS symptom_timing (
    id CHAR(4) PRIMARY KEY,
    timing_value VARCHAR(100) NOT NULL UNIQUE,
    description TEXT,
    category VARCHAR(50),
    active BOOLEAN DEFAULT true,
    display_order INT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- =====================================================
-- 15. ONSET TYPES
-- =====================================================
CREATE TABLE IF NOT EXISTS onset_types (
    id CHAR(4) PRIMARY KEY,
    onset_value VARCHAR(100) NOT NULL UNIQUE,
    description TEXT,
    duration_category VARCHAR(50),
    typical_min_duration VARCHAR(50),
    typical_max_duration VARCHAR(50),
    active BOOLEAN DEFAULT true,
    display_order INT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- =====================================================
-- 16. ASSOCIATED SYMPTOMS
-- =====================================================
CREATE TABLE IF NOT EXISTS associated_symptoms (
    id INT AUTO_INCREMENT PRIMARY KEY,
    primary_complaint_id CHAR(8),
    associated_complaint_id CHAR(8),
    relationship_type VARCHAR(50),
    frequency_percent DECIMAL(5, 2),
    priority INT,
    active BOOLEAN DEFAULT true,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (primary_complaint_id) REFERENCES chief_complaints(id),
    FOREIGN KEY (associated_complaint_id) REFERENCES chief_complaints(id),
    UNIQUE KEY unique_association (primary_complaint_id, associated_complaint_id),
    INDEX idx_primary (primary_complaint_id)
);

-- =====================================================
-- 17. DENTAL QUADRANTS MASTER
-- =====================================================
CREATE TABLE IF NOT EXISTS dental_quadrants (
    id CHAR(3) PRIMARY KEY,
    quadrant_name VARCHAR(100) NOT NULL UNIQUE,
    code VARCHAR(3) NOT NULL UNIQUE,
    description TEXT,
    position VARCHAR(50),
    active BOOLEAN DEFAULT true,
    display_order INT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- =====================================================
-- 18. DENTAL TEETH REFERENCE (FDI NOTATION)
-- =====================================================
CREATE TABLE IF NOT EXISTS dental_teeth (
    id CHAR(3) PRIMARY KEY,
    fdi_number INT UNIQUE NOT NULL,
    tooth_name VARCHAR(100),
    tooth_type VARCHAR(50),
    quadrant_id CHAR(3),
    position_in_quadrant INT,
    permanent_decimal INT,
    primary_decimal INT,
    description TEXT,
    active BOOLEAN DEFAULT true,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (quadrant_id) REFERENCES dental_quadrants(id),
    INDEX idx_fdi (fdi_number),
    INDEX idx_quadrant (quadrant_id)
);

-- =====================================================
-- 19. DENTAL ISSUES MASTER
-- =====================================================
CREATE TABLE IF NOT EXISTS dental_issues (
    id CHAR(6) PRIMARY KEY,
    issue_name VARCHAR(100) NOT NULL UNIQUE,
    icd_code VARCHAR(10),
    description TEXT,
    category VARCHAR(50),
    severity_level VARCHAR(50),
    requires_referral BOOLEAN DEFAULT false,
    active BOOLEAN DEFAULT true,
    display_order INT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- =====================================================
-- 20. ICD-10 CODE MASTER
-- =====================================================
CREATE TABLE IF NOT EXISTS icd10_codes (
    id CHAR(10) PRIMARY KEY,
    code VARCHAR(10) NOT NULL UNIQUE,
    title VARCHAR(255) NOT NULL,
    description TEXT,
    category_code VARCHAR(5),
    parent_code VARCHAR(10),
    level INT,
    is_billable BOOLEAN DEFAULT true,
    active BOOLEAN DEFAULT true,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    INDEX idx_code (code),
    INDEX idx_category (category_code),
    FULLTEXT INDEX ft_title (title)
);

-- =====================================================
-- 21. ICD-10 MAPPING
-- =====================================================
CREATE TABLE IF NOT EXISTS icd10_mapping (
    id INT AUTO_INCREMENT PRIMARY KEY,
    complaint_id CHAR(8),
    icd_code VARCHAR(10),
    is_primary BOOLEAN DEFAULT false,
    certainty_percent DECIMAL(5, 2),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (complaint_id) REFERENCES chief_complaints(id) ON DELETE CASCADE,
    FOREIGN KEY (icd_code) REFERENCES icd10_codes(id),
    UNIQUE KEY unique_mapping (complaint_id, icd_code),
    INDEX idx_complaint (complaint_id),
    INDEX idx_icd (icd_code)
);

-- =====================================================
-- 22. AUDIT LOG
-- =====================================================
CREATE TABLE IF NOT EXISTS audit_log (
    id INT AUTO_INCREMENT PRIMARY KEY,
    entity_type VARCHAR(100) NOT NULL,
    entity_id VARCHAR(100),
    action VARCHAR(50),
    old_values JSON,
    new_values JSON,
    user_id VARCHAR(100),
    ip_address VARCHAR(45),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    INDEX idx_entity (entity_type, entity_id),
    INDEX idx_created (created_at)
);

-- =====================================================
-- INDEXES FOR PERFORMANCE
-- =====================================================
CREATE INDEX idx_chief_complaints_search ON chief_complaints(name(20), category);
CREATE INDEX idx_chief_complaints_active ON chief_complaints(active, is_emergency);
