<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --primary-color: #3498db;
            --secondary-color: #2c3e50;
            --light-bg: #f8f9fa;
        }
        
        body {
            background-color: #f5f7fb;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        
        .profile-container {
            max-width: 1200px;
            margin: 40px auto;
        }
        
        .profile-card {
            border-radius: 10px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.08);
            border: none;
            margin-bottom: 25px;
        }
        
        .profile-header {
            background: linear-gradient(135deg, var(--secondary-color), var(--primary-color));
            color: white;
            border-radius: 10px 10px 0 0;
            padding: 30px;
            text-align: center;
        }
        
        .profile-picture {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            object-fit: cover;
            border: 5px solid rgba(255,255,255,0.3);
            margin: 0 auto 20px;
        }
        
        .profile-stats {
            display: flex;
            justify-content: center;
            gap: 30px;
            margin-top: 20px;
        }
        
        .stat-item {
            text-align: center;
        }
        
        .stat-number {
            font-size: 1.8rem;
            font-weight: 700;
        }
        
        .stat-label {
            font-size: 0.9rem;
            opacity: 0.8;
        }
        
        .info-card {
            border-left: 4px solid var(--primary-color);
            background: white;
        }
        
        .info-item {
            padding: 15px 20px;
            border-bottom: 1px solid #eee;
            display: flex;
        }
        
        .info-item:last-child {
            border-bottom: none;
        }
        
        .info-label {
            font-weight: 600;
            min-width: 150px;
            color: var(--secondary-color);
        }
        
        .section-title {
            border-left: 4px solid var(--primary-color);
            padding-left: 15px;
            margin: 30px 0 20px;
            color: var(--secondary-color);
        }
        
        .badge-pill {
            border-radius: 20px;
            padding: 6px 15px;
            font-weight: normal;
        }
        
        .skill-item {
            background: var(--light-bg);
            border-radius: 20px;
            padding: 8px 15px;
            margin: 5px;
            display: inline-block;
        }
        
        .activity-item {
            padding: 15px 0;
            border-bottom: 1px solid #eee;
        }
        
        .activity-icon {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: var(--light-bg);
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 15px;
            color: var(--primary-color);
        }
        
        .btn-edit {
            position: absolute;
            top: 20px;
            right: 20px;
        }
    </style>
</head>
<body>
    <div class="profile-container">
        <!-- Profile Header -->
        <div class="profile-card">
            <div class="profile-header">
                <button class="btn btn-light btn-edit">
                    <i class="fas fa-edit me-1"></i> Edit Profile
                </button>
                <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=200&q=80" 
                     alt="Profile" class="profile-picture">
                <h2>John Doe</h2>
                <p class="mb-0">Senior Product Designer</p>
                <div class="profile-stats">
                    <div class="stat-item">
                        <div class="stat-number">124</div>
                        <div class="stat-label">Projects</div>
                    </div>
                    <div class="stat-item">
                        <div class="stat-number">2.4K</div>
                        <div class="stat-label">Followers</div>
                    </div>
                    <div class="stat-item">
                        <div class="stat-number">348</div>
                        <div class="stat-label">Following</div>
                    </div>
                </div>
            </div>
            
            <div class="card-body">
                <div class="row">
                    <!-- Left Column: Personal Info -->
                    <div class="col-md-6">
                        <div class="info-card">
                            <div class="info-item">
                                <span class="info-label">Full Name:</span>
                                <span>John Michael Doe</span>
                            </div>
                            <div class="info-item">
                                <span class="info-label">Email:</span>
                                <span>john.doe@example.com</span>
                            </div>
                            <div class="info-item">
                                <span class="info-label">Phone:</span>
                                <span>+1 (555) 123-4567</span>
                            </div>
                            <div class="info-item">
                                <span class="info-label">Location:</span>
                                <span>San Francisco, CA</span>
                            </div>
                            <div class="info-item">
                                <span class="info-label">Birthday:</span>
                                <span>March 15, 1985</span>
                            </div>
                            <div class="info-item">
                                <span class="info-label">Joined:</span>
                                <span>January 10, 2020</span>
                            </div>
                        </div>
                        
                        <h3 class="section-title">About Me</h3>
                        <div class="card profile-card">
                            <div class="card-body">
                                <p>Senior product designer with over 8 years of experience creating user-centered designs for web and mobile applications. Passionate about solving complex problems through intuitive and beautiful interfaces.</p>
                                <p>Specialized in UX research, interaction design, and design systems. Currently leading design at TechCorp Inc.</p>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Right Column: Skills & Activity -->
                    <div class="col-md-6">
                        <h3 class="section-title">Skills & Expertise</h3>
                        <div class="card profile-card">
                            <div class="card-body">
                                <div class="mb-3">
                                    <span class="skill-item">UI/UX Design</span>
                                    <span class="skill-item">Wireframing</span>
                                    <span class="skill-item">Prototyping</span>
                                    <span class="skill-item">User Research</span>
                                    <span class="skill-item">Figma</span>
                                    <span class="skill-item">Adobe XD</span>
                                    <span class="skill-item">Sketch</span>
                                    <span class="skill-item">Interaction Design</span>
                                </div>
                                <div class="progress mb-3" style="height: 10px;">
                                    <div class="progress-bar" role="progressbar" style="width: 95%; background-color: #3498db;"></div>
                                </div>
                                
                                <h5>Languages</h5>
                                <div class="mb-2">
                                    <span>English <span class="badge bg-primary badge-pill">Native</span></span>
                                    <div class="progress mt-1" style="height: 6px;">
                                        <div class="progress-bar" role="progressbar" style="width: 100%; background-color: #3498db;"></div>
                                    </div>
                                </div>
                                <div class="mb-2">
                                    <span>Spanish <span class="badge bg-info badge-pill">Fluent</span></span>
                                    <div class="progress mt-1" style="height: 6px;">
                                        <div class="progress-bar" role="progressbar" style="width: 80%; background-color: #2ecc71;"></div>
                                    </div>
                                </div>
                                <div>
                                    <span>French <span class="badge bg-secondary badge-pill">Intermediate</span></span>
                                    <div class="progress mt-1" style="height: 6px;">
                                        <div class="progress-bar" role="progressbar" style="width: 50%; background-color: #9b59b6;"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <h3 class="section-title">Recent Activity</h3>
                        <div class="card profile-card">
                            <div class="card-body">
                                <div class="activity-item d-flex">
                                    <div class="activity-icon">
                                        <i class="fas fa-project-diagram"></i>
                                    </div>
                                    <div>
                                        <h6 class="mb-0">Created new project "Dashboard Redesign"</h6>
                                        <small class="text-muted">2 hours ago</small>
                                    </div>
                                </div>
                                
                                <div class="activity-item d-flex">
                                    <div class="activity-icon">
                                        <i class="fas fa-file-alt"></i>
                                    </div>
                                    <div>
                                        <h6 class="mb-0">Published article "Design Systems in 2023"</h6>
                                        <small class="text-muted">Yesterday</small>
                                    </div>
                                </div>
                                
                                <div class="activity-item d-flex">
                                    <div class="activity-icon">
                                        <i class="fas fa-users"></i>
                                    </div>
                                    <div>
                                        <h6 class="mb-0">Joined "Product Designers Network" group</h6>
                                        <small class="text-muted">2 days ago</small>
                                    </div>
                                </div>
                                
                                <div class="activity-item d-flex">
                                    <div class="activity-icon">
                                        <i class="fas fa-certificate"></i>
                                    </div>
                                    <div>
                                        <h6 class="mb-0">Completed UX Research Certification</h6>
                                        <small class="text-muted">5 days ago</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Account Settings -->
                <h3 class="section-title mt-5">Account Settings</h3>
                <div class="row">
                    <div class="col-md-6">
                        <div class="card profile-card">
                            <div class="card-header bg-light">
                                <i class="fas fa-lock me-2"></i> Password & Security
                            </div>
                            <div class="card-body">
                                <div class="alert alert-info">
                                    <i class="fas fa-info-circle me-2"></i>
                                    Last changed: 3 months ago
                                </div>
                                <button class="btn btn-outline-primary w-100">
                                    <i class="fas fa-key me-2"></i> Change Password
                                </button>
                                
                                <div class="mt-4">
                                    <h5>Two-Factor Authentication</h5>
                                    <p class="text-muted">Add an extra layer of security to your account</p>
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" id="twoFactorSwitch" checked>
                                        <label class="form-check-label" for="twoFactorSwitch">Enabled</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-6">
                        <div class="card profile-card">
                            <div class="card-header bg-light">
                                <i class="fas fa-user-shield me-2"></i> Privacy Settings
                            </div>
                            <div class="card-body">
                                <div class="mb-3">
                                    <h5>Profile Visibility</h5>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="visibility" id="public" checked>
                                        <label class="form-check-label" for="public">
                                            Public (Anyone can view your profile)
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="visibility" id="connections">
                                        <label class="form-check-label" for="connections">
                                            Connections Only
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="visibility" id="private">
                                        <label class="form-check-label" for="private">
                                            Private (Only you can view your profile)
                                        </label>
                                    </div>
                                </div>
                                
                                <div class="mt-4">
                                    <h5>Data Privacy</h5>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="personalizedAds" checked>
                                        <label class="form-check-label" for="personalizedAds">
                                            Allow personalized ads
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="dataSharing" checked>
                                        <label class="form-check-label" for="dataSharing">
                                            Share data with partners
                                        </label>
                                    </div>
                                </div>
                                
                                <button class="btn btn-outline-danger mt-4 w-100">
                                    <i class="fas fa-user-slash me-2"></i> Deactivate Account
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Simple interaction for demo purposes
        document.querySelector('.btn-edit').addEventListener('click', function() {
            alert('Edit profile functionality would open a form in a real application');
        });
        
        document.querySelectorAll('.btn-outline-primary').forEach(btn => {
            btn.addEventListener('click', function() {
                alert('Password change form would appear here');
            });
        });
        
        document.querySelector('.btn-outline-danger').addEventListener('click', function() {
            if(confirm('Are you sure you want to deactivate your account? This action cannot be undone.')) {
                alert('Account deactivation process initiated');
            }
        });
    </script>
</body>
</html>