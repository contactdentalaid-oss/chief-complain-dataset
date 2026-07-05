<?php
/**
 * Chief Complaints Dataset Generator with Dental Support
 * A comprehensive PHP-based system for managing chief complaints including dental issues
 * This dataset is based on CDC, HCUP, BMJ research data, and dental pathology guidelines
 */

class ChiefComplaintsDataset
{
    private $dataset = [];
    private $complaintDetails = [];
    
    public function __construct()
    {
        $this->initializeDataset();
    }
    
    /**
     * Initialize the complete chief complaints dataset with dental complaints
     */
    private function initializeDataset()
    {
        $this->dataset = [
            'metadata' => [
                'version' => '3.0.0',
                'description' => 'Comprehensive Chief Complaints Dataset for Healthcare including Dental Issues',
                'language' => 'English',
                'last_updated' => date('Y-m-d'),
                'source' => 'CDC NHAMCS, HCUP, BMJ Research, Dental Pathology Guidelines',
                'total_categories' => 16,
                'total_complaints' => 280
            ],
            'chief_complaints' => [
                'pain' => [
                    'category_name' => 'Pain - General',
                    'icd_codes' => ['R52', 'R52.9'],
                    'frequency_percent' => 15.2,
                    'is_dental' => false,
                    'complaints' => [
                        'Generalized pain',
                        'Body aches',
                        'Myalgia',
                        'Arthralgia',
                        'Acute pain',
                        'Chronic pain',
                        'Nociceptive pain',
                        'Neuropathic pain',
                        'Somatic pain',
                        'Referred pain'
                    ]
                ],
                'dental' => [
                    'category_name' => 'Dental Issues',
                    'icd_codes' => ['K00', 'K01', 'K02', 'K03', 'K04', 'K05', 'K06', 'K07', 'K08', 'K09', 'K10', 'K11', 'K12', 'K13', 'K14'],
                    'frequency_percent' => 3.5,
                    'is_dental' => true,
                    'complaints' => [
                        'Tooth pain',
                        'Dental pain',
                        'Toothache',
                        'Severe toothache',
                        'Throbbing tooth pain',
                        'Sharp tooth pain',
                        'Dull tooth ache',
                        'Sensitivity to cold',
                        'Sensitivity to heat',
                        'Sensitivity to sweet',
                        'Tooth sensitivity',
                        'Cavity pain',
                        'Gum pain',
                        'Gum swelling',
                        'Gum bleeding',
                        'Bleeding gums',
                        'Gum inflammation',
                        'Gingivitis',
                        'Periodontitis',
                        'Gum recession',
                        'Receding gums',
                        'Bad breath',
                        'Halitosis',
                        'Mouth odor',
                        'Mouth ulcer',
                        'Canker sore',
                        'Oral ulcer',
                        'Aphthous ulcer',
                        'Tongue swelling',
                        'Tongue pain',
                        'Tongue ulcer',
                        'Cheek sore',
                        'Inner cheek ulcer',
                        'Palate sore',
                        'Hard palate pain',
                        'Soft palate pain',
                        'Jaw pain',
                        'Jaw stiffness',
                        'Jaw clicking',
                        'TMJ pain',
                        'Temporomandibular pain',
                        'Jaw swelling',
                        'Facial swelling dental',
                        'Cheek swelling',
                        'Lip swelling',
                        'Gum swelling and pain',
                        'Loose tooth',
                        'Tooth mobility',
                        'Broken tooth',
                        'Fractured tooth',
                        'Chipped tooth',
                        'Tooth loss',
                        'Missing tooth',
                        'Dental abscess',
                        'Tooth abscess',
                        'Gum abscess',
                        'Abscess drainage',
                        'Pus in mouth',
                        'Dental infection',
                        'Tooth infection',
                        'Root infection',
                        'Periapical infection',
                        'Dental caries',
                        'Dental decay',
                        'Tooth discoloration',
                        'Tooth staining',
                        'Tooth yellowing',
                        'Tooth whitening request',
                        'Malocclusion',
                        'Bite problems',
                        'Misaligned teeth',
                        'Crowded teeth',
                        'Orthodontic issues',
                        'Denture problems',
                        'Denture discomfort',
                        'Denture fit issues',
                        'Implant problems',
                        'Implant pain',
                        'Bridge problems',
                        'Crown problems',
                        'Crown pain',
                        'Filling pain',
                        'Filling loss',
                        'Dry socket',
                        'Post-extraction pain',
                        'Extraction site pain',
                        'Extraction bleeding',
                        'Wisdom tooth pain',
                        'Impacted wisdom tooth',
                        'Partially erupted tooth',
                        'Eruption pain',
                        'Teething pain',
                        'Mouth sores',
                        'Mucositis',
                        'Oral thrush',
                        'Yeast infection mouth',
                        'Lichen planus',
                        'Mouth lesion',
                        'Bruxism',
                        'Teeth grinding',
                        'Teeth clenching'
                    ]
                ],
                'abdominal_pain' => [
                    'category_name' => 'Abdominal Pain',
                    'icd_codes' => ['R10', 'R10.9', 'R10.0', 'R10.1', 'R10.2', 'R10.3'],
                    'frequency_percent' => 6.8,
                    'is_dental' => false,
                    'complaints' => [
                        'Abdominal pain',
                        'Upper abdominal pain',
                        'Lower abdominal pain',
                        'RUQ pain',
                        'LUQ pain',
                        'Epigastric pain',
                        'Periumbilical pain',
                        'Colicky pain',
                        'Cramping',
                        'Bloating and abdominal discomfort',
                        'Cramping and spasms',
                        'Abdominal tightness',
                        'Cramping with diarrhea'
                    ]
                ],
                'chest_pain' => [
                    'category_name' => 'Chest Pain/Discomfort',
                    'icd_codes' => ['R07', 'R07.9', 'R07.2', 'R07.1'],
                    'frequency_percent' => 5.2,
                    'is_dental' => false,
                    'complaints' => [
                        'Chest pain',
                        'Chest discomfort',
                        'Chest tightness',
                        'Chest pressure',
                        'Chest heaviness',
                        'Pleuritic chest pain',
                        'Left-sided chest pain',
                        'Right-sided chest pain',
                        'Central chest pain',
                        'Substernal pain',
                        'Palpable chest wall pain',
                        'Musculoskeletal chest pain'
                    ]
                ],
                'respiratory' => [
                    'category_name' => 'Respiratory System',
                    'icd_codes' => ['J06', 'J06.9', 'R05', 'R06'],
                    'frequency_percent' => 4.5,
                    'is_dental' => false,
                    'complaints' => [
                        'Cough',
                        'Persistent cough',
                        'Acute cough',
                        'Chronic cough',
                        'Productive cough',
                        'Dry cough',
                        'Shortness of breath',
                        'Dyspnea',
                        'Dyspnea on exertion',
                        'Orthopnea',
                        'Paroxysmal nocturnal dyspnea',
                        'Wheezing',
                        'Wheeze with cough',
                        'Hemoptysis',
                        'Bloody sputum',
                        'Throat pain',
                        'Sore throat',
                        'Pharyngitis symptoms',
                        'Hoarseness',
                        'Voice changes',
                        'Stridor',
                        'Rapid breathing',
                        'Shallow breathing'
                    ]
                ],
                'fever' => [
                    'category_name' => 'Fever & Infection Symptoms',
                    'icd_codes' => ['R50', 'R50.9'],
                    'frequency_percent' => 3.8,
                    'is_dental' => false,
                    'complaints' => [
                        'Fever',
                        'High fever',
                        'Low-grade fever',
                        'Recurrent fever',
                        'Intermittent fever',
                        'Fever of unknown origin',
                        'Chills',
                        'Rigors',
                        'Cold sweats',
                        'Night sweats',
                        'Profuse sweating',
                        'Malaise',
                        'Fatigue',
                        'Exhaustion',
                        'General weakness'
                    ]
                ],
                'injury_trauma' => [
                    'category_name' => 'Injury & Trauma',
                    'icd_codes' => ['S00', 'S10', 'S20', 'S30', 'S40', 'S50', 'S60', 'S70', 'S80', 'S90'],
                    'frequency_percent' => 28.0,
                    'is_dental' => false,
                    'complaints' => [
                        'Fall',
                        'Fall from height',
                        'Ground level fall',
                        'Motor vehicle accident',
                        'Laceration',
                        'Laceration with bleeding',
                        'Puncture wound',
                        'Contusion',
                        'Bruising',
                        'Abrasion',
                        'Fracture',
                        'Suspected fracture',
                        'Sprain',
                        'Ligament injury',
                        'Strain',
                        'Muscle tear',
                        'Crush injury',
                        'Blunt trauma',
                        'Penetrating trauma',
                        'Wound',
                        'Open wound',
                        'Burn',
                        'Thermal burn',
                        'Chemical burn',
                        'Electrical injury',
                        'Amputation',
                        'Partial amputation',
                        'Head injury',
                        'Concussion',
                        'Suspected intracranial injury',
                        'Foreign body',
                        'Impaled object'
                    ]
                ],
                'gastrointestinal' => [
                    'category_name' => 'Gastrointestinal System',
                    'icd_codes' => ['K29', 'K30', 'K58', 'K59'],
                    'frequency_percent' => 4.2,
                    'is_dental' => false,
                    'complaints' => [
                        'Nausea',
                        'Vomiting',
                        'Projectile vomiting',
                        'Blood in vomit',
                        'Hematemesis',
                        'Diarrhea',
                        'Persistent diarrhea',
                        'Bloody diarrhea',
                        'Watery diarrhea',
                        'Constipation',
                        'Inability to defecate',
                        'Dyspepsia',
                        'Indigestion',
                        'Heartburn',
                        'Acid reflux',
                        'GERD symptoms',
                        'Belching',
                        'Bloating',
                        'Abdominal distension',
                        'Flatulence',
                        'Loss of appetite',
                        'Anorexia',
                        'Difficulty swallowing',
                        'Dysphagia',
                        'Painful swallowing',
                        'Odynophagia',
                        'Rectal bleeding',
                        'Bloody stool',
                        'Melena',
                        'Constipation and abdominal pain'
                    ]
                ],
                'neurological' => [
                    'category_name' => 'Neurological System',
                    'icd_codes' => ['R51', 'R42', 'R26', 'G89'],
                    'frequency_percent' => 3.5,
                    'is_dental' => false,
                    'complaints' => [
                        'Headache',
                        'Tension headache',
                        'Migraine',
                        'Classic migraine',
                        'Common migraine',
                        'Migraine with aura',
                        'Cluster headache',
                        'Thunderclap headache',
                        'Occipital headache',
                        'Frontal headache',
                        'Temporal headache',
                        'Dizziness',
                        'Lightheadedness',
                        'Presyncope',
                        'Vertigo',
                        'Benign paroxysmal positional vertigo',
                        'Loss of consciousness',
                        'Syncope',
                        'Fainting',
                        'Seizures',
                        'Convulsions',
                        'Generalized seizure',
                        'Focal seizure',
                        'Status epilepticus',
                        'Tremors',
                        'Trembling',
                        'Shaking',
                        'Numbness',
                        'Paresthesia',
                        'Tingling',
                        'Weakness',
                        'Paralysis',
                        'Hemiplegia',
                        'Paraplegia',
                        'Memory loss',
                        'Amnesia',
                        'Confusion',
                        'Altered mental status',
                        'Disorientation',
                        'Delirium',
                        'Neck stiffness',
                        'Rigidity',
                        'Ataxia',
                        'Loss of balance',
                        'Incoordination',
                        'Slurred speech',
                        'Dysarthria',
                        'Aphasia',
                        'Speech difficulty'
                    ]
                ],
                'back_pain' => [
                    'category_name' => 'Back & Spine Pain',
                    'icd_codes' => ['M54', 'M54.5', 'M54.3'],
                    'frequency_percent' => 4.1,
                    'is_dental' => false,
                    'complaints' => [
                        'Back pain',
                        'Lower back pain',
                        'Lumbar pain',
                        'Upper back pain',
                        'Thoracic pain',
                        'Mid-back pain',
                        'Lumbosacral pain',
                        'Sacral pain',
                        'Coccydynia',
                        'Sciatica',
                        'Radicular pain',
                        'Nerve pain radiating down leg',
                        'Buttock pain',
                        'Spinal pain',
                        'Vertebral pain',
                        'Mechanical back pain',
                        'Degenerative disc disease pain',
                        'Herniated disc symptoms'
                    ]
                ],
                'cardiovascular' => [
                    'category_name' => 'Cardiovascular System',
                    'icd_codes' => ['R00', 'R01', 'I30'],
                    'frequency_percent' => 2.8,
                    'is_dental' => false,
                    'complaints' => [
                        'Palpitations',
                        'Heart palpitations',
                        'Forceful heartbeat',
                        'Irregular heartbeat',
                        'Arrhythmia',
                        'Tachycardia',
                        'Rapid heart rate',
                        'Bradycardia',
                        'Slow heart rate',
                        'Heart flutter',
                        'Fibrillation sensation',
                        'Syncope',
                        'Fainting spell',
                        'High blood pressure',
                        'Hypertensive crisis',
                        'Low blood pressure',
                        'Hypotensive episode',
                        'Edema',
                        'Swelling of legs',
                        'Swelling of feet',
                        'Peripheral edema',
                        'Swelling of extremities',
                        'Dyspnea on exertion',
                        'Chest wall edema',
                        'Facial puffiness',
                        'Ankle swelling'
                    ]
                ],
                'urinary' => [
                    'category_name' => 'Urinary System',
                    'icd_codes' => ['R30', 'R31', 'R32', 'R33'],
                    'frequency_percent' => 2.3,
                    'is_dental' => false,
                    'complaints' => [
                        'Dysuria',
                        'Painful urination',
                        'Urinary frequency',
                        'Frequent urination',
                        'Increased urinary frequency',
                        'Urinary urgency',
                        'Urge to urinate',
                        'Hematuria',
                        'Blood in urine',
                        'Red urine',
                        'Gross hematuria',
                        'Microscopic hematuria',
                        'Urinary incontinence',
                        'Loss of bladder control',
                        'Stress incontinence',
                        'Urge incontinence',
                        'Urinary retention',
                        'Inability to urinate',
                        'Oliguria',
                        'Decreased urination',
                        'Polyuria',
                        'Excessive urination',
                        'Flank pain',
                        'Kidney pain',
                        'Costovertebral angle pain',
                        'Urinary hesitancy',
                        'Difficulty starting urination',
                        'Nocturia',
                        'Waking to urinate',
                        'Cloudy urine',
                        'Strong odor urine',
                        'Foul-smelling urine'
                    ]
                ],
                'dermatological' => [
                    'category_name' => 'Dermatological System',
                    'icd_codes' => ['L20', 'L21', 'L22', 'L50'],
                    'frequency_percent' => 2.0,
                    'is_dental' => false,
                    'complaints' => [
                        'Rash',
                        'Widespread rash',
                        'Localized rash',
                        'Itching',
                        'Pruritus',
                        'Generalized itching',
                        'Skin irritation',
                        'Contact dermatitis',
                        'Eczema',
                        'Atopic dermatitis',
                        'Seborrheic dermatitis',
                        'Hives',
                        'Urticaria',
                        'Angioedema',
                        'Swelling of skin',
                        'Facial swelling',
                        'Lip swelling',
                        'Acne',
                        'Pimples',
                        'Pustules',
                        'Boils',
                        'Furuncles',
                        'Carbuncles',
                        'Abscess',
                        'Skin infection',
                        'Cellulitis',
                        'Erysipelas',
                        'Impetigo',
                        'Wounds',
                        'Slow-healing wounds',
                        'Skin ulcers',
                        'Venous ulcers',
                        'Arterial ulcers',
                        'Diabetic ulcers',
                        'Dry skin',
                        'Xerosis',
                        'Discoloration',
                        'Hyperpigmentation',
                        'Hypopigmentation',
                        'Hair loss',
                        'Alopecia',
                        'Patches of hair loss',
                        'Fungal infection',
                        'Tinea',
                        'Athlete\'s foot',
                        'Jock itch',
                        'Ringworm',
                        'Candidiasis',
                        'Yeast infection',
                        'Viral rash',
                        'Vesicular rash',
                        'Petechiae',
                        'Purpura',
                        'Ecchymosis',
                        'Bruising'
                    ]
                ],
                'reproductive' => [
                    'category_name' => 'Reproductive System',
                    'icd_codes' => ['N92', 'N93', 'N39'],
                    'frequency_percent' => 1.8,
                    'is_dental' => false,
                    'complaints' => [
                        'Menstrual irregularity',
                        'Abnormal menses',
                        'Amenorrhea',
                        'Absence of menstruation',
                        'Dysmenorrhea',
                        'Painful periods',
                        'Menstrual cramps',
                        'Vaginal bleeding',
                        'Abnormal vaginal bleeding',
                        'Vaginal discharge',
                        'Abnormal vaginal discharge',
                        'Pelvic pain',
                        'Lower abdominal pain',
                        'Dyspareunia',
                        'Painful intercourse',
                        'Breast pain',
                        'Mastalgia',
                        'Breast tenderness',
                        'Breast lumps',
                        'Nipple discharge',
                        'Bloody nipple discharge',
                        'Pelvic mass',
                        'Infertility',
                        'Sexual dysfunction',
                        'Erectile dysfunction',
                        'Testicular pain',
                        'Scrotal pain',
                        'Testicular swelling',
                        'Scrotal swelling',
                        'Penile discharge',
                        'Urethral discharge',
                        'Abnormal vaginal odor',
                        'Heavy menstrual bleeding',
                        'Menorrhagia',
                        'Metrorrhagia',
                        'Post-menopausal bleeding',
                        'Endometriosis pain',
                        'PCOS symptoms',
                        'Ovarian pain',
                        'Tubal pain'
                    ]
                ],
                'endocrine' => [
                    'category_name' => 'Endocrine System',
                    'icd_codes' => ['E10', 'E11', 'E70'],
                    'frequency_percent' => 1.5,
                    'is_dental' => false,
                    'complaints' => [
                        'Excessive thirst',
                        'Polydipsia',
                        'Excessive urination',
                        'Polyuria',
                        'Weight gain',
                        'Rapid weight gain',
                        'Weight loss',
                        'Unintentional weight loss',
                        'Fatigue',
                        'Persistent fatigue',
                        'Temperature intolerance',
                        'Cold intolerance',
                        'Heat intolerance',
                        'Temperature sensitivity',
                        'Sweating',
                        'Excessive sweating',
                        'Night sweats',
                        'Cold sweats',
                        'Hair growth abnormality',
                        'Hirsutism',
                        'Hair loss',
                        'Skin changes',
                        'Skin darkening',
                        'Mood changes',
                        'Irritability',
                        'Depression',
                        'Anxiety',
                        'Goiter',
                        'Neck swelling',
                        'Thyroid enlargement',
                        'Hormonal imbalance',
                        'Irregular periods',
                        'Hot flashes',
                        'Insomnia',
                        'Muscle weakness',
                        'Joint pain',
                        'Dry skin',
                        'Brittle nails',
                        'Constipation',
                        'Diarrhea'
                    ]
                ],
                'hematological' => [
                    'category_name' => 'Hematological System',
                    'icd_codes' => ['D64', 'D68', 'D69'],
                    'frequency_percent' => 1.2,
                    'is_dental' => false,
                    'complaints' => [
                        'Anemia',
                        'Severe anemia',
                        'Bleeding',
                        'Abnormal bleeding',
                        'Easy bruising',
                        'Bruising',
                        'Petechiae',
                        'Small red dots on skin',
                        'Ecchymosis',
                        'Large bruising',
                        'Purpura',
                        'Easy bleeding',
                        'Prolonged bleeding',
                        'Nosebleed',
                        'Epistaxis',
                        'Recurrent nosebleeds',
                        'Gum bleeding',
                        'Bleeding gums',
                        'Hemoptysis',
                        'Blood in sputum',
                        'Pale appearance',
                        'Pallor',
                        'Fatigue',
                        'Weakness',
                        'Shortness of breath',
                        'Dyspnea',
                        'Jaundice',
                        'Yellowing of skin',
                        'Yellow eyes',
                        'Dark urine',
                        'Blood clots',
                        'DVT symptoms',
                        'Swollen lymph nodes',
                        'Lymphadenopathy',
                        'Neck mass',
                        'Axillary mass',
                        'Inguinal mass',
                        'Enlarged spleen',
                        'Splenic pain',
                        'Easy fatigue',
                        'Dizzy spells',
                        'Palpitations'
                    ]
                ],
                'mental_health' => [
                    'category_name' => 'Mental Health & Psychological',
                    'icd_codes' => ['F32', 'F41', 'F43'],
                    'frequency_percent' => 2.0,
                    'is_dental' => false,
                    'complaints' => [
                        'Anxiety',
                        'Generalized anxiety',
                        'Panic attack',
                        'Panic disorder',
                        'Anxiety attack',
                        'Depression',
                        'Major depression',
                        'Depressive episode',
                        'Depressed mood',
                        'Insomnia',
                        'Inability to sleep',
                        'Sleep disturbance',
                        'Sleep problems',
                        'Excessive sleepiness',
                        'Hypersomnia',
                        'Stress',
                        'Emotional stress',
                        'Psychological stress',
                        'Post-traumatic stress',
                        'PTSD symptoms',
                        'Mood changes',
                        'Mood swings',
                        'Mood instability',
                        'Irritability',
                        'Irritable mood',
                        'Anger issues',
                        'Restlessness',
                        'Agitation',
                        'Nervous tension',
                        'Tension',
                        'Nervousness',
                        'Social withdrawal',
                        'Isolation',
                        'Reclusiveness',
                        'Loss of interest',
                        'Anhedonia',
                        'Loss of pleasure',
                        'Concentration problems',
                        'Difficulty concentrating',
                        'Poor focus',
                        'Memory problems',
                        'Difficulty remembering',
                        'Forgetfulness',
                        'Suicidal thoughts',
                        'Self-harm thoughts',
                        'Substance abuse urges',
                        'Emotional numbness',
                        'Feeling disconnected',
                        'Intrusive thoughts',
                        'Racing thoughts',
                        'Flight of ideas'
                    ]
                ],
                'other_symptoms' => [
                    'category_name' => 'Other Common Symptoms',
                    'icd_codes' => ['R50', 'R53', 'R63'],
                    'frequency_percent' => 3.5,
                    'is_dental' => false,
                    'complaints' => [
                        'Fatigue',
                        'Generalized fatigue',
                        'Persistent fatigue',
                        'Weakness',
                        'General weakness',
                        'Generalized weakness',
                        'Malaise',
                        'General malaise',
                        'Lethargy',
                        'Loss of appetite',
                        'Anorexia',
                        'Decreased appetite',
                        'Increased appetite',
                        'Polyphagia',
                        'Swelling',
                        'Generalized swelling',
                        'Edema',
                        'Lymphadenopathy',
                        'Swollen glands',
                        'Lymph node enlargement',
                        'Allergy symptoms',
                        'Allergic reaction',
                        'Anaphylaxis',
                        'Fever and chills',
                        'Severe chills',
                        'Body aches',
                        'General body pain',
                        'Muscle weakness',
                        'Severe muscle pain',
                        'Joint stiffness',
                        'Difficulty moving',
                        'Loss of appetite with nausea'
                    ]
                ]
            ],
            'severity_levels' => [
                'Mild' => ['description' => 'Minor symptoms, manageable without immediate intervention'],
                'Moderate' => ['description' => 'Noticeable symptoms, may interfere with daily activities'],
                'Severe' => ['description' => 'Significant symptoms, requires prompt medical attention'],
                'Critical' => ['description' => 'Life-threatening symptoms, requires emergency intervention']
            ],
            'onset_types' => [
                'Acute' => ['description' => 'Symptoms started within hours', 'duration' => '< 24 hours'],
                'Subacute' => ['description' => 'Symptoms started within days', 'duration' => '1-7 days'],
                'Gradual' => ['description' => 'Symptoms developed slowly over time', 'duration' => 'Weeks to months'],
                'Sudden' => ['description' => 'Symptoms appeared suddenly', 'duration' => 'Minutes'],
                'Chronic' => ['description' => 'Long-standing symptoms', 'duration' => '> 3 months'],
                'Intermittent' => ['description' => 'Symptoms come and go', 'duration' => 'Variable'],
                'Progressive' => ['description' => 'Symptoms are getting worse', 'duration' => 'Days to weeks']
            ],
            'dental_quadrants' => [
                'UL' => ['name' => 'Upper Left', 'code' => '1', 'teeth_range' => '11-18', 'teeth' => [11, 12, 13, 14, 15, 16, 17, 18]],
                'UR' => ['name' => 'Upper Right', 'code' => '2', 'teeth_range' => '21-28', 'teeth' => [21, 22, 23, 24, 25, 26, 27, 28]],
                'LL' => ['name' => 'Lower Left', 'code' => '3', 'teeth_range' => '31-38', 'teeth' => [31, 32, 33, 34, 35, 36, 37, 38]],
                'LR' => ['name' => 'Lower Right', 'code' => '4', 'teeth_range' => '41-48', 'teeth' => [41, 42, 43, 44, 45, 46, 47, 48]],
                'Multiple' => ['name' => 'Multiple Quadrants', 'code' => '5', 'teeth_range' => 'N/A', 'teeth' => []],
                'Bilateral' => ['name' => 'Bilateral', 'code' => '6', 'teeth_range' => 'N/A', 'teeth' => []]
            ],
            'associated_symptoms' => [
                'fever' => ['Chills', 'Sweating', 'Body aches', 'Fatigue', 'Loss of appetite', 'Malaise'],
                'pain' => ['Swelling', 'Redness', 'Tenderness', 'Limited movement', 'Warmth', 'Bruising'],
                'nausea' => ['Vomiting', 'Loss of appetite', 'Dizziness', 'Weakness', 'Abdominal discomfort'],
                'cough' => ['Sputum production', 'Chest pain', 'Shortness of breath', 'Throat irritation', 'Fever'],
                'headache' => ['Photophobia', 'Phonophobia', 'Nausea', 'Visual disturbance', 'Neck stiffness'],
                'dizziness' => ['Nausea', 'Imbalance', 'Weakness', 'Blurred vision', 'Palpitations'],
                'dyspnea' => ['Chest pain', 'Palpitations', 'Fatigue', 'Cough', 'Wheezing'],
                'tooth_pain' => ['Gum swelling', 'Jaw pain', 'Facial swelling', 'Fever', 'Bad breath'],
                'gum_pain' => ['Bleeding gums', 'Tooth looseness', 'Swelling', 'Fever', 'Mouth odor']
            ],
            'demographics' => [
                'age_groups' => [
                    'Pediatric' => ['label' => '0-12 years', 'code' => 'P'],
                    'Adolescent' => ['label' => '13-18 years', 'code' => 'A'],
                    'Young Adult' => ['label' => '19-35 years', 'code' => 'YA'],
                    'Middle Adult' => ['label' => '36-50 years', 'code' => 'MA'],
                    'Senior Adult' => ['label' => '51-65 years', 'code' => 'SA'],
                    'Elderly' => ['label' => '65+ years', 'code' => 'E']
                ],
                'gender' => ['Male', 'Female', 'Other'],
                'vital_signs' => [
                    'Temperature' => ['unit' => 'F/C', 'normal_min' => 98.6, 'normal_max' => 99.5],
                    'Heart Rate' => ['unit' => 'bpm', 'normal_min' => 60, 'normal_max' => 100],
                    'Respiratory Rate' => ['unit' => 'breaths/min', 'normal_min' => 12, 'normal_max' => 20],
                    'Blood Pressure' => ['unit' => 'mmHg', 'normal_systolic_max' => 120, 'normal_diastolic_max' => 80]
                ]
            ]
        ];
    }
    
    /**
     * Add dynamic details to a chief complaint
     * Supports custom parameters for any complaint
     */
    public function addComplaintDetail($complaintId, $detailType, $detailData)
    {
        if (!isset($this->complaintDetails[$complaintId])) {
            $this->complaintDetails[$complaintId] = [];
        }
        
        $this->complaintDetails[$complaintId][$detailType] = $detailData;
        
        return [
            'status' => 'success',
            'message' => 'Detail added successfully',
            'complaint_id' => $complaintId,
            'detail_type' => $detailType,
            'data' => $detailData
        ];
    }
    
    /**
     * Add pain location details (side/laterality)
     */
    public function addPainLocation($complaintId, $side = 'bilateral', $specificArea = null)
    {
        $validSides = ['left', 'right', 'bilateral', 'central', 'radiating'];
        
        if (!in_array($side, $validSides)) {
            return ['status' => 'error', 'message' => 'Invalid side. Valid options: ' . implode(', ', $validSides)];
        }
        
        $locationData = [
            'side' => $side,
            'specific_area' => $specificArea,
            'timestamp' => date('Y-m-d H:i:s')
        ];
        
        return $this->addComplaintDetail($complaintId, 'location', $locationData);
    }
    
    /**
     * Add duration information to complaint
     */
    public function addDuration($complaintId, $duration, $unit = 'days')
    {
        $validUnits = ['minutes', 'hours', 'days', 'weeks', 'months', 'years'];
        
        if (!in_array($unit, $validUnits)) {
            return ['status' => 'error', 'message' => 'Invalid unit. Valid options: ' . implode(', ', $validUnits)];
        }
        
        $durationData = [
            'value' => $duration,
            'unit' => $unit,
            'onset_date' => date('Y-m-d', strtotime("-{$duration} {$unit}")),
            'timestamp' => date('Y-m-d H:i:s')
        ];
        
        return $this->addComplaintDetail($complaintId, 'duration', $durationData);
    }
    
    /**
     * Add timing information (when symptoms occur)
     */
    public function addTiming($complaintId, $timingType, $details = [])
    {
        $validTimings = [
            'morning' => 'Symptoms occur in the morning',
            'afternoon' => 'Symptoms occur in the afternoon',
            'evening' => 'Symptoms occur in the evening',
            'night' => 'Symptoms occur at night',
            'all_day' => 'Symptoms occur all day',
            'intermittent' => 'Symptoms occur intermittently',
            'after_meals' => 'Symptoms occur after meals',
            'before_meals' => 'Symptoms occur before meals',
            'after_activity' => 'Symptoms worsen after activity',
            'rest' => 'Symptoms improve with rest',
            'sleep' => 'Symptoms affect sleep',
            'custom' => 'Custom timing'
        ];
        
        if (!isset($validTimings[$timingType])) {
            return ['status' => 'error', 'message' => 'Invalid timing type. Valid options: ' . implode(', ', array_keys($validTimings))];
        }
        
        $timingData = [
            'type' => $timingType,
            'description' => $validTimings[$timingType],
            'additional_details' => $details,
            'timestamp' => date('Y-m-d H:i:s')
        ];
        
        return $this->addComplaintDetail($complaintId, 'timing', $timingData);
    }
    
    /**
     * Add dental-specific information (quadrant, tooth, etc.)
     */
    public function addDentalInfo($complaintId, $quadrant = null, $toothNumber = null, $dentalIssueType = null)
    {
        $validQuadrants = array_keys($this->dataset['dental_quadrants']);
        
        if ($quadrant && !in_array($quadrant, $validQuadrants)) {
            return ['status' => 'error', 'message' => 'Invalid quadrant. Valid options: ' . implode(', ', $validQuadrants)];
        }
        
        $dentalData = [
            'quadrant' => $quadrant ? $this->dataset['dental_quadrants'][$quadrant] : null,
            'tooth_number' => $toothNumber,
            'issue_type' => $dentalIssueType,
            'timestamp' => date('Y-m-d H:i:s')
        ];
        
        return $this->addComplaintDetail($complaintId, 'dental_info', $dentalData);
    }
    
    /**
     * Get complete complaint details including all added information
     */
    public function getComplaintWithDetails($complaintId)
    {
        $details = isset($this->complaintDetails[$complaintId]) ? $this->complaintDetails[$complaintId] : [];
        
        return [
            'complaint_id' => $complaintId,
            'dynamic_details' => $details,
            'added_at' => date('Y-m-d H:i:s'),
            'detail_count' => count($details)
        ];
    }
    
    /**
     * Get all added details for all complaints
     */
    public function getAllComplaintDetails()
    {
        return $this->complaintDetails;
    }
    
    /**
     * Get all chief complaints
     */
    public function getAllComplaints()
    {
        return $this->dataset['chief_complaints'];
    }
    
    /**
     * Get complaints by category
     */
    public function getComplaintsByCategory($category)
    {
        return isset($this->dataset['chief_complaints'][$category]) 
            ? $this->dataset['chief_complaints'][$category] 
            : null;
    }
    
    /**
     * Get only dental complaints
     */
    public function getDentalComplaints()
    {
        $dentalComplaints = [];
        foreach ($this->dataset['chief_complaints'] as $category => $data) {
            if ($data['is_dental']) {
                $dentalComplaints[$category] = $data;
            }
        }
        return $dentalComplaints;
    }
    
    /**
     * Search for complaints by keyword
     */
    public function searchComplaints($keyword)
    {
        $results = [];
        $keyword = strtolower($keyword);
        
        foreach ($this->dataset['chief_complaints'] as $category => $data) {
            foreach ($data['complaints'] as $complaint) {
                if (stripos($complaint, $keyword) !== false) {
                    $results[] = [
                        'category' => $category,
                        'category_name' => $data['category_name'],
                        'complaint' => $complaint,
                        'icd_codes' => $data['icd_codes'],
                        'frequency_percent' => $data['frequency_percent'],
                        'is_dental' => $data['is_dental']
                    ];
                }
            }
        }
        
        return $results;
    }
    
    /**
     * Get metadata
     */
    public function getMetadata()
    {
        return $this->dataset['metadata'];
    }
    
    /**
     * Get total number of complaints
     */
    public function getTotalComplaints()
    {
        $total = 0;
        foreach ($this->dataset['chief_complaints'] as $category) {
            $total += count($category['complaints']);
        }
        return $total;
    }
    
    /**
     * Export dataset as JSON
     */
    public function exportAsJSON($includeDetails = false)
    {
        $data = $this->dataset;
        if ($includeDetails) {
            $data['complaint_details'] = $this->complaintDetails;
        }
        return json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
    }
    
    /**
     * Export dataset as CSV
     */
    public function exportAsCSV()
    {
        $csv = "Category,Complaint,ICD_Codes,Frequency_Percent,Is_Dental\n";
        
        foreach ($this->dataset['chief_complaints'] as $category => $data) {
            $icdCodes = implode(';', $data['icd_codes']);
            foreach ($data['complaints'] as $complaint) {
                $isDental = $data['is_dental'] ? 'Yes' : 'No';
                $csv .= "\"" . $data['category_name'] . "\",\"" . $complaint . "\",\"" . $icdCodes . "\"," . $data['frequency_percent'] . ",\"" . $isDental . "\"\n";
            }
        }
        
        return $csv;
    }
    
    /**
     * Get complaints by frequency (highest to lowest)
     */
    public function getByFrequency()
    {
        $categories = $this->dataset['chief_complaints'];
        usort($categories, function($a, $b) {
            return $b['frequency_percent'] <=> $a['frequency_percent'];
        });
        return $categories;
    }
    
    /**
     * Get complaints by age group
     */
    public function getComplaintsByAgeGroup($ageGroup)
    {
        $ageSpecificComplaints = [
            'P' => ['fever', 'respiratory', 'gastrointestinal', 'injury_trauma', 'dental'],
            'A' => ['mental_health', 'injury_trauma', 'pain', 'respiratory', 'dental'],
            'YA' => ['mental_health', 'pain', 'reproductive', 'cardiovascular', 'dental'],
            'MA' => ['cardiovascular', 'pain', 'abdominal_pain', 'urinary', 'dental'],
            'SA' => ['back_pain', 'cardiovascular', 'urinary', 'neurological', 'dental'],
            'E' => ['cardiovascular', 'neurological', 'hematological', 'urinary', 'dental']
        ];
        
        $categories = isset($ageSpecificComplaints[$ageGroup]) ? $ageSpecificComplaints[$ageGroup] : [];
        
        $complaints = [];
        foreach ($categories as $category) {
            if (isset($this->dataset['chief_complaints'][$category])) {
                $complaints[$category] = $this->dataset['chief_complaints'][$category];
            }
        }
        
        return $complaints;
    }
    
    /**
     * Get dental quadrants information
     */
    public function getDentalQuadrants()
    {
        return $this->dataset['dental_quadrants'];
    }
}

// =====================================================
// USAGE EXAMPLES
// =====================================================

echo "=== CHIEF COMPLAINTS DATASET v3.0.0 WITH DENTAL SUPPORT ===\n\n";

// Initialize the dataset
$dataset = new ChiefComplaintsDataset();

// Example 1: Get metadata
echo "=== DATASET INFORMATION ===\n";
$metadata = $dataset->getMetadata();
echo "Total Complaints: " . $dataset->getTotalComplaints() . "\n";
echo "Version: " . $metadata['version'] . "\n";
echo "Total Categories: " . $metadata['total_categories'] . "\n\n";

// Example 2: Get dental complaints
echo "=== DENTAL COMPLAINTS ===\n";
$dentalComplaints = $dataset->getDentalComplaints();
foreach ($dentalComplaints as $category => $data) {
    echo "Category: " . $data['category_name'] . "\n";
    echo "ICD Codes: " . implode(', ', $data['icd_codes']) . "\n";
    echo "Frequency: " . $data['frequency_percent'] . "%\n";
    echo "Sample Complaints:\n";
    for ($i = 0; $i < 5 && $i < count($data['complaints']); $i++) {
        echo "  - " . $data['complaints'][$i] . "\n";
    }
}
echo "\n";

// Example 3: Create a complaint record with dynamic details
echo "=== ADDING COMPLAINT WITH DYNAMIC DETAILS ===\n";
$complaintId = 'complaint_001';

// Add complaint to dental category
$complaint = $dataset->searchComplaints('tooth pain');
echo "Found: " . $complaint[0]['complaint'] . " (" . $complaint[0]['category_name'] . ")\n";

// Add dynamic details
$dataset->addDuration($complaintId, 3, 'days');
$dataset->addPainLocation($complaintId, 'right', 'upper molar region');
$dataset->addTiming($complaintId, 'after_meals', ['trigger' => 'hot and cold foods']);
$dataset->addDentalInfo($complaintId, 'UR', 26, 'cavity');

echo "Complaint details added successfully!\n\n";

// Example 4: Retrieve complaint with all details
echo "=== COMPLAINT RECORD WITH ALL DETAILS ===\n";
$complaintRecord = $dataset->getComplaintWithDetails($complaintId);
echo json_encode($complaintRecord, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES) . "\n\n";

// Example 5: Get dental quadrants
echo "=== DENTAL QUADRANTS REFERENCE ===\n";
$quadrants = $dataset->getDentalQuadrants();
foreach ($quadrants as $code => $quadrant) {
    echo $code . " - " . $quadrant['name'] . " (Code: " . $quadrant['code'] . ")\n";
    if (!empty($quadrant['teeth'])) {
        echo "  Tooth numbers: " . implode(', ', $quadrant['teeth']) . "\n";
    }
}
echo "\n";

// Example 6: Search for specific complaint
echo "=== SEARCH RESULTS FOR 'gum' ===\n";
$searchResults = $dataset->searchComplaints('gum');
foreach (array_slice($searchResults, 0, 3) as $result) {
    echo "- " . $result['complaint'] . " (" . $result['category_name'] . ")\n";
}
echo "\n";

// Example 7: Get by frequency
echo "=== TOP 5 COMPLAINT CATEGORIES BY FREQUENCY ===\n";
$byFrequency = $dataset->getByFrequency();
$count = 0;
foreach ($byFrequency as $category => $data) {
    echo $count + 1 . ". " . $data['category_name'] . " - " . $data['frequency_percent'] . "%\n";
    $count++;
    if ($count >= 5) break;
}
echo "\n";

// Example 8: Export options
echo "=== EXPORT OPTIONS ===\n";
echo "JSON Export available via: \$dataset->exportAsJSON()\n";
echo "CSV Export available via: \$dataset->exportAsCSV()\n";
echo "With complaint details: \$dataset->exportAsJSON(true)\n";

?>
