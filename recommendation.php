<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AgriGrow AI - Crop Recommendations</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --primary: #4CAF50;
            --primary-dark: #388E3C;
            --secondary: #FF9800;
            --dark: #2E7D32;
            --light: #E8F5E9;
            --gray: #f5f5f5;
            --text: #212121;
            --text-light: #757575;
        }
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        
        body {
            background-color: #f8f9fa;
            color: var(--text);
            line-height: 1.6;
        }
        
        .container {
            width: 100%;
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }
        
        /* Header Styles (Same as main page) */
        header {
            background: linear-gradient(to right, var(--primary), var(--primary-dark));
            color: white;
            padding: 15px 0;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            position: sticky;
            top: 0;
            z-index: 100;
        }
        
        .header-content {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        
        .logo {
            display: flex;
            align-items: center;
            gap: 10px;
        }
        
        .logo i {
            font-size: 28px;
        }
        
        .logo h1 {
            font-size: 24px;
            font-weight: 600;
        }
        
        nav ul {
            display: flex;
            list-style: none;
            gap: 25px;
        }
        
        nav a {
            color: white;
            text-decoration: none;
            font-weight: 500;
            transition: opacity 0.3s;
        }
        
        nav a:hover {
            opacity: 0.8;
        }
        
        .header-right {
            display: flex;
            align-items: center;
            gap: 15px;
        }
        
        .language-selector {
            position: relative;
            display: inline-block;
        }
        
        .language-button {
            background: rgba(255, 255, 255, 0.2);
            border: none;
            color: white;
            padding: 8px 15px;
            border-radius: 4px;
            cursor: pointer;
            display: flex;
            align-items: center;
            gap: 8px;
            transition: background 0.3s;
        }
        
        .language-button:hover {
            background: rgba(255, 255, 255, 0.3);
        }
        
        .language-dropdown {
            position: absolute;
            top: 100%;
            right: 0;
            background: white;
            border-radius: 4px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            width: 160px;
            z-index: 1000;
            display: none;
            margin-top: 5px;
        }
        
        .language-dropdown.show {
            display: block;
        }
        
        .language-option {
            padding: 12px 15px;
            display: flex;
            align-items: center;
            gap: 10px;
            cursor: pointer;
            transition: background 0.3s;
            color: var(--text);
            text-decoration: none;
        }
        
        .language-option:hover {
            background: var(--light);
        }
        
        .language-option.active {
            background: var(--light);
            color: var(--primary);
            font-weight: 500;
        }
        
        .auth-buttons {
            display: flex;
            gap: 15px;
        }
        
        .btn {
            padding: 8px 20px;
            border-radius: 4px;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.3s;
            border: none;
        }
        
        .btn-outline {
            background: transparent;
            border: 1px solid white;
            color: white;
        }
        
        .btn-primary {
            background: var(--secondary);
            color: white;
        }
        
        .btn:hover {
            opacity: 0.9;
            transform: translateY(-2px);
        }
        
        /* Hero Section */
        .hero {
            background: url('https://images.unsplash.com/photo-1500937386664-56d1dfef3854?ixlib=rb-4.0.3&auto=format&fit=crop&w=2000&q=80') no-repeat center center/cover;
            padding: 80px 0;
            color: white;
            text-align: center;
            position: relative;
        }
        
        .hero::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.6);
        }
        
        .hero-content {
            position: relative;
            max-width: 800px;
            margin: 0 auto;
        }
        
        .hero h2 {
            font-size: 2.8rem;
            margin-bottom: 20px;
        }
        
        .hero p {
            font-size: 1.2rem;
            margin-bottom: 30px;
            opacity: 0.9;
        }
        
        /* Form Section */
        .recommendation-form {
            padding: 60px 0;
            background-color: white;
        }
        
        .section-title {
            text-align: center;
            margin-bottom: 40px;
            color: var(--dark);
        }
        
        .form-container {
            background: var(--light);
            border-radius: 10px;
            padding: 30px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
        }
        
        .form-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 20px;
            margin-bottom: 25px;
        }
        
        .form-group {
            margin-bottom: 20px;
        }
        
        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-weight: 500;
            color: var(--dark);
        }
        
        .form-control {
            width: 100%;
            padding: 12px 15px;
            border: 1px solid #ddd;
            border-radius: 6px;
            font-size: 16px;
            transition: border-color 0.3s;
        }
        
        .form-control:focus {
            outline: none;
            border-color: var(--primary);
            box-shadow: 0 0 0 2px rgba(76, 175, 80, 0.2);
        }
        
        .form-submit {
            text-align: center;
            margin-top: 30px;
        }
        
        .btn-large {
            padding: 12px 30px;
            font-size: 18px;
        }
        
        /* Results Section */
        .results-section {
            padding: 60px 0;
            display: none;
        }
        
        .ai-processing {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 15px;
            margin-bottom: 30px;
            background: var(--light);
            padding: 20px;
            border-radius: 8px;
        }
        
        .ai-icon {
            font-size: 24px;
            color: var(--primary);
        }
        
        .results-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 25px;
        }
        
        .result-card {
            background: white;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
            transition: transform 0.3s;
        }
        
        .result-card:hover {
            transform: translateY(-5px);
        }
        
        .result-header {
            background: var(--primary);
            color: white;
            padding: 15px 20px;
            font-weight: 500;
            display: flex;
            align-items: center;
            gap: 10px;
        }
        
        .result-body {
            padding: 20px;
        }
        
        .fertilizer-item, .pesticide-item {
            padding: 15px 0;
            border-bottom: 1px solid #eee;
        }
        
        .fertilizer-item:last-child, .pesticide-item:last-child {
            border-bottom: none;
        }
        
        .product-name {
            font-weight: 600;
            color: var(--primary-dark);
            margin-bottom: 5px;
        }
        
        .product-desc {
            color: var(--text-light);
            font-size: 0.9rem;
            margin-bottom: 8px;
        }
        
        .product-dosage {
            display: flex;
            justify-content: space-between;
            color: var(--dark);
            font-size: 0.9rem;
        }
        
        .source-info {
            margin-top: 10px;
            font-size: 0.8rem;
            color: var(--text-light);
            font-style: italic;
        }
        
        /* Loading Animation */
        .loader {
            width: 20px;
            height: 20px;
            border: 3px solid rgba(255, 255, 255, 0.3);
            border-radius: 50%;
            border-top-color: white;
            animation: spin 1s ease-in-out infinite;
        }
        
        @keyframes spin {
            to { transform: rotate(360deg); }
        }
        
        /* Footer */
        footer {
            background: var(--dark);
            color: white;
            padding: 40px 0 20px;
        }
        
        .footer-content {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 30px;
            margin-bottom: 30px;
        }
        
        .footer-column h3 {
            font-size: 1.2rem;
            margin-bottom: 20px;
            position: relative;
            padding-bottom: 10px;
        }
        
        .footer-column h3::after {
            content: '';
            position: absolute;
            left: 0;
            bottom: 0;
            width: 40px;
            height: 2px;
            background: var(--secondary);
        }
        
        .footer-column ul {
            list-style: none;
        }
        
        .footer-column ul li {
            margin-bottom: 10px;
        }
        
        .footer-column a {
            color: #ccc;
            text-decoration: none;
            transition: color 0.3s;
        }
        
        .footer-column a:hover {
            color: white;
        }
        
        .copyright {
            text-align: center;
            padding-top: 20px;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            font-size: 0.9rem;
            color: #ccc;
        }
        
        /* Responsive Design */
        @media (max-width: 768px) {
            .header-content {
                flex-direction: column;
                gap: 15px;
            }
            
            nav ul {
                gap: 15px;
                flex-wrap: wrap;
                justify-content: center;
            }
            
            .header-right {
                flex-direction: column;
                gap: 10px;
            }
            
            .hero h2 {
                font-size: 2rem;
            }
            
            .hero p {
                font-size: 1rem;
            }
            
            .form-grid {
                grid-template-columns: 1fr;
            }
            
            .results-container {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>
    <!-- Header -->
    <header>
        <div class="container">
            <div class="header-content">
                <div class="logo">
                    <i class="fas fa-seedling"></i>
                    <h1 data-translate="app_name">AgriGrow AI</h1>
                </div>
                <nav>
                    <ul>
                        <li><a href="project.php" data-translate="nav_home">Home</a></li>
                        <li><a href="prediction.php" data-translate="nav_predictions">Predictions</a></li>
                        <li><a href="#" data-translate="nav_history">History</a></li>
                    </ul>
                </nav>
                <div class="header-right">
                    <div class="language-selector">
                        <button class="language-button">
                            <i class="fas fa-globe"></i>
                            <span id="current-language">English</span>
                            <i class="fas fa-chevron-down"></i>
                        </button>
                        <div class="language-dropdown">
                            <a href="#" class="language-option active" data-lang="en">
                                <i class="fas fa-check"></i>
                                <span>English</span>
                            </a>
                            <a href="#" class="language-option" data-lang="hi">
                                <i class="fas fa-check"></i>
                                <span>हिन्दी</span>
                            </a>
                            <a href="#" class="language-option" data-lang="or">
                                <i class="fas fa-check"></i>
                                <span>ଓଡ଼ିଆ</span>
                            </a>
                        </div>
                    </div>
                    <div class="auth-buttons">
                        <button class="btn btn-outline" data-translate="btn_sign_in">Sign In</button>
                        <button class="btn btn-primary" data-translate="btn_register">Register</button>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Hero Section -->
    <section class="hero">
        <div class="container">
            <div class="hero-content">
                <h2 data-translate="hero_title">AI-Powered Crop Recommendations</h2>
                <p data-translate="hero_subtitle">Get personalized fertilizer and pesticide recommendations based on your specific crop, soil conditions, and location.</p>
            </div>
        </div>
    </section>

    <!-- Recommendation Form Section -->
    <section class="recommendation-form">
        <div class="container">
            <h2 class="section-title" data-translate="form_title">Enter Your Crop Details</h2>
            <div class="form-container">
                <form id="crop-form">
                    <div class="form-grid">
                        <div class="form-group">
                            <label for="crop-name" data-translate="label_crop_name">Crop Name</label>
                            <input type="text" class="form-control" id="crop-name" placeholder="Enter crop name (e.g., Corn, Wheat, Rice)" required data-translate-placeholder="placeholder_crop_name">
                        </div>
                        
                        <div class="form-group">
                            <label for="soil-type" data-translate="label_soil_type">Soil Type</label>
                            <select class="form-control" id="soil-type" required>
                                <option value="" data-translate="option_select_soil">Select Soil Type</option>
                                <option value="sandy" data-translate="option_sandy">Sandy</option>
                                <option value="loamy" data-translate="option_loamy">Loamy</option>
                                <option value="clay" data-translate="option_clay">Clay</option>
                                <option value="silt" data-translate="option_silt">Silt</option>
                                <option value="peat" data-translate="option_peat">Peat</option>
                                <option value="chalky" data-translate="option_chalky">Chalky</option>
                            </select>
                        </div>
                    </div>
                    
                    <div class="form-grid">
                        <div class="form-group">
                            <label for="region" data-translate="label_region">Region/State</label>
                            <input type="text" class="form-control" id="region" placeholder="Enter your region" required data-translate-placeholder="placeholder_region">
                        </div>
                        
                        <div class="form-group">
                            <label for="area" data-translate="label_area">Area (acres)</label>
                            <input type="number" class="form-control" id="area" placeholder="Enter area in acres" min="1" required data-translate-placeholder="placeholder_area">
                        </div>
                    </div>
                    
                    <div class="form-grid">
                        <div class="form-group">
                            <label for="ph-level" data-translate="label_ph">Soil pH Level</label>
                            <input type="number" class="form-control" id="ph-level" placeholder="Enter pH value (0-14)" min="0" max="14" step="0.1" required data-translate-placeholder="placeholder_ph">
                        </div>
                        
                        <div class="form-group">
                            <label for="season" data-translate="label_season">Growing Season</label>
                            <select class="form-control" id="season" required>
                                <option value="" data-translate="option_select_season">Select Season</option>
                                <option value="spring" data-translate="option_spring">Spring</option>
                                <option value="summer" data-translate="option_summer">Summer</option>
                                <option value="monsoon" data-translate="option_monsoon">Monsoon</option>
                                <option value="autumn" data-translate="option_autumn">Autumn</option>
                                <option value="winter" data-translate="option_winter">Winter</option>
                            </select>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="issues" data-translate="label_issues">Specific Issues (if any)</label>
                        <textarea class="form-control" id="issues" rows="3" placeholder="E.g., yellowing leaves, pest infestation, etc." data-translate-placeholder="placeholder_issues"></textarea>
                    </div>
                    
                    <div class="form-submit">
                        <button type="submit" class="btn btn-primary btn-large">
                            <i class="fas fa-robot"></i> <span data-translate="btn_get_recommendations">Get AI Recommendations</span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </section>

    <!-- Results Section -->
    <section class="results-section" id="results-section">
        <div class="container">
            <div class="ai-processing">
                <div class="ai-icon">
                    <i class="fas fa-brain"></i>
                </div>
                <div class="ai-text">
                    <p data-translate="ai_processing">AgriGrow AI is analyzing thousands of data points to provide the best recommendations for your crop...</p>
                </div>
                <div class="loader"></div>
            </div>
            
            <h2 class="section-title" data-translate="results_title">Personalized Recommendations</h2>
            
            <div class="results-container">
                <div class="result-card">
                    <div class="result-header">
                        <i class="fas fa-vial"></i>
                        <span data-translate="fertilizer_title">Recommended Fertilizers</span>
                    </div>
                    <div class="result-body" id="fertilizer-results">
                        <!-- Fertilizer results will be populated here -->
                    </div>
                </div>
                
                <div class="result-card">
                    <div class="result-header">
                        <i class="fas fa-bug"></i>
                        <span data-translate="pesticide_title">Recommended Pesticides</span>
                    </div>
                    <div class="result-body" id="pesticide-results">
                        <!-- Pesticide results will be populated here -->
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer>
        <div class="container">
            <div class="footer-content">
                <div class="footer-column">
                    <h3 data-translate="footer_company">AgriGrow AI</h3>
                    <p data-translate="footer_description">Harnessing the power of artificial intelligence to transform agriculture and improve food security worldwide.</p>
                </div>
                
                <div class="footer-column">
                    <h3 data-translate="footer_quick_links">Quick Links</h3>
                    <ul>
                        <li><a href="#" data-translate="footer_about">About Us</a></li>
                        <li><a href="#" data-translate="footer_how_it_works">How It Works</a></li>
                        <li><a href="#" data-translate="footer_pricing">Pricing</a></li>
                        <li><a href="#" data-translate="footer_contact">Contact</a></li>
                    </ul>
                </div>
                
                <div class="footer-column">
                    <h3 data-translate="footer_resources">Resources</h3>
                    <ul>
                        <li><a href="#" data-translate="footer_blog">Blog</a></li>
                        <li><a href="#" data-translate="footer_case_studies">Case Studies</a></li>
                        <li><a href="#" data-translate="footer_guide">Farmers Guide</a></li>
                        <li><a href="#" data-translate="footer_support">Support Center</a></li>
                    </ul>
                </div>
                
                <div class="footer-column">
                    <h3 data-translate="footer_connect">Connect With Us</h3>
                    <ul>
                        <li><a href="#"><i class="fab fa-facebook"></i> <span data-translate="footer_facebook">Facebook</span></a></li>
                        <li><a href="#"><i class="fab fa-twitter"></i> <span data-translate="footer_twitter">Twitter</span></a></li>
                        <li><a href="#"><i class="fab fa-instagram"></i> <span data-translate="footer_instagram">Instagram</span></a></li>
                        <li><a href="#"><i class="fab fa-linkedin"></i> <span data-translate="footer_linkedin">LinkedIn</span></a></li>
                    </ul>
                </div>
            </div>
            
            <div class="copyright">
                <p data-translate="footer_copyright">&copy; 2023 AgriGrow AI. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.getElementById('crop-form');
            const resultsSection = document.getElementById('results-section');
            const fertilizerResults = document.getElementById('fertilizer-results');
            const pesticideResults = document.getElementById('pesticide-results');
            
            // Language translations
            const translations = {
                'en': {
                    'app_name': 'AgriGrow AI',
                    'nav_home': 'Home',
                    'nav_predictions': 'Predictions',
                    'nav_history': 'History',
                    'btn_sign_in': 'Sign In',
                    'btn_register': 'Register',
                    'hero_title': 'AI-Powered Crop Recommendations',
                    'hero_subtitle': 'Get personalized fertilizer and pesticide recommendations based on your specific crop, soil conditions, and location.',
                    'form_title': 'Enter Your Crop Details',
                    'label_crop_name': 'Crop Name',
                    'placeholder_crop_name': 'Enter crop name (e.g., Corn, Wheat, Rice)',
                    'label_soil_type': 'Soil Type',
                    'option_select_soil': 'Select Soil Type',
                    'option_sandy': 'Sandy',
                    'option_loamy': 'Loamy',
                    'option_clay': 'Clay',
                    'option_silt': 'Silt',
                    'option_peat': 'Peat',
                    'option_chalky': 'Chalky',
                    'label_region': 'Region/State',
                    'placeholder_region': 'Enter your region',
                    'label_area': 'Area (acres)',
                    'placeholder_area': 'Enter area in acres',
                    'label_ph': 'Soil pH Level',
                    'placeholder_ph': 'Enter pH value (0-14)',
                    'label_season': 'Growing Season',
                    'option_select_season': 'Select Season',
                    'option_spring': 'Spring',
                    'option_summer': 'Summer',
                    'option_monsoon': 'Monsoon',
                    'option_autumn': 'Autumn',
                    'option_winter': 'Winter',
                    'label_issues': 'Specific Issues (if any)',
                    'placeholder_issues': 'E.g., yellowing leaves, pest infestation, etc.',
                    'btn_get_recommendations': 'Get AI Recommendations',
                    'ai_processing': 'AgriGrow AI is analyzing thousands of data points to provide the best recommendations for your crop...',
                    'results_title': 'Personalized Recommendations',
                    'fertilizer_title': 'Recommended Fertilizers',
                    'pesticide_title': 'Recommended Pesticides',
                    'footer_company': 'AgriGrow AI',
                    'footer_description': 'Harnessing the power of artificial intelligence to transform agriculture and improve food security worldwide.',
                    'footer_quick_links': 'Quick Links',
                    'footer_about': 'About Us',
                    'footer_how_it_works': 'How It Works',
                    'footer_pricing': 'Pricing',
                    'footer_contact': 'Contact',
                    'footer_resources': 'Resources',
                    'footer_blog': 'Blog',
                    'footer_case_studies': 'Case Studies',
                    'footer_guide': 'Farmers Guide',
                    'footer_support': 'Support Center',
                    'footer_connect': 'Connect With Us',
                    'footer_facebook': 'Facebook',
                    'footer_twitter': 'Twitter',
                    'footer_instagram': 'Instagram',
                    'footer_linkedin': 'LinkedIn',
                    'footer_copyright': '© 2023 AgriGrow AI. All rights reserved.'
                },
                'hi': {
                    'app_name': 'एग्रीग्रो एआई',
                    'nav_home': 'होम',
                    'nav_predictions': 'भविष्यवाणियाँ',
                    'nav_history': 'इतिहास',
                    'btn_sign_in': 'साइन इन',
                    'btn_register': 'रजिस्टर',
                    'hero_title': 'एआई-संचालित फसल सिफारिशें',
                    'hero_subtitle': 'अपनी विशिष्ट फसल, मिट्टी की स्थिति और स्थान के आधार पर व्यक्तिगत उर्वरक और कीटनाशक सिफारिशें प्राप्त करें।',
                    'form_title': 'अपनी फसल का विवरण दर्ज करें',
                    'label_crop_name': 'फसल का नाम',
                    'placeholder_crop_name': 'फसल का नाम दर्ज करें (जैसे मक्का, गेहूं, चावल)',
                    'label_soil_type': 'मिट्टी का प्रकार',
                    'option_select_soil': 'मिट्टी का प्रकार चुनें',
                    'option_sandy': 'बलुई',
                    'option_loamy': 'दोमट',
                    'option_clay': 'चिकनी मिट्टी',
                    'option_silt': 'गाद',
                    'option_peat': 'पीट',
                    'option_chalky': 'चॉकी',
                    'label_region': 'क्षेत्र/राज्य',
                    'placeholder_region': 'अपना क्षेत्र दर्ज करें',
                    'label_area': 'क्षेत्र (एकड़)',
                    'placeholder_area': 'एकड़ में क्षेत्र दर्ज करें',
                    'label_ph': 'मिट्टी का पीएच स्तर',
                    'placeholder_ph': 'पीएच मान दर्ज करें (0-14)',
                    'label_season': 'उगाने का मौसम',
                    'option_select_season': 'मौसम चुनें',
                    'option_spring': 'वसंत',
                    'option_summer': 'गर्मी',
                    'option_monsoon': 'मानसून',
                    'option_autumn': 'शरद',
                    'option_winter': 'सर्दी',
                    'label_issues': 'विशिष्ट समस्याएं (यदि कोई हों)',
                    'placeholder_issues': 'जैसे पीले पत्ते, कीट संक्रमण, आदि।',
                    'btn_get_recommendations': 'एआई सिफारिशें प्राप्त करें',
                    'ai_processing': 'एग्रीग्रो एआई आपकी फसल के लिए सर्वोत्तम सिफारिशें प्रदान करने के लिए हजारों डेटा बिंदुओं का विश्लेषण कर रहा है...',
                    'results_title': 'व्यक्तिगत सिफारिशें',
                    'fertilizer_title': 'सुझाए गए उर्वरक',
                    'pesticide_title': 'सुझाए गए कीटनाशक',
                    'footer_company': 'एग्रीग्रो एआई',
                    'footer_description': 'कृत्रिम बुद्धिमत्ता की शक्ति का उपयोग करके कृषि को बदलना और विश्वव्यापी खाद्य सुरक्षा में सुधार करना।',
                    'footer_quick_links': 'त्वरित लिंक',
                    'footer_about': 'हमारे बारे में',
                    'footer_how_it_works': 'यह कैसे काम करता है',
                    'footer_pricing': 'मूल्य निर्धारण',
                    'footer_contact': 'संपर्क करें',
                    'footer_resources': 'संसाधन',
                    'footer_blog': 'ब्लॉग',
                    'footer_case_studies': 'केस स्टडी',
                    'footer_guide': 'किसान मार्गदर्शिका',
                    'footer_support': 'सहायता केंद्र',
                    'footer_connect': 'हमसे जुड़ें',
                    'footer_facebook': 'फेसबुक',
                    'footer_twitter': 'ट्विटर',
                    'footer_instagram': 'इंस्टाग्राम',
                    'footer_linkedin': 'लिंक्डइन',
                    'footer_copyright': '© 2023 एग्रीग्रो एआई। सर्वाधिकार सुरक्षित।'
                },
                'or': {
                    'app_name': 'ଆଗ୍ରୋ ଏଆଇ',
                    'nav_home': 'ମୁଖ୍ୟ ପୃଷ୍ଠା',
                    'nav_predictions': 'ଭବିଷ୍ୟବାଣୀ',
                    'nav_history': 'ଇତିହାସ',
                    'btn_sign_in': 'ସାଇନ ଇନ୍',
                    'btn_register': 'ନିବେଦନ କରନ୍ତୁ',
                    'hero_title': 'ଏଆଇ-ଚାଳିତ ଫସଲ ପରାମର୍ଶ',
                    'hero_subtitle': 'ଆପଣଙ୍କର ନିର୍ଦ୍ଦିଷ୍ଟ ଫସଲ, ମୃତ୍ତିକା ଅବସ୍ଥା ଏବଂ ଅବସ୍ଥାନ ଉପରେ ଆଧାରିତ ବ୍ୟକ୍ତିଗତ ଉର୍ବରକ ଏବଂ କୀଟନାଶକ ପରାମର୍ଶ ପ୍ରାପ୍ତ କରନ୍ତୁ।',
                    'form_title': 'ଆପଣଙ୍କ ଫସଲର ବିବରଣୀ ପ୍ରବେଶ କରନ୍ତୁ',
                    'label_crop_name': 'ଫସଲର ନାମ',
                    'placeholder_crop_name': 'ଫସଲର ନାମ ପ୍ରବେଶ କରନ୍ତୁ (ଯେପରିକି ମକା, ଗହମ, ଚାଉଳ)',
                    'label_soil_type': 'ମୃତ୍ତିକା ପ୍ରକାର',
                    'option_select_soil': 'ମୃତ୍ତିକା ପ୍ରକାର ଚୟନ କରନ୍ତୁ',
                    'option_sandy': 'ବାଲୁକାମୟ',
                    'option_loamy': 'ଦୋଆଁଶ',
                    'option_clay': 'ମାଟି',
                    'option_silt': 'ପାଣିଆ',
                    'option_peat': 'ପିଟ',
                    'option_chalky': 'ଚକ୍ ଯୁକ୍ତ',
                    'label_region': 'ଅଞ୍ଚଳ/ରାଜ୍ୟ',
                    'placeholder_region': 'ଆପଣଙ୍କର ଅଞ୍ଚଳ ପ୍ରବେଶ କରନ୍ତୁ',
                    'label_area': 'କ୍ଷେତ୍ରଫଳ (ଏକର)',
                    'placeholder_area': 'ଏକରରେ କ୍ଷେତ୍ରଫଳ ପ୍ରବେଶ କରନ୍ତୁ',
                    'label_ph': 'ମୃତ୍ତିକା pH ସ୍ତର',
                    'placeholder_ph': 'pH ମାନ ପ୍ରବେଶ କରନ୍ତୁ (0-14)',
                    'label_season': 'ଚାଷ ମୌସୁମ',
                    'option_select_season': 'ମୌସୁମ ଚୟନ କରନ୍ତୁ',
                    'option_spring': 'ବସନ୍ତ',
                    'option_summer': 'ଗ୍ରୀଷ୍ମ',
                    'option_monsoon': 'ବର୍ଷା',
                    'option_autumn': 'ଶରତ',
                    'option_winter': 'ଶୀତ',
                    'label_issues': 'ସ୍ୱତନ୍ତ୍ର ସମସ୍ୟା (ଯଦି କିଛି ଥାଏ)',
                    'placeholder_issues': 'ଯେପରିକି ହଳଦିଆ ପତ୍ର, କୀଟ ସଂକ୍ରମଣ, ଇତ୍ୟାଦି।',
                    'btn_get_recommendations': 'ଏଆଇ ପରାମର୍ଶ ପ୍ରାପ୍ତ କରନ୍ତୁ',
                    'ai_processing': 'ଆଗ୍ରୋ ଏଆଇ ଆପଣଙ୍କ ଫସଲ',
                                        'ai_processing': 'ଆଗ୍ରୋ ଏଆଇ ଆପଣଙ୍କ ଫସଲ ପାଇଁ ସର୍ବୋତ୍ତମ ପରାମର୍ଶ ପ୍ରଦାନ କରିବା ପାଇଁ ହଜାର ହଜାର ତଥ୍ୟ ବିଶ୍ଳେଷଣ କରୁଛି...',
                    'results_title': 'ବ୍ୟକ୍ତିଗତ ପରାମର୍ଶ',
                    'fertilizer_title': 'ପରାମର୍ଶିତ ଉର୍ବରକ',
                    'pesticide_title': 'ପରାମର୍ଶିତ କୀଟନାଶକ',
                    'footer_company': 'ଆଗ୍ରୋ ଏଆଇ',
                    'footer_description': 'କୃଷିରେ ପରିବର୍ତ୍ତନ ଆଣିବା ଏବଂ ବିଶ୍ୱବ୍ୟାପୀ ଖାଦ୍ୟ ସୁରକ୍ଷା ଉନ୍ନତ କରିବା ପାଇଁ କୃତ୍ରିମ ବୁଦ୍ଧିମତାର ଶକ୍ତି ବ୍ୟବହାର କରିବା।',
                    'footer_quick_links': 'ଦ୍ରୁତ ଲିଙ୍କ୍',
                    'footer_about': 'ଆମ ବିଷୟରେ',
                    'footer_how_it_works': 'ଏହା କିପରି କାମ କରେ',
                    'footer_pricing': 'ମୂଲ୍ୟ ନିର୍ଧାରଣ',
                    'footer_contact': 'ଯୋଗାଯୋଗ କରନ୍ତୁ',
                    'footer_resources': 'ସମ୍ବଳ',
                    'footer_blog': 'ବ୍ଲଗ୍',
                    'footer_case_studies': 'କେସ୍ ଷ୍ଟଡି',
                    'footer_guide': 'କୃଷକ ଗାଇଡ୍',
                    'footer_support': 'ସହାୟତା କେନ୍ଦ୍ର',
                    'footer_connect': 'ଆମ ସହିତ ଯୋଗାଯୋଗ କରନ୍ତୁ',
                    'footer_facebook': 'ଫେସବୁକ୍',
                    'footer_twitter': 'ଟ୍ୱିଟର୍',
                    'footer_instagram': 'ଇନଷ୍ଟାଗ୍ରାମ',
                    'footer_linkedin': 'ଲିଙ୍କଡଇନ୍',
                    'footer_copyright': '© 2023 ଆଗ୍ରୋ ଏଆଇ। ସମସ୍ତ ଅଧିକାର ସଂରକ୍ଷିତ।'
                }
            };
            
            // Language selector functionality
            const languageButton = document.querySelector('.language-button');
            const languageDropdown = document.querySelector('.language-dropdown');
            const currentLanguage = document.getElementById('current-language');
            const languageOptions = document.querySelectorAll('.language-option');
            
            languageButton.addEventListener('click', function() {
                languageDropdown.classList.toggle('show');
            });
            
            // Close dropdown when clicking outside
            document.addEventListener('click', function(event) {
                if (!event.target.closest('.language-selector')) {
                    languageDropdown.classList.remove('show');
                }
            });
            
            // Change language
            languageOptions.forEach(option => {
                option.addEventListener('click', function(e) {
                    e.preventDefault();
                    const lang = this.getAttribute('data-lang');
                    
                    // Update current language display
                    currentLanguage.textContent = this.querySelector('span').textContent;
                    
                    // Update active option
                    languageOptions.forEach(opt => opt.classList.remove('active'));
                    this.classList.add('active');
                    
                    // Apply translations
                    applyTranslations(lang);
                    
                    // Close dropdown
                    languageDropdown.classList.remove('show');
                });
            });
            
            // Apply translations to the page
            function applyTranslations(lang) {
                const elements = document.querySelectorAll('[data-translate]');
                
                elements.forEach(element => {
                    const key = element.getAttribute('data-translate');
                    if (translations[lang][key]) {
                        element.textContent = translations[lang][key];
                    }
                });
                
                // Translate placeholders
                const placeholderElements = document.querySelectorAll('[data-translate-placeholder]');
                placeholderElements.forEach(element => {
                    const key = element.getAttribute('data-translate-placeholder');
                    if (translations[lang][key]) {
                        element.setAttribute('placeholder', translations[lang][key]);
                    }
                });
            }
            
            // Form submission
            form.addEventListener('submit', function(e) {
                e.preventDefault();
                
                // Show loading/results section
                resultsSection.style.display = 'block';
                
                // Scroll to results
                resultsSection.scrollIntoView({ behavior: 'smooth' });
                
                // Simulate AI processing delay
                setTimeout(generateRecommendations, 2000);
            });
            
            // Generate recommendations based on form data
            function generateRecommendations() {
                const cropName = document.getElementById('crop-name').value;
                const soilType = document.getElementById('soil-type').value;
                const region = document.getElementById('region').value;
                const phLevel = parseFloat(document.getElementById('ph-level').value);
                
                // Clear previous results
                fertilizerResults.innerHTML = '';
                pesticideResults.innerHTML = '';
                
                // Generate fertilizer recommendations based on inputs
                let fertilizers = [];
                let pesticides = [];
                
                // Simple logic for demonstration - in a real app, this would use ML models
                if (cropName.toLowerCase().includes('wheat') || cropName.toLowerCase().includes('gahama')) {
                    fertilizers = [
                        { name: 'Urea', description: 'Nitrogen-rich fertilizer for growth', dosage: '100-150 kg/ha' },
                        { name: 'DAP', description: 'Di-ammonium phosphate for root development', dosage: '50-100 kg/ha' },
                        { name: 'Potash', description: 'Potassium for overall plant health', dosage: '40-60 kg/ha' }
                    ];
                    
                    pesticides = [
                        { name: 'Neem Oil', description: 'Organic solution for pest control', dosage: '2-5 ml per liter of water' },
                        { name: 'Chlorpyrifos', description: 'For aphid and termite control', dosage: '1-2 liters per hectare' }
                    ];
                } else if (cropName.toLowerCase().includes('rice') || cropName.toLowerCase().includes('chaula')) {
                    fertilizers = [
                        { name: 'Ammonium Sulfate', description: 'Nitrogen source for paddy fields', dosage: '100-150 kg/ha' },
                        { name: 'Super Phosphate', description: 'Phosphorus for root growth', dosage: '50-80 kg/ha' },
                        { name: 'Zinc Sulfate', description: 'Important for rice cultivation', dosage: '25-50 kg/ha' }
                    ];
                    
                    pesticides = [
                        { name: 'Carbofuran', description: 'Controls stem borers', dosage: '15-20 kg/ha' },
                        { name: 'BPMC', description: 'Effective against brown plant hopper', dosage: '1-1.5 liters per hectare' }
                    ];
                } else if (cropName.toLowerCase().includes('corn') || cropName.toLowerCase().includes('maka')) {
                    fertilizers = [
                        { name: 'NPK 10-26-26', description: 'Balanced fertilizer for corn', dosage: '150-200 kg/ha' },
                        { name: 'Urea', description: 'Top dressing for nitrogen needs', dosage: '100-150 kg/ha' },
                        { name: 'Zinc Sulfate', description: 'Prevents zinc deficiency', dosage: '25 kg/ha' }
                    ];
                    
                    pesticides = [
                        { name: 'Atrazine', description: 'Pre-emergence herbicide', dosage: '1-1.5 kg/ha' },
                        { name: 'Lambda-cyhalothrin', description: 'For armyworm control', dosage: '250-300 ml/ha' }
                    ];
                } else {
                    // Default recommendations
                    fertilizers = [
                        { name: 'NPK 15-15-15', description: 'Balanced fertilizer for general use', dosage: '150-200 kg/ha' },
                        { name: 'Compost', description: 'Organic matter for soil health', dosage: '5-10 tons/ha' }
                    ];
                    
                    pesticides = [
                        { name: 'Neem-based Pesticide', description: 'Organic and broad-spectrum', dosage: 'As per manufacturer instructions' },
                        { name: 'Mancozeb', description: 'Fungicide for disease prevention', dosage: '2-2.5 kg/ha' }
                    ];
                }
                
                // Adjust based on pH level
                if (phLevel < 6.0) {
                    fertilizers.push({ 
                        name: 'Lime', 
                        description: 'Soil amendment to raise pH level', 
                        dosage: '1-2 tons/ha based on current pH' 
                    });
                } else if (phLevel > 7.5) {
                    fertilizers.push({ 
                        name: 'Gypsum', 
                        description: 'Soil amendment to lower pH level', 
                        dosage: '1-2 tons/ha based on current pH' 
                    });
                }
                
                // Display fertilizer recommendations
                fertilizers.forEach(fert => {
                    const fertElement = document.createElement('div');
                    fertElement.className = 'fertilizer-item';
                    fertElement.innerHTML = `
                        <div class="product-name">${fert.name}</div>
                        <div class="product-desc">${fert.description}</div>
                        <div class="product-dosage">
                            <span>Dosage:</span>
                            <span>${fert.dosage}</span>
                        </div>
                    `;
                    fertilizerResults.appendChild(fertElement);
                });
                
                // Display pesticide recommendations
                pesticides.forEach(pest => {
                    const pestElement = document.createElement('div');
                    pestElement.className = 'pesticide-item';
                    pestElement.innerHTML = `
                        <div class="product-name">${pest.name}</div>
                        <div class="product-desc">${pest.description}</div>
                        <div class="product-dosage">
                            <span>Dosage:</span>
                            <span>${pest.dosage}</span>
                        </div>
                    `;
                    pesticideResults.appendChild(pestElement);
                });
                
                // Add source information
                const sourceInfo = document.createElement('div');
                sourceInfo.className = 'source-info';
                sourceInfo.textContent = 'Recommendations based on agricultural best practices and regional data.';
                fertilizerResults.appendChild(sourceInfo.cloneNode(true));
                pesticideResults.appendChild(sourceInfo);
            }
        });
    </script>
</body>
</html>