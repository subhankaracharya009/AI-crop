<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AgriGrow AI - Multilingual Agricultural Platform</title>
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
        
        /* Header Styles */
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
        
        /* Dashboard Section */
        .dashboard {
            padding: 60px 0;
        }
        
        .section-title {
            text-align: center;
            margin-bottom: 40px;
            color: var(--dark);
        }
        
        .dashboard-cards {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 25px;
            margin-bottom: 40px;
        }
        
        .card {
            background: white;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
            transition: transform 0.3s;
        }
        
        .card:hover {
            transform: translateY(-5px);
        }
        
        .card-header {
            background: var(--primary);
            color: white;
            padding: 15px 20px;
            font-weight: 500;
            display: flex;
            align-items: center;
            gap: 10px;
        }
        
        .card-body {
            padding: 20px;
        }
        
        .data-value {
            font-size: 2rem;
            font-weight: 700;
            color: var(--primary-dark);
            margin: 10px 0;
        }
        
        .data-label {
            color: var(--text-light);
            font-size: 0.9rem;
        }
        
        /* Prediction Section */
        .prediction {
            background: var(--light);
            padding: 60px 0;
        }
        
        .prediction-cards {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 25px;
        }
        
        .prediction-card {
            background: white;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
        }
        
        .prediction-card-header {
            background: var(--secondary);
            color: white;
            padding: 15px 20px;
            font-weight: 500;
            display: flex;
            align-items: center;
            gap: 10px;
        }
        
        .prediction-list {
            list-style: none;
            padding: 20px;
        }
        
        .prediction-list li {
            padding: 12px 0;
            border-bottom: 1px solid #eee;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        
        .prediction-list li:last-child {
            border-bottom: none;
        }
        
        .crop-icon {
            width: 40px;
            height: 40px;
            background: var(--light);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--primary);
        }
        
        /* Recommendations Section */
        .recommendations {
            padding: 60px 0;
        }
        
        .tabs {
            display: flex;
            border-bottom: 1px solid #ddd;
            margin-bottom: 30px;
            overflow-x: auto;
        }
        
        .tab {
            padding: 12px 24px;
            cursor: pointer;
            border-bottom: 3px solid transparent;
            transition: all 0.3s;
            white-space: nowrap;
        }
        
        .tab.active {
            border-bottom: 3px solid var(--primary);
            color: var(--primary);
            font-weight: 500;
        }
        
        .tab-content {
            display: none;
        }
        
        .tab-content.active {
            display: block;
        }
        
        .recommendation-item {
            background: white;
            border-radius: 8px;
            padding: 20px;
            margin-bottom: 20px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
            display: flex;
            gap: 20px;
            align-items: flex-start;
        }
        
        .recommendation-icon {
            background: var(--light);
            color: var(--primary);
            width: 50px;
            height: 50px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 20px;
            flex-shrink: 0;
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
        
        /* Popup Styles */
        .popup-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.7);
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 1000;
            visibility: hidden;
            opacity: 0;
            transition: all 0.3s ease;
        }
        
        .popup-overlay.active {
            visibility: visible;
            opacity: 1;
        }
        
        .auth-popup {
            background: white;
            border-radius: 8px;
            box-shadow: 0 5px 25px rgba(0, 0, 0, 0.2);
            width: 100%;
            max-width: 450px;
            padding: 30px;
            position: relative;
            transform: translateY(-50px);
            transition: transform 0.3s ease;
        }
        
        .popup-overlay.active .auth-popup {
            transform: translateY(0);
        }
        
        .close-popup {
            position: absolute;
            top: 15px;
            right: 15px;
            font-size: 1.5rem;
            cursor: pointer;
            color: var(--text-light);
            transition: color 0.3s;
        }
        
        .close-popup:hover {
            color: var(--text);
        }
        
        .popup-title {
            text-align: center;
            margin-bottom: 25px;
            color: var(--primary-dark);
        }
        
        .form-group {
            margin-bottom: 20px;
        }
        
        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-weight: 500;
            color: var(--text);
        }
        
        .form-group input {
            width: 100%;
            padding: 12px 15px;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 1rem;
            transition: border-color 0.3s;
        }
        
        .form-group input:focus {
            border-color: var(--primary);
            outline: none;
        }
        
        .form-submit {
            width: 100%;
            padding: 12px;
            background: var(--primary);
            color: white;
            border: none;
            border-radius: 4px;
            font-size: 1rem;
            font-weight: 500;
            cursor: pointer;
            transition: background 0.3s;
        }
        
        .form-submit:hover {
            background: var(--primary-dark);
        }
        
        .form-footer {
            text-align: center;
            margin-top: 20px;
            color: var(--text-light);
        }
        
        .form-footer a {
            color: var(--primary);
            text-decoration: none;
            cursor: pointer;
        }
        
        .form-footer a:hover {
            text-decoration: underline;
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
            
            .dashboard-cards, .prediction-cards {
                grid-template-columns: 1fr;
            }
            
            .tabs {
                overflow-x: auto;
                white-space: nowrap;
            }
            
            .auth-popup {
                width: 90%;
                margin: 0 20px;
                padding: 20px;
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
                    <h1 data-translate="website_title">AgriGrow AI</h1>
                </div>
                <nav>
                    <ul>
                        
                        <li><a href="prediction.php" data-translate="nav_predictions">Predictions</a></li>
                        <li><a href="recommendation.php" data-translate="nav_recommendations">Recommendations</a></li>
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
                        <div class="language-dropdown" id="language-dropdown">
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
                        <button class="btn btn-outline" id="signin-btn" data-translate="btn_signin">Sign In</button>
                        <button class="btn btn-primary" id="register-btn" data-translate="btn_register">Register</button>
                    </div>
                    <div class="user-status" id="user-status" style="display: none;">
                        <span id="user-name"></span>
                        <a href="logout.php" class="btn btn-outline">Logout</a>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Hero Section -->
    <section class="hero">
        <div class="container">
            <div class="hero-content">
                <h2 data-translate="hero_title">Optimize Your Farm with AI-Powered Insights</h2>
                <p data-translate="hero_description">AgriGrow AI uses historical data, weather patterns, and soil health metrics to predict crop yields and provide actionable recommendations for irrigation, fertilization, and pest control.</p>
                <button class="btn btn-primary" id="get-started-btn" data-translate="btn_getstarted">Get Started</button>
            </div>
        </div>
    </section>

    <!-- Dashboard Section -->
    <section class="dashboard">
        <div class="container">
            <h2 class="section-title" data-translate="section_overview">Farm Overview</h2>
            <div class="dashboard-cards">
                <div class="card">
                    <div class="card-header">
                        <i class="fas fa-cloud-sun"></i>
                        <span data-translate="card_weather">Weather Conditions</span>
                    </div>
                    <div class="card-body">
                        <div class="data-value">72°F</div>
                        <div class="data-label" data-translate="label_temperature">Current Temperature</div>
                        <p data-translate="weather_description">Partly cloudy with a 20% chance of rain in the next 24 hours.</p>
                    </div>
                </div>
                
                <div class="card">
                    <div class="card-header">
                        <i class="fas fa-vial"></i>
                        <span data-translate="card_soil">Soil Health</span>
                    </div>
                    <div class="card-body">
                        <div class="data-value">6.8 pH</div>
                        <div class="data-label" data-translate="label_nutrient">Optimal Nutrient Levels</div>
                        <p data-translate="soil_description">Soil conditions are favorable for corn cultivation. Nitrogen levels slightly low.</p>
                    </div>
                </div>
                
                <div class="card">
                    <div class="card-header">
                        <i class="fas fa-tint"></i>
                        <span data-translate="card_irrigation">Irrigation Status</span>
                    </div>
                    <div class="card-body">
                        <div class="data-value">65%</div>
                        <div class="data-label" data-translate="label_moisture">Adequate Moisture</div>
                        <p data-translate="irrigation_description">Next irrigation recommended in 48 hours based on weather forecast.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Prediction Section -->
    <section class="prediction">
        <div class="container">
            <h2 class="section-title" data-translate="section_predictions">Crop Yield Predictions</h2>
            <div class="prediction-cards">
                <div class="prediction-card">
                    <div class="prediction-card-header">
                        <i class="fas fa-chart-line"></i>
                        <span data-translate="card_corn">Corn Yield Forecast</span>
                    </div>
                    <ul class="prediction-list">
                        <li>
                            <div class="crop-icon">
                                <i class="fas fa-corn"></i>
                            </div>
                            <div>
                                <strong data-translate="label_yield">Expected Yield</strong>
                                <p>180 bushels/acre</p>
                            </div>
                            <span class="data-value">+12%</span>
                        </li>
                        <li>
                            <div>
                                <strong data-translate="label_harvest">Optimal Harvest Date</strong>
                                <p>September 15-22, 2023</p>
                            </div>
                        </li>
                        <li>
                            <div>
                                <strong data-translate="label_confidence">Confidence Level</strong>
                                <p>High (87%)</p>
                            </div>
                        </li>
                    </ul>
                </div>
                
                <div class="prediction-card">
                    <div class="prediction-card-header">
                        <i class="fas fa-chart-line"></i>
                        <span data-translate="card_soybean">Soybean Yield Forecast</span>
                    </div>
                    <ul class="prediction-list">
                        <li>
                            <div class="crop-icon">
                                <i class="fas fa-leaf"></i>
                            </div>
                            <div>
                                <strong data-translate="label_yield">Expected Yield</strong>
                                <p>52 bushels/acre</p>
                            </div>
                            <span class="data-value">+5%</span>
                        </li>
                        <li>
                            <div>
                                <strong data-translate="label_harvest">Optimal Harvest Date</strong>
                                <p>October 5-12, 2023</p>
                            </div>
                        </li>
                        <li>
                            <div>
                                <strong data-translate="label_confidence">Confidence Level</strong>
                                <p>Medium (76%)</p>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- Recommendations Section -->
    <section class="recommendations">
        <div class="container">
            <h2 class="section-title" data-translate="section_recommendations">Actionable Recommendations</h2>
            
            <div class="tabs">
                <div class="tab active" data-tab="irrigation" data-translate="tab_irrigation">Irrigation</div>
                <div class="tab" data-tab="fertilization" data-translate="tab_fertilization">Fertilization</div>
                <div class="tab" data-tab="pest-control" data-translate="tab_pest">Pest Control</div>
            </div>
            
            <div class="tab-content active" id="irrigation">
                <div class="recommendation-item">
                    <div class="recommendation-icon">
                        <i class="fas fa-tint"></i>
                    </div>
                    <div>
                        <h3 data-translate="rec_irrigation_title">Optimize Irrigation Schedule</h3>
                        <p data-translate="rec_irrigation_desc">Based on soil moisture data and upcoming weather forecasts, we recommend reducing irrigation frequency by 15% for the next week. Expected rainfall will provide sufficient moisture.</p>
                        <p><strong data-translate="rec_implementation">Implementation:</strong> <span data-translate="rec_irrigation_impl">Adjust sprinklers to run for 30 minutes every 48 hours instead of daily.</span></p>
                    </div>
                </div>
                
                <div class="recommendation-item">
                    <div class="recommendation-icon">
                        <i class="fas fa-map-marked-alt"></i>
                    </div>
                    <div>
                        <h3 data-translate="rec_zones_title">Zone-Specific Adjustments</h3>
                        <p data-translate="rec_zones_desc">The northern section of your field has 20% higher soil moisture retention. Implement variable rate irrigation to optimize water usage across different zones.</p>
                        <p><strong data-translate="rec_implementation">Implementation:</strong> <span data-translate="rec_zones_impl">Reduce water allocation to northern zones by 25% and increase southern zones by 10%.</span></p>
                    </div>
                </div>
            </div>
            
            <div class="tab-content" id="fertilization">
                <div class="recommendation-item">
                    <div class="recommendation-icon">
                        <i class="fas fa-flask"></i>
                    </div>
                    <div>
                        <h3 data-translate="rec_fertilization_title">Nitrogen Supplementation</h3>
                        <p data-translate="rec_fertilization_desc">Soil tests indicate nitrogen levels are 15% below optimal for corn growth stage. Recommend applying 40 lbs/acre of nitrogen-based fertilizer.</p>
                        <p><strong data-translate="rec_implementation">Implementation:</strong> <span data-translate="rec_fertilization_impl">Apply Urea fertilizer before next irrigation cycle for optimal absorption.</span></p>
                    </div>
                </div>
            </div>
            
            <div class="tab-content" id="pest-control">
                <div class="recommendation-item">
                    <div class="recommendation-icon">
                        <i class="fas fa-bug"></i>
                    </div>
                    <div>
                        <h3 data-translate="rec_pest_title">Preventative Pest Measures</h3>
                        <p data-translate="rec_pest_desc">Weather conditions and regional data indicate increased risk of corn borers in the next 2-3 weeks. Recommend applying preventative treatment.</p>
                        <p><strong data-translate="rec_implementation">Implementation:</strong> <span data-translate="rec_pest_impl">Apply Bacillus thuringiensis (Bt) spray in the early morning when temperatures are below 85°F.</span></p>
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
                    <h3 data-translate="footer_links">Quick Links</h3>
                    <ul>
                        <li><a href="#" data-translate="footer_about">About Us</a></li>
                        <li><a href="#" data-translate="footer_how">How It Works</a></li>
                        <li><a href="#" data-translate="footer_pricing">Pricing</a></li>
                        <li><a href="#" data-translate="footer_contact">Contact</a></li>
                    </ul>
                </div>
                
                <div class="footer-column">
                    <h3 data-translate="footer_resources">Resources</h3>
                    <ul>
                        <li><a href="#" data-translate="footer_blog">Blog</a></li>
                        <li><a href="#" data-translate="footer_cases">Case Studies</a></li>
                        <li><a href="#" data-translate="footer_guide">Farmers Guide</a></li>
                        <li><a href="#" data-translate="footer_support">Support Center</a></li>
                    </ul>
                </div>
                
                <div class="footer-column">
                    <h3 data-translate="footer_connect">Connect With Us</h3>
                    <ul>
                        <li><a href="#"><i class="fab fa-facebook"></i> Facebook</a></li>
                        <li><a href="#"><i class="fab fa-twitter"></i> Twitter</a></li>
                        <li><a href="#"><i class="fab fa-instagram"></i> Instagram</a></li>
                        <li><a href="#"><i class="fab fa-linkedin"></i> LinkedIn</a></li>
                    </ul>
                </div>
            </div>
            
            <div class="copyright">
                <p>&copy; 2023 AgriGrow AI. <span data-translate="footer_rights">All rights reserved.</span></p>
            </div>
        </div>
    </footer>

   <!-- Sign In Popup -->
<div class="popup-overlay" id="signin-popup">
    <div class="auth-popup">
        <span class="close-popup" id="close-signin-popup">&times;</span>
        <h2 class="popup-title">Sign In</h2>
        <form id="signin-form" method="POST">
            <div class="form-group">
                <label for="phone">Phone Number</label>
                <input type="tel" id="signin-phone" name="phone" placeholder="Enter your phone number" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="signin-password" name="password" placeholder="Enter your password" required>
            </div>
            <button type="submit" class="form-submit">Sign In</button>
            <div class="form-footer">
                Don't have an account? <a href="#" id="show-register">Register</a>
            </div>
            <div id="signin-message" style="margin-top: 15px; text-align: center;"></div>
        </form>
    </div>
</div>

<!-- Registration Popup -->
<div class="popup-overlay" id="registration-popup">
    <div class="auth-popup">
        <span class="close-popup" id="close-registration-popup">&times;</span>
        <h2 class="popup-title">Create Account</h2>
        <form id="registration-form" method="POST">
            <div class="form-group">
                <label for="fullname">Full Name</label>
                <input type="text" id="fullname" name="fullname" placeholder="Enter your full name" required>
            </div>
            <div class="form-group">
                <label for="address">Address</label>
                <input type="text" id="address" name="address" placeholder="Enter your address" required>
            </div>
            <div class="form-group">
                <label for="phone">Phone Number</label>
                <input type="tel" id="phone" name="phone" placeholder="Enter your phone number" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" placeholder="Create a strong password" required>
                <small>Use at least 8 characters with a mix of letters, numbers and symbols</small>
            </div>
            <div class="form-group">
                <label for="confirm-password">Confirm Password</label>
                <input type="password" id="confirm-password" name="confirm-password" placeholder="Confirm your password" required>
            </div>
            <button type="submit" class="form-submit">Register</button>
            <div class="form-footer">
                Already have an account? <a href="#" id="show-signin">Sign In</a>
            </div>
            <div id="register-message" style="margin-top: 15px; text-align: center;"></div>
        </form>
    </div>
</div>

    <script>
        // Language data for English, Hindi, and Odia
        const translations = {
            en: {
                website_title: "AgriGrow AI",
                nav_dashboard: "Dashboard",
                nav_predictions: "Predictions",
                nav_recommendations: "Recommendations",
                nav_fields: "Fields",
                nav_history: "History",
                btn_signin: "Sign In",
                btn_register: "Register",
                hero_title: "Optimize Your Farm with AI-Powered Insights",
                hero_description: "AgriGrow AI uses historical data, weather patterns, and soil health metrics to predict crop yields and provide actionable recommendations for irrigation, fertilization, and pest control.",
                btn_getstarted: "Get Started",
                section_overview: "Farm Overview",
                card_weather: "Weather Conditions",
                label_temperature: "Current Temperature",
                weather_description: "Partly cloudy with a 20% chance of rain in the next 24 hours.",
                card_soil: "Soil Health",
                label_nutrient: "Optimal Nutrient Levels",
                soil_description: "Soil conditions are favorable for corn cultivation. Nitrogen levels slightly low.",
                card_irrigation: "Irrigation Status",
                label_moisture: "Adequate Moisture",
                irrigation_description: "Next irrigation recommended in 48 hours based on weather forecast.",
                section_predictions: "Crop Yield Predictions",
                card_corn: "Corn Yield Forecast",
                card_soybean: "Soybean Yield Forecast",
                label_yield: "Expected Yield",
                label_harvest: "Optimal Harvest Date",
                label_confidence: "Confidence Level",
                section_recommendations: "Actionable Recommendations",
                tab_irrigation: "Irrigation",
                tab_fertilization: "Fertilization",
                tab_pest: "Pest Control",
                rec_irrigation_title: "Optimize Irrigation Schedule",
                rec_irrigation_desc: "Based on soil moisture data and upcoming weather forecasts, we recommend reducing irrigation frequency by 15% for the next week. Expected rainfall will provide sufficient moisture.",
                rec_implementation: "Implementation:",
                rec_irrigation_impl: "Adjust sprinklers to run for 30 minutes every 48 hours instead of daily.",
                rec_zones_title: "Zone-Specific Adjustments",
                rec_zones_desc: "The northern section of your field has 20% higher soil moisture retention. Implement variable rate irrigation to optimize water usage across different zones.",
                rec_zones_impl: "Reduce water allocation to northern zones by 25% and increase southern zones by 10%.",
                rec_fertilization_title: "Nitrogen Supplementation",
                rec_fertilization_desc: "Soil tests indicate nitrogen levels are 15% below optimal for corn growth stage. Recommend applying 40 lbs/acre of nitrogen-based fertilizer.",
                rec_fertilization_impl: "Apply Urea fertilizer before next irrigation cycle for optimal absorption.",
                rec_pest_title: "Preventative Pest Measures",
                rec_pest_desc: "Weather conditions and regional data indicate increased risk of corn borers in the next 2-3 weeks. Recommend applying preventative treatment.",
                rec_pest_impl: "Apply Bacillus thuringiensis (Bt) spray in the early morning when temperatures are below 85°F.",
                footer_company: "AgriGrow AI",
                footer_description: "Harnessing the power of artificial intelligence to transform agriculture and improve food security worldwide.",
                footer_links: "Quick Links",
                footer_about: "About Us",
                footer_how: "How It Works",
                footer_pricing: "Pricing",
                footer_contact: "Contact",
                footer_resources: "Resources",
                footer_blog: "Blog",
                footer_cases: "Case Studies",
                footer_guide: "Farmers Guide",
                footer_support: "Support Center",
                footer_connect: "Connect With Us",
                footer_rights: "All rights reserved."
            },
            hi: {
                website_title: "एग्रीग्रो एआई",
                nav_dashboard: "डैशबोर्ड",
                nav_predictions: "पूर्वानुमान",
                nav_recommendations: "सिफारिशें",
                nav_fields: "खेत",
                nav_history: "इतिहास",
                btn_signin: "साइन इन",
                btn_register: "पंजीकरण",
                hero_title: "AI-संचालित अंतर्दृष्टि के साथ अपने खेत को अनुकूलित करें",
                hero_description: "एग्रीग्रो एआई फसल की पैदावार की भविष्यवाणी करने और सिंचाई, निषेचन और कीट नियंत्रण के लिए कार्रवाई योग्य सिफारिशें प्रदान करने के लिए ऐतिहासिक डेटा, मौसम पैटर्न और मिट्टी स्वास्थ्य मेट्रिक्स का उपयोग करता है।",
                btn_getstarted: "शुरू हो जाओ",
                section_overview: "खेत का अवलोकन",
                card_weather: "मौसम की स्थिति",
                label_temperature: "वर्तमान तापमान",
                weather_description: "अगले 24 घंटों में 20% बारिश की संभावना के साथ आंशिक रूप से बादल छाए रहेंगे।",
                card_soil: "मिट्टी का स्वास्थ्य",
                label_nutrient: "इष्टतम पोषक तत्व स्तर",
                soil_description: "मक्का की खेती के लिए मिट्टी की स्थिति अनुकूल है। नाइट्रोजन का स्तर थोड़ा कम है।",
                card_irrigation: "सिंचाई स्थिति",
                label_moisture: "पर्याप्त नमी",
                irrigation_description: "मौसम के पूर्वानुमान के आधार पर अगले 48 घंटों में सिंचाई की सिफारिश की गई।",
                section_predictions: "फसल उपज पूर्वानुमान",
                card_corn: "मक्का उपज पूर्वानुमान",
                card_soybean: "सोयाबीन उपज पूर्वानुमान",
                label_yield: "अपेक्षित उपज",
                label_harvest: "इष्टतम कटाई तिथि",
                label_confidence: "विश्वास स्तर",
                section_recommendations: "कार्रवाई योग्य सिफारिशें",
                tab_irrigation: "सिंचाई",
                tab_fertilization: "निषेचन",
                tab_pest: "कीट नियंत्रण",
                rec_irrigation_title: "सिंचाई कार्यक्रम अनुकूलित करें",
                rec_irrigation_desc: "मिट्टी की नमी के आंकड़ों और आगामी मौसम के पूर्वानुमानों के आधार पर, हम अगले सप्ताह के लिए सिंचाई आवृत्ति को 15% कम करने की सलाह देते हैं। अपेक्षित वर्षा पर्याप्त नमी प्रदान करेगी।",
                rec_implementation: "कार्यान्वयन:",
                rec_irrigation_impl: "स्प्रिंकलर को दैनिक के बजाय हर 48 घंटे में 30 मिनट तक चलने के लिए समायोजित करें।",
                rec_zones_title: "क्षेत्र-विशिष्ट समायोजन",
                rec_zones_desc: "आपके खेत के उत्तरी भाग में मिट्टी की नमी धारण करने की क्षमता 20% अधिक है। विभिन्न क्षेत्रों में पानी के उपयोग को अनुकूलित करने के लिए परिवर्तनशील दर सिंचाई लागू करें।",
                rec_zones_impl: "उत्तरी क्षेत्रों में पानी का आवंटन 25% कम करें और दक्षिणी क्षेत्रों में 10% बढ़ाएं।",
                rec_fertilization_title: "नाइट्रोजन अनुपूरण",
                rec_fertilization_desc: "मिट्टी परीक्षणों से संकेत मिलता है कि मक्का विकास चरण के लिए नाइट्रोजन का स्तर इष्टतम से 15% नीचे है। नाइट्रोजन-आधारित उर्वरक के 40 lbs/acre लगाने की सलाह दें।",
                rec_fertilization_impl: "इष्टतम अवशोषण के लिए अगले सिंचाई चक्र से पहले यूरिया उर्वरक लगाएं।",
                rec_pest_title: "निवारक कीट उपाय",
                rec_pest_desc: "मौसम की स्थिति और क्षेत्रीय आंकड़े अगले 2-3 सप्ताह में कॉर्न बोरर के बढ़ते जोखिम का संकेत देते हैं। निवारक उपचार लागू करने की सलाह दें।",
                rec_pest_impl: "बैसिलस थुरिंजिएन्सिस (Bt) स्प्रे सुबह-सुबह लगाएं जब तापमान 85°F से नीचे हो।"
            },
            or: {
                website_title: "ଆଗ୍ରୋଗ୍ର",
                nav_dashboard: "ଡ୍ୟାସବୋର୍ଡ",
                nav_predictions: "ଭବିଷ୍ୟବାଣୀ",
                nav_recommendations: "ପରାମର୍ଶ",
                nav_fields: "କ୍ଷେତ୍ରଗୁଡିକ",
                nav_history: "ଇତିହାସ",
                btn_signin: "ସାଇନ୍ ଇନ୍",
                btn_register: "ନବୀକରଣ",
                hero_title: "AI-ଚାଳିତ ଦୃଷ୍ଟିକୋଣ ସହିତ ଆପଣଙ୍କ ଫାର୍ମକୁ ଅପ୍ଟିମାଇଜ୍ କରନ୍ତୁ",
                hero_description: "ଆଗ୍ରୋଗ୍ରୋ AI ଫସଲ ଉତ୍ପାଦନ ଭବିଷ୍ୟବାଣୀ କରିବା ଏବଂ ସିଞ୍ଚନ, ସାର ପ୍ରୟୋଗ ଏବଂ କୀଟ ନିୟନ୍ତ୍ରଣ ପାଇଁ କାର୍ଯ୍ୟଯୋଗ୍ୟ ପରାମର୍ଶ ଦେବା ପାଇଁ ଐତିହାସିକ ତଥ୍ୟ, ମୌସୁମୀ ପାଟର୍ନ ଏବଂ ମୃତ୍ତିକା ସ୍ୱାସ୍ଥ୍ୟ �মେଟ୍ରିକ୍ସ ବ୍ୟବହାର କରେ |",
                btn_getstarted: "ଆରମ୍ଭ କରନ୍ତୁ",
                section_overview: "ଫାର୍ମ ସମୀକ୍ଷା",
                card_weather: "ମୌସୁମୀ ଅବସ୍ଥା",
                label_temperature: "ବର୍ତ୍ତମାନ ତାପମାତ୍ରା",
                weather_description: "ପରବର୍ତ୍ତୀ 24 ଘଣ୍ଟା ମଧ୍ୟରେ 20% ବର୍ଷା ସହିତ ଆଂଶିକ ମେଘାଚ୍ଛନ୍ନ |",
                card_soil: "ମୃତ୍ତିକା ସ୍ୱାସ୍ଥ୍ୟ",
                label_nutrient: "ସର୍ବୋତ୍ତମ ପୋଷକ ତତ୍ତ୍ୱ ସ୍ତର",
                soil_description: "ମକା ଚାଷ ପାଇଁ ମୃତ୍ତିକା ଅବସ୍ଥା ଅନୁକୂଳ | ନାଇଟ୍ରୋଜେନ୍ ସ୍ତର ଟିକେ କମ୍ |",
                card_irrigation: "ସିଞ୍ଚନ ସ୍ଥିତି",
                label_moisture: "ପର୍ଯ୍ୟାପ୍ତ ଆର୍ଦ୍ରତା",
                irrigation_description: "ମୌସୁମୀ ପୂର୍ବାନୁମାନ ଉପରେ ଆଧାର କରି ପରବର୍ତ୍ତୀ 48 ଘଣ୍ଟା �মଧ୍ୟରେ ପରାମର୍ଶିତ ସିଞ୍ଚନ |",
                section_predictions: "ଫସଲ ଉତ୍ପାଦନ ଭବିଷ୍ୟବାଣୀ",
                card_corn: "ମକା ଉତ୍ପାଦନ ପୂର୍ବାନୁମାନ",
                card_soybean: "ସୋୟାବିନ୍ ଉତ୍ପାଦন �পୂର୍ବାନୁମାନ",
                label_yield: "ଆଶା କରାଯାଉଥିବା ଉତ୍ପାଦନ",
                label_harvest: "ସର୍ବୋତ୍ତମ ଅମଳ ତାରିଖ",
                label_confidence: "ଆତ୍ମବିଶ୍ୱାସ ସ୍ତର",
                section_recommendations: "କାର୍ଯ୍ୟଯୋଗ୍ୟ ପରାମର୍ଶ",
                tab_irrigation: "ସିଞ୍ଚନ",
                tab_fertilization: "ସାର ପ୍ରୟୋଗ",
                tab_pest: "କୀଟ ନିୟନ୍ତ୍ରଣ",
                rec_irrigation_title: "ସିଞ୍ଚନ କାର୍ଯ୍ୟକ୍ରମ ଅପ୍ଟିମାଇଜ୍ କରନ୍ତୁ",
                rec_irrigation_desc: "ମୃତ୍ତିକା ଆର୍ଦ୍ରତା ତଥ୍ୟ ଏବଂ ଆଗାମୀ ମୌସୁମୀ ପୂର୍ବାନୁମାନ ଉପରେ ଆଧାର କରି, ଆମେ ପରବର୍ତ୍ତୀ ସପ୍ତାହ ପାଇଁ ସିଞ୍ଚନ ଆବୃତ୍ତି 15% କମାଇବାକୁ ପରାମର୍ଶ ଦେଉ | ଆଶା କରାଯାଉଥିବା ବର୍ଷା ପର୍ଯ୍ୟାପ୍ତ ଆର୍ଦ୍ରତା ପ୍ରଦାନ କରିବ |",
                rec_implementation: "କାର୍ଯ୍ୟକାରିତା:",
                rec_irrigation_impl: "ଦ daily ନନ୍ଦିନା ପରିବର୍ତ୍ତେ ପ୍ରତ୍ୟେକ 48 ଘଣ୍ଟାରେ 30 ମିନିଟ୍ ଚଲାଇବା ପାଇଁ ସ୍ପ୍ରିଙ୍କଲର୍ଗୁଡିକ ସଜାଡନ୍ତୁ |",
                rec_zones_title: "ଜୋନ-ବିଶେଷ ଆଡଜଷ୍ଟମେଣ୍ଟ",
                rec_zones_desc: "ଆପଣଙ୍କ କ୍ଷେତ୍ରର ଉତ୍ତରୀୟ ଅଂଶରେ 20% ଅଧିକ �মୃତ୍ତିକା ଆର୍ଦ୍ରତା ଧାରଣ ଅଛି | ବିଭିନ୍ନ ଜୋନରେ ଜଳ �ব୍ୟବହାର ଅପ୍ଟିମାଇଜ୍ କରିବାକୁ ଭେରିଏବଲ୍ ରେଟ୍ ସିଞ୍ଚନ କାର୍ଯ୍ୟକାରୀ କରନ୍ତୁ |",
                rec_zones_impl: "ଉତ୍ତରୀୟ ଜୋନରେ ଜଳ ବଣ୍ଟନ 25% କମାନ୍ତୁ ଏବଂ ଦକ୍ଷିଣୀ ଜୋନରେ 10% ବୃଦ୍ଧି କରନ୍ତୁ |",
                rec_fertilization_title: "ନାଇଟ୍ରୋଜେନ୍ ସପ୍ଲିମେଣ୍ଟେସନ୍",
                rec_fertilization_desc: "ମୃତ୍ତିକା ପରୀକ୍ଷା ସୂଚାଏ ଯେ ମକା ବ growing ୁଚା ପର୍ଯ୍ୟାୟ ପାଇଁ ନାଇଟ୍ରୋଜେନ୍ ସ୍ତର ସର୍ବୋତ୍ତମଠାରୁ 15% ତଳେ | ନାଇଟ୍ରୋଜେନ୍-ଆଧାରିତ ସାରର 40 lbs/acre ପ୍ରୟୋଗ କରିବାକୁ ପରାମର୍ଶ ଦିଆଯାଏ |",
                rec_fertilization_impl: "ସର୍ବୋତ୍ତମ ଶୋଷଣ ପାଇଁ ପରବର୍ତ୍ତୀ ସିଞ୍ଚନ ଚକ୍ର �পୂର୍ବରୁ ୟୁରିଆ ସାର ପ୍ରୟୋଗ କରନ୍ତୁ |",
                rec_pest_title: "ପ୍ରତିଷେଧାତ୍ମକ କୀଟ ଉପାୟ",
                rec_pest_desc: "ମୌସୁମୀ ଅବସ୍ଥା ଏବଂ ଅଞ୍ଚଳଗତ ତଥ୍ୟ ପରବର୍ତ୍ତୀ 2-3 ସପ୍ତାହରେ କର୍ନ ବୋରରର ବ increasing ୁଥିବା ବିପଦ ସୂଚାଏ | ପ୍ରତିଷେଧାତ୍ମକ ଚିକିତ୍ସା ପ୍ରୟୋଗ କରିବାକୁ ପରାମର୍ଶ ଦିଆଯାଏ |",
                rec_pest_impl: "ବେସିଲସ୍ ଥୁରିଜିଏନ୍ସିସ୍ (Bt) ସ୍ପ୍ରେ ପ୍ରଭାତରେ ପ୍ରୟୋଗ କରନ୍ତୁ ଯେତେବେଳେ ତାପମାତ୍ରା 85°F ଠାରୁ କମ୍ ଥାଏ |",
                footer_company: "ଆଗ୍ରୋଗ୍ରୋ AI",
                footer_description: "କୃଷିର ରୂପାନ୍ତର ଏବଂ ବିଶ୍ୱବ୍ୟାପୀ ଖାଦ୍ୟ ସୁରକ୍ଷା ଉନ୍ନତ କରିବା ପାଇଁ କୃତ୍ରିମ ବୁଦ୍ଧିମତାର ଶକ୍ତି ବ୍ୟବହାର କରିବା |",
                footer_links: "ଦ୍ରୁତ ଲିଙ୍କ୍",
                footer_about: "ଆମ ବିଷୟରେ",
                footer_how: "ଏହା କିପରି କାମ କରେ",
                footer_pricing: "ମୂଲ୍ୟ",
                footer_contact: "ଯୋଗାଯୋଗ",
                footer_resources: "ସମ୍ବଳ",
                footer_blog: "ବ୍ଲଗ୍",
                footer_cases: "କେସ୍ ଷ୍ଟଡିଜ୍",
                footer_guide: "କୃଷକ ଗାଇଡ୍",
                footer_support: "ସମର୍ଥନ କେନ୍ଦ୍ର",
                footer_connect: "ଆମ ସହିତ ଯୋଗ କରନ୍ତୁ",
                footer_rights: "ସମସ୍ତ ଅଧିକାର ସଂରକ୍ଷିତ |"
            }
        };

        // DOM Elements
        const languageButton = document.querySelector('.language-button');
        const languageDropdown = document.getElementById('language-dropdown');
        const currentLanguage = document.getElementById('current-language');
        const signinBtn = document.getElementById('signin-btn');
        const registerBtn = document.getElementById('register-btn');
        const signinPopup = document.getElementById('signin-popup');
        const registrationPopup = document.getElementById('registration-popup');
        const closeSigninPopup = document.getElementById('close-signin-popup');
        const closeRegistrationPopup = document.getElementById('close-registration-popup');
        const showRegister = document.getElementById('show-register');
        const showSignin = document.getElementById('show-signin');
        const tabs = document.querySelectorAll('.tab');
        const tabContents = document.querySelectorAll('.tab-content');

        // Toggle language dropdown
        languageButton.addEventListener('click', () => {
            languageDropdown.classList.toggle('show');
        });

        // Close dropdown when clicking outside
        document.addEventListener('click', (e) => {
            if (!languageButton.contains(e.target) && !languageDropdown.contains(e.target)) {
                languageDropdown.classList.remove('show');
            }
        });

        // Language selection
        document.querySelectorAll('.language-option').forEach(option => {
            option.addEventListener('click', (e) => {
                e.preventDefault();
                const lang = option.getAttribute('data-lang');
                changeLanguage(lang);
                languageDropdown.classList.remove('show');
                
                // Update active language indicator
                document.querySelectorAll('.language-option').forEach(opt => {
                    opt.classList.remove('active');
                });
                option.classList.add('active');
            });
        });

        // Change page language
        function changeLanguage(lang) {
            // Update current language text
            currentLanguage.textContent = document.querySelector(`.language-option[data-lang="${lang}"] span`).textContent;
            
            // Update all translatable elements
            document.querySelectorAll('[data-translate]').forEach(element => {
                const key = element.getAttribute('data-translate');
                if (translations[lang][key]) {
                    element.textContent = translations[lang][key];
                }
            });
        }

        // Tab switching
        tabs.forEach(tab => {
            tab.addEventListener('click', () => {
                const tabId = tab.getAttribute('data-tab');
                
                // Update active tab
                tabs.forEach(t => t.classList.remove('active'));
                tab.classList.add('active');
                
                // Show corresponding content
                tabContents.forEach(content => {
                    content.classList.remove('active');
                    if (content.id === tabId) {
                        content.classList.add('active');
                    }
                });
            });
        });

        // Auth popup functionality
        signinBtn.addEventListener('click', () => {
            signinPopup.classList.add('active');
        });

        registerBtn.addEventListener('click', () => {
            registrationPopup.classList.add('active');
        });

        closeSigninPopup.addEventListener('click', () => {
            signinPopup.classList.remove('active');
        });

        closeRegistrationPopup.addEventListener('click', () => {
            registrationPopup.classList.remove('active');
        });

        showRegister.addEventListener('click', (e) => {
            e.preventDefault();
            signinPopup.classList.remove('active');
            registrationPopup.classList.add('active');
        });

        showSignin.addEventListener('click', (e) => {
            e.preventDefault();
            registrationPopup.classList.remove('active');
            signinPopup.classList.add('active');
        });

        // Close popups when clicking outside
        document.addEventListener('click', (e) => {
            if (e.target.classList.contains('popup-overlay')) {
                signinPopup.classList.remove('active');
                registrationPopup.classList.remove('active');
            }
        });

// Form submissions
document.getElementById('signin-form').addEventListener('submit', function(e) {
    e.preventDefault();
    
    const formData = new FormData(this);
    const messageDiv = document.getElementById('signin-message');
    messageDiv.innerHTML = 'Processing...';
    messageDiv.style.color = 'blue';
    
    fetch('login.php', {
        method: 'POST',
        body: formData
    })
    .then(response => {
        if (!response.ok) {
            throw new Error('Network response was not ok');
        }
        return response.json();
    })
    .then(data => {
        if (data.success) {
            messageDiv.style.color = 'green';
            messageDiv.innerHTML = data.message;
            
            // Redirect after successful login
            setTimeout(() => {
                window.location.reload();
            }, 1500);
        } else {
            messageDiv.style.color = 'red';
            messageDiv.innerHTML = data.message;
        }
    })
    .catch(error => {
        messageDiv.style.color = 'red';
        messageDiv.innerHTML = 'An error occurred. Please try again.';
        console.error('Error:', error);
    });
});

document.getElementById('registration-form').addEventListener('submit', function(e) {
    e.preventDefault();
    
    const formData = new FormData(this);
    const messageDiv = document.getElementById('register-message');
    messageDiv.innerHTML = 'Processing...';
    messageDiv.style.color = 'blue';
    
    // Check if passwords match
    const password = document.getElementById('password').value;
    const confirmPassword = document.getElementById('confirm-password').value;
    
    if (password !== confirmPassword) {
        messageDiv.style.color = 'red';
        messageDiv.innerHTML = 'Passwords do not match.';
        return;
    }
    
    fetch('register.php', {
        method: 'POST',
        body: formData
    })
    .then(response => {
        if (!response.ok) {
            throw new Error('Network response was not ok');
        }
        return response.json();
    })
    .then(data => {
        if (data.success) {
            messageDiv.style.color = 'green';
            messageDiv.innerHTML = data.message;
            
            // Clear form after successful registration
            document.getElementById('registration-form').reset();
            
            // Optionally switch to login form after successful registration
            setTimeout(() => {
                registrationPopup.classList.remove('active');
                signinPopup.classList.add('active');
            }, 2000);
        } else {
            messageDiv.style.color = 'red';
            messageDiv.innerHTML = data.message;
        }
    })
    .catch(error => {
        messageDiv.style.color = 'red';
        messageDiv.innerHTML = 'An error occurred. Please try again.';
        console.error('Error:', error);
    });
});

// Check if user is logged in
function checkLoginStatus() {
    fetch('check_login.php')
    .then(response => response.json())
    .then(data => {
        if (data.loggedin) {
            document.getElementById('user-status').style.display = 'block';
            document.getElementById('user-name').textContent = 'Welcome, ' + data.fullname;
            document.querySelector('.auth-buttons').style.display = 'none';
        } else {
            document.getElementById('user-status').style.display = 'none';
            document.querySelector('.auth-buttons').style.display = 'flex';
        }
    })
    .catch(error => {
        console.error('Error checking login status:', error);
    });
}

// Call this function when page loads
window.addEventListener('load', checkLoginStatus);
// Get Started button functionality
document.getElementById('get-started-btn').addEventListener('click', () => {
    registrationPopup.classList.add('active');
});

    </script>
</body>
</html>