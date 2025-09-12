<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AgriGrow AI - Prediction Dashboard</title>
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
        
        /* Prediction Dashboard */
        .prediction-dashboard {
            padding: 60px 0;
        }
        
        .section-title {
            text-align: center;
            margin-bottom: 40px;
            color: var(--dark);
        }
        
        .dashboard-tabs {
            display: flex;
            border-bottom: 1px solid #ddd;
            margin-bottom: 30px;
            overflow-x: auto;
        }
        
        .dashboard-tab {
            padding: 12px 24px;
            cursor: pointer;
            border-bottom: 3px solid transparent;
            transition: all 0.3s;
            white-space: nowrap;
        }
        
        .dashboard-tab.active {
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
        
        /* Weather Prediction Form */
        .weather-prediction {
            background: white;
            border-radius: 12px;
            padding: 30px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
            margin-bottom: 30px;
        }
        
        .form-title {
            font-size: 1.5rem;
            margin-bottom: 20px;
            color: var(--primary-dark);
            display: flex;
            align-items: center;
            gap: 10px;
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
            color: var(--text);
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
            box-shadow: 0 0 0 3px rgba(76, 175, 80, 0.1);
        }
        
        .btn-submit {
            background: var(--primary);
            color: white;
            padding: 12px 25px;
            border: none;
            border-radius: 6px;
            font-size: 16px;
            font-weight: 500;
            cursor: pointer;
            transition: background 0.3s;
            display: block;
            width: 100%;
            max-width: 300px;
            margin: 20px auto;
        }
        
        .btn-submit:hover {
            background: var(--primary-dark);
        }
        
        .btn-submit:disabled {
            background: #ccc;
            cursor: not-allowed;
        }
        
        /* Loading Animation */
        .loading {
            display: none;
            text-align: center;
            margin: 20px 0;
        }
        
        .loading-spinner {
            border: 4px solid #f3f3f3;
            border-top: 4px solid var(--primary);
            border-radius: 50%;
            width: 40px;
            height: 40px;
            animation: spin 1s linear infinite;
            margin: 0 auto;
        }
        
        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }
        
        /* Weather Result */
        .weather-result {
            background: var(--light);
            border-radius: 12px;
            padding: 25px;
            margin-top: 30px;
            display: none;
            animation: fadeIn 0.5s ease-in;
        }
        
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        
        .weather-result-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }
        
        .weather-location {
            font-size: 1.2rem;
            font-weight: 600;
            color: var(--primary-dark);
        }
        
        .weather-data {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 20px;
            margin-bottom: 25px;
        }
        
        .weather-item {
            text-align: center;
            padding: 15px;
            background: white;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
        }
        
        .weather-value {
            font-size: 1.8rem;
            font-weight: 700;
            color: var(--primary);
            margin: 10px 0;
        }
        
        .weather-label {
            color: var(--text-light);
            font-size: 0.9rem;
        }
        
        .success-rate {
            text-align: center;
            padding: 20px;
            background: white;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
        }
        
        .rate-value {
            font-size: 2.5rem;
            font-weight: 800;
            color: var(--primary);
            margin: 10px 0;
        }
        
        .rate-label {
            color: var(--text);
            font-size: 1.1rem;
        }
        
        /* Alert Messages */
        .alert {
            padding: 12px 15px;
            border-radius: 6px;
            margin-bottom: 20px;
            display: none;
        }
        
        .alert-error {
            background: #ffebee;
            color: #c62828;
            border-left: 4px solid #c62828;
        }
        
        /* Soil Analysis Form */
        .soil-analysis {
            background: white;
            border-radius: 12px;
            padding: 30px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
            margin-bottom: 30px;
        }
        
        .soil-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
            margin-bottom: 25px;
        }
        
        /* Soil Result */
        .soil-result {
            background: var(--light);
            border-radius: 12px;
            padding: 25px;
            margin-top: 30px;
            display: none;
        }
        
        .crop-recommendations {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
            margin-top: 20px;
        }
        
        .crop-card {
            background: white;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
            transition: transform 0.3s;
        }
        
        .crop-card:hover {
            transform: translateY(-5px);
        }
        
        .crop-header {
            background: var(--primary);
            color: white;
            padding: 15px 20px;
            font-weight: 500;
            display: flex;
            align-items: center;
            gap: 10px;
        }
        
        .crop-body {
            padding: 20px;
        }
        
        .crop-score {
            font-size: 2rem;
            font-weight: 700;
            color: var(--primary);
            margin: 10px 0;
            text-align: center;
        }
        
        .crop-details {
            list-style: none;
            margin-top: 15px;
        }
        
        .crop-details li {
            padding: 8px 0;
            border-bottom: 1px solid #eee;
            display: flex;
            justify-content: space-between;
        }
        
        .crop-details li:last-child {
            border-bottom: none;
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
            
            .dashboard-tabs {
                overflow-x: auto;
                white-space: nowrap;
            }
            
            .form-grid, .soil-grid {
                grid-template-columns: 1fr;
            }
            
            .weather-data {
                grid-template-columns: 1fr 1fr;
            }
            
            .crop-recommendations {
                grid-template-columns: 1fr;
            }
            
            .weather-result-header {
                flex-direction: column;
                align-items: flex-start;
                gap: 10px;
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
                        <li><a href="project.php" data-translate="nav_home">Home</a></li>
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
                        <button class="btn btn-outline" data-translate="btn_signin">Sign In</button>
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
                <h2 data-translate="prediction_hero_title">AI-Powered Crop Predictions</h2>
                <p data-translate="prediction_hero_description">Get accurate weather-based success rates and soil-specific crop recommendations for optimal farming outcomes.</p>
            </div>
        </div>
    </section>

    <!-- Prediction Dashboard -->
    <section class="prediction-dashboard">
        <div class="container">
            <h2 class="section-title" data-translate="section_predictions">Crop Prediction Dashboard</h2>
            
            <div class="dashboard-tabs">
                <div class="dashboard-tab active" data-tab="weather" data-translate="tab_weather">Weather-Based Prediction</div>
                <div class="dashboard-tab" data-tab="soil" data-translate="tab_soil">Soil-Based Recommendation</div>
            </div>
            
            <!-- Weather Prediction Tab -->
            <div class="tab-content active" id="weather">
                <div class="weather-prediction">
                    <h3 class="form-title"><i class="fas fa-cloud-sun"></i> <span data-translate="weather_title">Weather-Based Crop Success Prediction</span></h3>
                    <p data-translate="weather_description">Enter your location and crop details to get real-time weather analysis and success rate prediction.</p>
                    
                    <!-- Error Alert -->
                    <div class="alert alert-error" id="weather-error">
                        <i class="fas fa-exclamation-circle"></i>
                        <span id="error-message">Please fill in all required fields</span>
                    </div>
                    
                    <div class="form-grid">
                        <div class="form-group">
                            <label for="location" data-translate="label_location">Farm Location</label>
                            <input type="text" id="location" class="form-control" placeholder="Enter your city or coordinates" required>
                        </div>
                        
                        <div class="form-group">
                            <label for="crop-type" data-translate="label_crop_type">Crop Type</label>
                            <select id="crop-type" class="form-control" required>
                                <option value="" data-translate="option_select_crop">Select a crop</option>
                                <option value="wheat" data-translate="crop_wheat">Wheat</option>
                                <option value="corn" data-translate="crop_corn">Corn</option>
                                <option value="rice" data-translate="crop_rice">Rice</option>
                                <option value="soybean" data-translate="crop_soybean">Soybean</option>
                                <option value="cotton" data-translate="crop_cotton">Cotton</option>
                            </select>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="crop-variety" data-translate="label_crop_variety">Crop Variety (Optional)</label>
                        <input type="text" id="crop-variety" class="form-control" placeholder="Enter specific variety if known">
                    </div>
                    
                    <!-- Loading Indicator -->
                    <div class="loading" id="weather-loading">
                        <div class="loading-spinner"></div>
                        <p data-translate="text_analyzing">Analyzing weather data and predicting success rate...</p>
                    </div>
                    
                    <button class="btn-submit" id="weather-submit" data-translate="btn_analyze_weather">
                        <i class="fas fa-cloud-sun-rain"></i> Analyze Weather & Predict Success
                    </button>
                    
                    <!-- Weather Results -->
                    <div class="weather-result" id="weather-result">
                        <div class="weather-result-header">
                            <div class="weather-location">
                                <i class="fas fa-map-marker-alt"></i>
                                <span id="result-location">Bhubaneswar, Odisha</span>
                            </div>
                            <div class="weather-update">
                                <i class="fas fa-sync-alt"></i> <span data-translate="label_last_updated">Last updated:</span> <span id="update-time">Just now</span>
                            </div>
                        </div>
                        
                        <div class="weather-data">
                            <div class="weather-item">
                                <div class="weather-label" data-translate="label_temperature">Temperature</div>
                                <div class="weather-value" id="weather-temp">28°C</div>
                                <div class="weather-status" data-translate="status_ideal">Ideal for <span id="temp-crop">corn</span></div>
                            </div>
                            
                            <div class="weather-item">
                                <div class="weather-label" data-translate="label_humidity">Humidity</div>
                                <div class="weather-value" id="weather-humidity">65%</div>
                                <div class="weather-status" data-translate="status_optimal">Optimal range</div>
                            </div>
                            
                            <div class="weather-item">
                                <div class="weather-label" data-translate="label_rainfall">Rainfall</div>
                                <div class="weather-value" id="weather-rain">12mm</div>
                                <div class="weather-status" data-translate="status_adequate">Adequate</div>
                            </div>
                            
                            <div class="weather-item">
                                <div class="weather-label" data-translate="label_sunlight">Sunlight</div>
                                <div class="weather-value" id="weather-sun">6.5 hrs</div>
                                <div class="weather-status" data-translate="status_sufficient">Sufficient</div>
                            </div>
                        </div>
                        
                        <div class="success-rate">
                            <div class="weather-label" data-translate="label_success_rate">Predicted Success Rate</div>
                            <div class="rate-value" id="success-rate">82%</div>
                            <div class="rate-label" data-translate="label_success_based">Based on current weather conditions and historical data</div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Soil Analysis Tab -->
            <div class="tab-content" id="soil">
                <div class="soil-analysis">
                    <h3 class="form-title"><i class="fas fa-vial"></i> <span data-translate="soil_title">Soil-Based Crop Recommendation</span></h3>
                    <p data-translate="soil_description">Enter your soil details to get personalized crop recommendations based on your soil health.</p>
                    
                    <div class="soil-grid">
                        <div class="form-group">
                            <label for="soil-ph" data-translate="label_soil_ph">Soil pH Level</label>
                            <input type="number" id="soil-ph" class="form-control" placeholder="Enter pH value (0-14)" min="0" max="14" step="0.1">
                        </div>
                        
                        <div class="form-group">
                            <label for="soil-npk" data-translate="label_soil_npk">NPK Ratio (N-P-K)</label>
                            <input type="text" id="soil-npk" class="form-control" placeholder="e.g., 4-3-3">
                        </div>
                    </div>
                    
                    <div class="soil-grid">
                        <div class="form-group">
                            <label for="soil-type" data-translate="label_soil_type">Soil Type</label>
                            <select id="soil-type" class="form-control">
                                <option value="" data-translate="option_select_soil">Select soil type</option>
                                <option value="sandy" data-translate="soil_sandy">Sandy</option>
                                <option value="loamy" data-translate="soil_loamy">Loamy</option>
                                <option value="clay" data-translate="soil_clay">Clay</option>
                                <option value="silt" data-translate="soil_silt">Silt</option>
                            </select>
                        </div>
                        
                        <div class="form-group">
                            <label for="soil-moisture" data-translate="label_soil_moisture">Moisture Retention</label>
                            <select id="soil-moisture" class="form-control">
                                <option value="" data-translate="option_select_moisture">Select moisture level</option>
                                <option value="low" data-translate="moisture_low">Low</option>
                                <option value="medium" data-translate="moisture_medium">Medium</option>
                                <option value="high" data-translate="moisture_high">High</option>
                            </select>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="organic-matter" data-translate="label_organic_matter">Organic Matter Content (%)</label>
                        <input type="number" id="organic-matter" class="form-control" placeholder="Enter percentage" min="0" max="100" step="0.1">
                    </div>
                    
                    <button class="btn-submit" id="soil-submit" data-translate="btn_analyze_soil">Analyze Soil & Get Recommendations</button>
                    
                    <!-- Soil Results -->
                    <div class="soil-result" id="soil-result">
                        <h3 class="form-title"><i class="fas fa-seedling"></i> <span data-translate="soil_result_title">Recommended Crops For Your Soil</span></h3>
                        <p data-translate="soil_result_description">Based on your soil analysis, these crops would grow best on your land:</p>
                        
                        <div class="crop-recommendations">
                            <div class="crop-card">
                                <div class="crop-header">
                                    <i class="fas fa-wheat-alt"></i>
                                    <span data-translate="crop_wheat">Wheat</span>
                                </div>
                                <div class="crop-body">
                                    <div class="crop-score">92%</div>
                                    <div class="crop-match" data-translate="match_excellent">Excellent Match</div>
                                    <ul class="crop-details">
                                        <li><span data-translate="detail_ph">pH Compatibility:</span> <span data-translate="status_optimal">Optimal</span></li>
                                        <li><span data-translate="detail_nutrients">Nutrient Needs:</span> <span data-translate="status_well_suited">Well-Suited</span></li>
                                        <li><span data-translate="detail_water">Water Needs:</span> <span data-translate="water_moderate">Moderate</span></li>
                                    </ul>
                                </div>
                            </div>
                            
                            <div class="crop-card">
                                <div class="crop-header">
                                    <i class="fas fa-corn"></i>
                                    <span data-translate="crop_corn">Corn</span>
                                </div>
                                <div class="crop-body">
                                    <div class="crop-score">85%</div>
                                    <div class="crop-match" data-translate="match_very_good">Very Good Match</div>
                                    <ul class="crop-details">
                                        <li><span data-translate="detail_ph">pH Compatibility:</span> <span data-translate="status_good">Good</span></li>
                                        <li><span data-translate="detail_nutrients">Nutrient Needs:</span> <span data-translate="status_well_suited">Well-Suited</span></li>
                                        <li><span data-translate="detail_water">Water Needs:</span> <span data-translate="water_high">High</span></li>
                                    </ul>
                                </div>
                            </div>
                            
                            <div class="crop-card">
                                <div class="crop-header">
                                    <i class="fas fa-leaf"></i>
                                    <span data-translate="crop_soybean">Soybean</span>
                                </div>
                                <div class="crop-body">
                                    <div class="crop-score">78%</div>
                                    <div class="crop-match" data-translate="match_good">Good Match</div>
                                    <ul class="crop-details">
                                        <li><span data-translate="detail_ph">pH Compatibility:</span> <span data-translate="status_acceptable">Acceptable</span></li>
                                        <li><span data-translate="detail_nutrients">Nutrient Needs:</span> <span data-translate="status_adequate">Adequate</span></li>
                                        <li><span data-translate="detail_water">Water Needs:</span> <span data-translate="water_moderate">Moderate</span></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
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

    <script>
        // Language data for English, Hindi, and Odia
        const translations = {
            en: {
                website_title: "AgriGrow AI",
                nav_home: "Home",
                nav_predictions: "Predictions",
                nav_recommendations: "Recommendations",
                nav_history: "History",
                btn_signin: "Sign In",
                btn_register: "Register",
                prediction_hero_title: "AI-Powered Crop Predictions",
                prediction_hero_description: "Get accurate weather-based success rates and soil-specific crop recommendations for optimal farming outcomes.",
                section_predictions: "Crop Prediction Dashboard",
                tab_weather: "Weather-Based Prediction",
                tab_soil: "Soil-Based Recommendation",
                weather_title: "Weather-Based Crop Success Prediction",
                weather_description: "Enter your location and crop details to get real-time weather analysis and success rate prediction.",
                label_location: "Farm Location",
                label_crop_type: "Crop Type",
                option_select_crop: "Select a crop",
                crop_wheat: "Wheat",
                crop_corn: "Corn",
                crop_rice: "Rice",
                crop_soybean: "Soybean",
                crop_cotton: "Cotton",
                label_crop_variety: "Crop Variety (Optional)",
                btn_analyze_weather: "Analyze Weather & Predict Success",
                text_analyzing: "Analyzing weather data and predicting success rate...",
                label_last_updated: "Last updated:",
                label_temperature: "Temperature",
                status_ideal: "Ideal for",
                label_humidity: "Humidity",
                status_optimal: "Optimal range",
                label_rainfall: "Rainfall",
                status_adequate: "Adequate",
                label_sunlight: "Sunlight",
                status_sufficient: "Sufficient",
                label_success_rate: "Predicted Success Rate",
                label_success_based: "Based on current weather conditions and historical data",
                soil_title: "Soil-Based Crop Recommendation",
                soil_description: "Enter your soil details to get personalized crop recommendations based on your soil health.",
                label_soil_ph: "Soil pH Level",
                label_soil_npk: "NPK Ratio (N-P-K)",
                label_soil_type: "Soil Type",
                option_select_soil: "Select soil type",
                soil_sandy: "Sandy",
                soil_loamy: "Loamy",
                soil_clay: "Clay",
                soil_silt: "Silt",
                label_soil_moisture: "Moisture Retention",
                option_select_moisture: "Select moisture level",
                moisture_low: "Low",
                moisture_medium: "Medium",
                moisture_high: "High",
                label_organic_matter: "Organic Matter Content (%)",
                btn_analyze_soil: "Analyze Soil & Get Recommendations",
                soil_result_title: "Recommended Crops For Your Soil",
                soil_result_description: "Based on your soil analysis, these crops would grow best on your land:",
                match_excellent: "Excellent Match",
                match_very_good: "Very Good Match",
                match_good: "Good Match",
                detail_ph: "pH Compatibility:",
                status_optimal: "Optimal",
                status_good: "Good",
                status_acceptable: "Acceptable",
                detail_nutrients: "Nutrient Needs:",
                status_well_suited: "Well-Suited",
                status_adequate: "Adequate",
                detail_water: "Water Needs:",
                water_moderate: "Moderate",
                water_high: "High",
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
                nav_home: "होम",
                nav_predictions: "पूर्वानुमान",
                nav_recommendations: "सिफारिशें",
                nav_history: "इतिहास",
                btn_signin: "साइन इन",
                btn_register: "पंजीकरण",
                prediction_hero_title: "AI-संचालित फसल पूर्वानुमान",
                prediction_hero_description: "इष्टतम कृषि परिणामों के लिए सटीक मौसम-आधारित सफलता दर और मिट्टी-विशिष्ट फसल सिफारिशें प्राप्त करें।",
                section_predictions: "फसल पूर्वानुमान डैशबोर्ड",
                tab_weather: "मौसम-आधारित पूर्वानुमान",
                tab_soil: "मिट्टी-आधारित सिफारिश",
                weather_title: "मौसम-आधारित फसल सफलता पूर्वानुमान",
                weather_description: "रीयल-टाइम मौसम विश्लेषण और सफलता दर पूर्वानुमान प्राप्त करने के लिए अपना स्थान और फसल विवरण दर्ज करें।",
                label_location: "खेत का स्थान",
                label_crop_type: "फसल का प्रकार",
                option_select_crop: "एक फसल चुनें",
                crop_wheat: "गेहूं",
                crop_corn: "मक्का",
                crop_rice: "चावल",
                crop_soybean: "सोयाबीन",
                crop_cotton: "कपास",
                label_crop_variety: "फसल किस्म (वैकल्पिक)",
                btn_analyze_weather: "मौसम का विश्लेषण करें और सफलता का अनुमान लगाएं",
                text_analyzing: "मौसम डेटा का विश्लेषण और सफलता दर की भविष्यवाणी...",
                label_last_updated: "अंतिम अपडेट:",
                label_temperature: "तापमान",
                status_ideal: "के लिए आदर्श",
                label_humidity: "नमी",
                status_optimal: "इष्टतम सीमा",
                label_rainfall: "वर्षा",
                status_adequate: "पर्याप्त",
                label_sunlight: "सूरज की रोशनी",
                status_sufficient: "पर्याप्त",
                label_success_rate: "अनुमानित सफलता दर",
                label_success_based: "वर्तमान मौसम की स्थिति और ऐतिहासिक डेटा के आधार पर",
                soil_title: "मिट्टी-आधारित फसल सिफारिश",
                soil_description: "अपने मिट्टी के स्वास्थ्य के आधार पर व्यक्तिगत फसल सिफारिशें प्राप्त करने के लिए अपने मिट्टी का विवरण दर्ज करें।",
                label_soil_ph: "मिट्टी का pH स्तर",
                label_soil_npk: "NPK अनुपात (N-P-K)",
                label_soil_type: "मिट्टी का प्रकार",
                option_select_soil: "मिट्टी का प्रकार चुनें",
                soil_sandy: "बलुई",
                soil_loamy: "दोमट",
                soil_clay: "चिकनी",
                soil_silt: "गाद",
                label_soil_moisture: "नमी धारण",
                option_select_moisture: "नमी का स्तर चुनें",
                moisture_low: "कम",
                moisture_medium: "मध्यम",
                moisture_high: "उच्च",
                label_organic_matter: "कार्बनिक पदार्थ सामग्री (%)",
                btn_analyze_soil: "मिट्टी का विश्लेषण करें और सिफारिशें प्राप्त करें",
                soil_result_title: "आपकी मिट्टी के लिए अनुशंसित फसलें",
                soil_result_description: "आपके मिट्टी विश्लेषण के आधार पर, ये फसलें आपकी भूमि पर सबसे अच्छी तरह से उगेंगी:",
                match_excellent: "उत्कृष्ट मेल",
                match_very_good: "बहुत अच्छा मेल",
                match_good: "अच्छा मेल",
                detail_ph: "pH अनुकूलता:",
                status_optimal: "इष्टतम",
                status_good: "अच्छा",
                status_acceptable: "स्वीकार्य",
                detail_nutrients: "पोषक तत्व आवश्यकताएँ:",
                status_well_suited: "अच्छी तरह से अनुकूल",
                status_adequate: "पर्याप्त",
                detail_water: "पानी की आवश्यकताएँ:",
                water_moderate: "मध्यम",
                water_high: "उच्च",
                footer_company: "एग्रीग्रो एआई",
                footer_description: "कृषि को रूपांतरित करने और विश्वव्यापी खाद्य सुरक्षा में सुधार के लिए कृत्रिम बुद्धिमत्ता की शक्ति का उपयोग करना।",
                footer_links: "त्वरित लिंक",
                footer_about: "हमारे बारे में",
                footer_how: "यह कैसे काम करता है",
                footer_pricing: "मूल्य निर्धारण",
                footer_contact: "संपर्क करें",
                footer_resources: "संसाधन",
                footer_blog: "ब्लॉグ",
                footer_cases: "केस स्टडी",
                footer_guide: "किसान मार्गदर्शिका",
                footer_support: "सहायता केंद्र",
                footer_connect: "हमसे जुड़ें",
                footer_rights: "सर्वाधिकार सुरक्षित।"
            },
            or: {
                website_title: "ଆଗ୍ରୋଗ୍ରୋ ଏ.ଆଇ.",
                nav_home: "ମୁଖ୍ୟ ପୃଷ୍ଠା",
                nav_predictions: "ଭବିଷ୍ୟବାଣୀ",
                nav_recommendations: "ପରାମର୍ଶ",
                nav_history: "ଇତିହାସ",
                btn_signin: "ସାଇନ ଇନ",
                btn_register: "ପଞ୍ଜିକରଣ",
                prediction_hero_title: "କୃତ୍ରିମ ବୁଦ୍ଧିଚାଳିତ ଫସଲ ଭବିଷ୍ୟବାଣୀ",
                prediction_hero_description: "ଉତ୍କୃଷ୍ଟ ଚାଷ ଫଳାଫଳ ପାଇଁ ସଠିକ୍ ପାଣିପାଗ-ଆଧାରିତ ସଫଳତା ହାର ଏବଂ ମୃତ୍ତିକା-ନିର୍ଦ୍ଦିଷ୍ଟ ଫସଲ ପରାମର୍ଶ ପ୍ରାପ୍ତ କରନ୍ତୁ।",
                section_predictions: "ଫସଲ ଭବିଷ୍ୟବାଣୀ ଡ୍ୟାସବୋର୍ଡ",
                tab_weather: "ପାଣିପାଗ-ଆଧାରିତ ଭବିଷ୍ୟବାଣୀ",
                tab_soil: "ମୃତ୍ତିକା-ଆଧାରିତ ପରାମର୍ଶ",
                weather_title: "ପାଣିପାଗ-ଆଧାରିତ ଫସଲ ସଫଳତା ଭବିଷ୍ୟବାଣୀ",
                weather_description: "ରିଆଲ-ଟାଇମ୍ ପାଣିପାଗ ବିଶ୍ଲେଷଣ ଏବଂ ସଫଳତା ହାର ଭବିଷ୍ୟବାଣୀ ପାଇବା ପାଇଁ ଆପଣଙ୍କର ଅବସ୍ଥିତି ଏବଂ ଫସଲ ବିବରଣୀ ପ୍ରବେଶ କରନ୍ତୁ।",
                label_location: "ଚାଷ ଜମିର ଅବସ୍ଥିତି",
                label_crop_type: "ଫସଲର ପ୍ରକାର",
                option_select_crop: "ଏକ ଫସଲ ବାଛନ୍ତୁ",
                crop_wheat: "ଗହମ",
                crop_corn: "ମକା",
                crop_rice: "ଚାଉଳ",
                crop_soybean: "ସୋୟାବିନ",
                crop_cotton: "କପା",
                label_crop_variety: "ଫସଲ ପ୍ରଜାତି (ବୈକଳ୍ପିକ)",
                btn_analyze_weather: "ପାଣିପାଗ ବିଶ୍ଲେଷଣ କରନ୍ତୁ ଏବଂ ସଫଳତା ଭବିଷ୍ୟବାଣୀ କରନ୍ତୁ",
                text_analyzing: "ପାଣିପାଗ ତଥ୍ୟ ବିଶ୍ଲେଷଣ ଏବଂ ସଫଳତା ହାର ଭବିଷ୍ୟବାଣୀ କରୁଅଛି...",
                label_last_updated: "ଶେଷ ଅଦ୍ୟତନ:",
                label_temperature: "ତାପମାତ୍ରା",
                status_ideal: "ପାଇଁ ଆଦର୍ଶ",
                label_humidity: "ଆର୍ଦ୍ରତା",
                status_optimal: "ସର୍ବୋତ୍ତମ ପରିସର",
                label_rainfall: "ବର୍ଷା",
                status_adequate: "ପର୍ଯ୍ୟାପ୍ତ",
                label_sunlight: "ସୂର୍ଯ୍ୟାଲୋକ",
                status_sufficient: "ପର୍ଯ୍ୟାପ୍ତ",
                label_success_rate: "ଅନୁମାନିତ ସଫଳତା ହାର",
                label_success_based: "ବର୍ତ୍ତମାନର ପାଣିପାଗ ଅବସ୍ଥା ଏବଂ historical ଐତିହାସିକ ତଥ୍ୟ ଉପରେ ଆଧାରିତ",
                soil_title: "ମୃତ୍ତିକା-ଆଧାରିତ ଫସଲ ପରାମର୍ଶ",
                soil_description: "ଆପଣଙ୍କର ମୃତ୍ତିକା ସ୍ୱାସ୍ଥ୍ୟ ଉପରେ ଆଧାରିତ ବ୍ୟକ୍ତିଗତ ଫସଲ ପରାମର୍ଶ ପାଇବା ପାଇଁ ଆପଣଙ୍କର ମୃତ୍ତିକା ବିବରଣୀ ପ୍ରବେଶ କରନ୍ତୁ।",
                label_soil_ph: "ମୃତ୍ତିକା pH ସ୍ତର",
                label_soil_npk: "NPK ଅନୁପାତ (N-P-K)",
                label_soil_type: "ମୃତ୍ତିକାର ପ୍ରକାର",
                option_select_soil: "ମୃତ୍ତିକାର ପ୍ରକାର ବାଛନ୍ତୁ",
                soil_sandy: "ବାଲୁକାମୟ",
                soil_loamy: "ଦୋଆଁଶ",
                soil_clay: "ମାଟି",
                soil_silt: "ପାଣିଶୋଷା",
                label_soil_moisture: "ଆର୍ଦ୍ରତା ଧାରଣ",
                option_select_moisture: "ଆର୍ଦ୍ରତା ସ୍ତର ବାଛନ୍ତୁ",
                moisture_low: "ନିମ୍ନ",
                moisture_medium: "ମଧ୍ୟମ",
                moisture_high: "ଉଚ୍ଚ",
                label_organic_matter: "ଜୈବିକ ପଦାର୍ଥ ବିଷୟବସ୍ତୁ (%)",
                btn_analyze_soil: "ମୃତ୍ତିକା ବିଶ୍ଲେଷଣ କରନ୍ତୁ ଏବଂ ପରାମର୍ଶ ପ୍ରାପ୍ତ କରନ୍ତୁ",
                soil_result_title: "ଆପଣଙ୍କ ମୃତ୍ତିକା ପାଇଁ ପରାମର୍ଶିତ ଫସଲ",
                soil_result_description: "ଆପଣଙ୍କର ମୃତ୍ତିକା �बିଶ୍ଲେଷଣ ଉପରେ ଆଧାରିତ, ଏହି ଫସଲଗୁଡିକ ଆପଣଙ୍କ ଜମିରେ ସବୁଠାରୁ ଭଲ ବଢ଼ିବ:",
                match_excellent: "ଉତ୍କୃଷ୍ଟ ମେଳ",
                match_very_good: "ବହୁତ ଭଲ ମେଳ",
                match_good: "ଭଲ ମେଳ",
                detail_ph: "pH ସୁସଙ୍ଗତତା:",
                status_optimal: "ସର୍ବୋତ୍ତମ",
                status_good: "ଭଲ",
                status_acceptable: "ଗ୍ରହଣୀୟ",
                detail_nutrients: "ପୋଷକ ଆବଶ୍ୟକତା:",
                status_well_suited: "ଭଲ ଭାବରେ ଉପଯୁକ୍ତ",
                status_adequate: "ପର୍ଯ୍ୟାପ୍ତ",
                detail_water: "ଜଳ ଆବଶ୍ୟକତା:",
                water_moderate: "ମଧ୍ୟମ",
                water_high: "ଉଚ୍ଚ",
                footer_company: "ଆଗ୍ରୋଗ୍ରୋ ଏ.ଆଇ.",
                footer_description: "କୃଷି ରୂପାନ୍ତର ଏବଂ ବିଶ୍ୱବ୍ୟାପୀ ଖାଦ୍ୟ ସୁରକ୍ଷା ଉନ୍ନତ କରିବା ପାଇଁ କୃତ୍ରିମ ବୁଦ୍ଧିମତାର ଶକ୍ତି ବ୍ୟବହାର କରିବା।",
                footer_links: "ଦ୍ରୁତ ଲିଙ୍କ୍",
                footer_about: "ଆମ ବିଷୟରେ",
                footer_how: "ଏହା କିପରି କାମ କରେ",
                footer_pricing: "ମୂଲ୍ୟ ନିର୍ଧାରଣ",
                footer_contact: "ଯୋଗାଯୋଗ କରନ୍ତୁ",
                footer_resources: "ସମ୍ବଳ",
                footer_blog: "ବ୍ଲଗ୍",
                footer_cases: "କେସ୍ ଷ୍ଟଡି",
                footer_guide: "କୃଷକ ଗାଇଡ୍",
                footer_support: "ସହାୟତା କେନ୍ଦ୍ର",
                footer_connect: "ଆମ ସହିତ ଯୋଗାଯୋଗ କରନ୍ତୁ",
                footer_rights: "ସମସ୍ତ ଅଧିକାର ସଂରକ୍ଷିତ।"
            }
        };

        // Set default language
        let currentLanguage = 'en';
        const defaultLanguage = 'en';

        // DOM elements
        const languageButton = document.querySelector('.language-button');
        const languageDropdown = document.getElementById('language-dropdown');
        const currentLanguageElement = document.getElementById('current-language');
        const languageOptions = document.querySelectorAll('.language-option');
        const weatherSubmitBtn = document.getElementById('weather-submit');
        const weatherErrorAlert = document.getElementById('weather-error');
        const errorMessage = document.getElementById('error-message');
        const weatherLoading = document.getElementById('weather-loading');
        const weatherResult = document.getElementById('weather-result');

        // Toggle language dropdown
        languageButton.addEventListener('click', function(e) {
            e.stopPropagation();
            languageDropdown.classList.toggle('show');
        });

        // Close dropdown when clicking outside
        document.addEventListener('click', function(e) {
            if (!languageButton.contains(e.target) && !languageDropdown.contains(e.target)) {
                languageDropdown.classList.remove('show');
            }
        });

        // Change language
        languageOptions.forEach(option => {
            option.addEventListener('click', function(e) {
                e.preventDefault();
                const lang = this.getAttribute('data-lang');
                
                // Update UI
                languageOptions.forEach(opt => opt.classList.remove('active'));
                this.classList.add('active');
                
                // Change language
                changeLanguage(lang);
                
                // Close dropdown
                languageDropdown.classList.remove('show');
            });
        });

        // Change language function
        function changeLanguage(lang) {
            if (!translations[lang]) {
                console.error(`Translations for language "${lang}" not found.`);
                return;
            }
            
            currentLanguage = lang;
            
            // Update all elements with data-translate attribute
            document.querySelectorAll('[data-translate]').forEach(element => {
                const key = element.getAttribute('data-translate');
                if (translations[lang][key]) {
                    if (element.tagName === 'INPUT' || element.tagName === 'SELECT') {
                        element.placeholder = translations[lang][key];
                    } else {
                        element.textContent = translations[lang][key];
                    }
                }
            });
            
            // Update current language text
            const languageNames = {
                'en': 'English',
                'hi': 'हिन्दी',
                'or': 'ଓଡ଼ିଆ'
            };
            
            if (languageNames[lang]) {
                currentLanguageElement.textContent = languageNames[lang];
            }
            
            // Save language preference to localStorage
            localStorage.setItem('preferredLanguage', lang);
        }

        // Weather form submission
        weatherSubmitBtn.addEventListener('click', function() {
            const location = document.getElementById('location').value;
            const cropType = document.getElementById('crop-type').value;
            
            // Validate form
            if (!location || !cropType) {
                showError(currentLanguage === 'en' ? 'Please enter both location and crop type' : 
                         currentLanguage === 'hi' ? 'कृपया स्थान और फसल प्रकार दोनों दर्ज करें' :
                         'ଦୟାକରି ଅବସ୍ଥିତି ଏବଂ ଫସଲ ପ୍ରକାର ଉଭୟ ପ୍ରବେଶ କରନ୍ତୁ');
                return;
            }
            
            // Hide any previous error
            hideError();
            
            // Show loading state
            weatherLoading.style.display = 'block';
            weatherSubmitBtn.disabled = true;
            
            // Simulate API call with random data
            setTimeout(() => {
                simulateWeatherAnalysis(location, cropType);
                weatherLoading.style.display = 'none';
                weatherSubmitBtn.disabled = false;
            }, 2000); // Simulate 2 second API delay
        });
        
        // Show error message
        function showError(message) {
            errorMessage.textContent = message;
            weatherErrorAlert.style.display = 'block';
        }
        
        // Hide error message
        function hideError() {
            weatherErrorAlert.style.display = 'none';
        }
        
        // Simulate weather analysis with random data
        function simulateWeatherAnalysis(location, cropType) {
            // Update location
            document.getElementById('result-location').textContent = location;
            
            // Generate random weather data
            const temp = 20 + Math.floor(Math.random() * 20); // 20-40°C
            const humidity = 40 + Math.floor(Math.random() * 40); // 40-80%
            const rainfall = Math.floor(Math.random() * 30); // 0-30mm
            const sunlight = 4 + (Math.random() * 8).toFixed(1); // 4-12 hours
            
            // Update weather values
            document.getElementById('weather-temp').textContent = `${temp}°C`;
            document.getElementById('weather-humidity').textContent = `${humidity}%`;
            document.getElementById('weather-rain').textContent = `${rainfall}mm`;
            document.getElementById('weather-sun').textContent = `${sunlight} hrs`;
            document.getElementById('temp-crop').textContent = cropType;
            
            // Calculate success rate based on conditions
            let successRate = 70; // Base rate
            
            // Adjust based on temperature
            if (temp >= 22 && temp <= 32) successRate += 10;
            else if (temp < 15 || temp > 35) successRate -= 15;
            
            // Adjust based on humidity
            if (humidity >= 50 && humidity <= 70) successRate += 8;
            else if (humidity < 30 || humidity > 85) successRate -= 10;
            
            // Adjust based on rainfall
            if (rainfall >= 10 && rainfall <= 25) successRate += 7;
            else if (rainfall < 5 || rainfall > 35) successRate -= 12;
            
            // Adjust based on sunlight
            if (sunlight >= 6 && sunlight <= 10) successRate += 5;
            else if (sunlight < 4 || sunlight > 12) successRate -= 8;
            
            // Ensure rate is between 0-100
            successRate = Math.max(0, Math.min(100, successRate));
            
            // Update success rate
            document.getElementById('success-rate').textContent = `${Math.round(successRate)}%`;
            
            // Show results
            weatherResult.style.display = 'block';
            
            // Update time
            const now = new Date();
            document.getElementById('update-time').textContent = now.toLocaleTimeString();
        }

        // Initialize language on page load
        document.addEventListener('DOMContentLoaded', function() {
            // Check for saved language preference or use browser language
            const savedLanguage = localStorage.getItem('preferredLanguage');
            const browserLanguage = navigator.language.substring(0, 2);
            
            let langToUse = defaultLanguage;
            
            if (savedLanguage && translations[savedLanguage]) {
                langToUse = savedLanguage;
            } else if (translations[browserLanguage]) {
                langToUse = browserLanguage;
            }
            
            // Update language option UI
            languageOptions.forEach(option => {
                if (option.getAttribute('data-lang') === langToUse) {
                    option.classList.add('active');
                } else {
                    option.classList.remove('active');
                }
            });
            
            // Change to the detected language
            changeLanguage(langToUse);
            
            // Tab functionality
            const tabs = document.querySelectorAll('.dashboard-tab');
            
            tabs.forEach(tab => {
                tab.addEventListener('click', () => {
                    // Remove active class from all tabs and content
                    document.querySelectorAll('.dashboard-tab').forEach(t => t.classList.remove('active'));
                    document.querySelectorAll('.tab-content').forEach(c => c.classList.remove('active'));
                    
                    // Add active class to clicked tab
                    tab.classList.add('active');
                    
                    // Show corresponding content
                    const tabId = tab.getAttribute('data-tab');
                    document.getElementById(tabId).classList.add('active');
                });
            });
            
            // Soil form submission
            document.getElementById('soil-submit').addEventListener('click', function() {
                const soilPH = document.getElementById('soil-ph').value;
                const soilNPK = document.getElementById('soil-npk').value;
                const soilType = document.getElementById('soil-type').value;
                
                if (!soilPH || !soilNPK || !soilType) {
                    alert(currentLanguage === 'en' ? 'Please fill all required soil fields' : 
                          currentLanguage === 'hi' ? 'कृपया सभी आवश्यक मिट्टी फ़ील्ड भरें' :
                          'ଦୟାକରି ସମସ୍ତ ଆବଶ୍ୟକ ମୃତ୍ତିକା କ୍ଷେତ୍ର ପୂରଣ କରନ୍ତୁ');
                    return;
                }
                
                // Show soil results
                document.getElementById('soil-result').style.display = 'block';
            });
        });
    </script>
</body>
</html>