<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laravel Backend UI</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --primary-color: #3498db;
            --secondary-color: #2c3e50;
            --success-color: #27ae60;
            --danger-color: #e74c3c;
            --light-bg: #f8f9fa;
        }
        
        body {
            background-color: #f5f7fb;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            color: #333;
        }
        
        .navbar {
            background: linear-gradient(135deg, var(--secondary-color), var(--primary-color));
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        
        .card {
            border-radius: 10px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.08);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            border: none;
            margin-bottom: 25px;
        }
        
        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 6px 20px rgba(0,0,0,0.12);
        }
        
        .card-header {
            background: linear-gradient(135deg, var(--primary-color), #1a73e8);
            color: white;
            border-radius: 10px 10px 0 0 !important;
            padding: 15px 20px;
            font-weight: 600;
        }
        
        .dashboard-card {
            text-align: center;
            padding: 25px 15px;
            background: white;
        }
        
        .dashboard-card i {
            font-size: 2.5rem;
            margin-bottom: 15px;
            color: var(--primary-color);
        }
        
        .dashboard-card h3 {
            font-weight: 700;
            color: var(--secondary-color);
            margin: 10px 0;
        }
        
        .dashboard-card p {
            color: #666;
            font-size: 0.9rem;
        }
        
        .btn-primary {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
        }
        
        .btn-danger {
            background-color: var(--danger-color);
            border-color: var(--danger-color);
        }
        
        .btn-success {
            background-color: var(--success-color);
            border-color: var(--success-color);
        }
        
        .section-title {
            border-left: 4px solid var(--primary-color);
            padding-left: 15px;
            margin: 30px 0 20px;
            color: var(--secondary-color);
        }
        
        .profile-img {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            object-fit: cover;
            border: 3px solid var(--primary-color);
            margin: 0 auto 20px;
            display: block;
        }
        
        .table th {
            background-color: var(--light-bg);
            font-weight: 600;
        }
        
        .action-buttons .btn {
            margin-right: 5px;
        }
        
        .stat-card {
            background: white;
            border-radius: 10px;
            padding: 20px;
            text-align: center;
            box-shadow: 0 4px 6px rgba(0,0,0,0.05);
        }
        
        .stat-number {
            font-size: 2.5rem;
            font-weight: 700;
            color: var(--primary-color);
        }
        
        .stat-label {
            color: #666;
            font-size: 0.9rem;
            text-transform: uppercase;
            letter-spacing: 1px;
        }
        
        footer {
            background: var(--secondary-color);
            color: white;
            padding: 20px 0;
            margin-top: 40px;
        }
        
        .form-container {
            background: white;
            border-radius: 10px;
            padding: 30px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.08);
        }
        
        .login-container {
            max-width: 450px;
            margin: 80px auto;
        }
        
        .auth-links a {
            color: var(--primary-color);
            text-decoration: none;
            transition: color 0.3s;
        }
        
        .auth-links a:hover {
            color: var(--secondary-color);
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container">
            <a class="navbar-brand" href="#">
                <i class="fas fa-chess-rook me-2"></i>
                Club Management System
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link active" href="#"><i class="fas fa-home me-1"></i> Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#categories"><i class="fas fa-list me-1"></i> Categories</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#profile"><i class="fas fa-user me-1"></i> Profile</a>
                    </li>
                </ul>
                <div class="d-flex">
                    <div class="dropdown">
                        <button class="btn btn-outline-light dropdown-toggle" type="button" id="userMenu" data-bs-toggle="dropdown">
                            <i class="fas fa-user-circle me-1"></i> John Doe
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li><a class="dropdown-item" href="#profile"><i class="fas fa-user me-2"></i> Profile</a></li>
                            <li><a class="dropdown-item" href="#"><i class="fas fa-cog me-2"></i> Settings</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li>
                                <form action="/logout" method="POST">
                                    @csrf
                                    <button type="submit" class="dropdown-item text-danger">
                                        <i class="fas fa-sign-out-alt me-2"></i> Logout
                                    </button>
                                </form>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <!-- Dashboard Section -->
    <div class="container mt-5" id="dashboard">
        <h2 class="section-title">Dashboard</h2>
        
        <div class="row mb-4">
            <div class="col-md-3">
                <div class="stat-card">
                    <div class="stat-number">24</div>
                    <div class="stat-label">Categories</div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="stat-card">
                    <div class="stat-number">128</div>
                    <div class="stat-label">Clubs</div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="stat-card">
                    <div class="stat-number">642</div>
                    <div class="stat-label">Users</div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="stat-card">
                    <div class="stat-number">42</div>
                    <div class="stat-label">Reservations</div>
                </div>
            </div>
        </div>
        
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <span><i class="fas fa-user me-2"></i> Profile Overview</span>
                        <a href="#profile" class="btn btn-sm btn-light">View Profile</a>
                    </div>
                    <div class="card-body">
                        <div class="text-center">
                            <img src="https://ui-avatars.com/api/?name=John+Doe&background=3498db&color=fff" alt="Profile" class="profile-img">
                            <h4>John Doe</h4>
                            <p class="text-muted">john.doe@example.com | +1 (555) 123-4567</p>
                            <div class="d-flex justify-content-center mt-3">
                                <button class="btn btn-sm btn-outline-primary me-2">
                                    <i class="fas fa-edit me-1"></i> Edit Profile
                                </button>
                                <button class="btn btn-sm btn-outline-secondary">
                                    <i class="fas fa-key me-1"></i> Change Password
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <i class="fas fa-bell me-2"></i> Recent Activities
                    </div>
                    <div class="card-body">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">
                                <div class="d-flex">
                                    <div class="flex-shrink-0 text-success">
                                        <i class="fas fa-plus-circle"></i>
                                    </div>
                                    <div class="flex-grow-1 ms-3">
                                        <small class="text-muted">10 minutes ago</small>
                                        <p class="mb-0">Added new category "Sports Clubs"</p>
                                    </div>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="d-flex">
                                    <div class="flex-shrink-0 text-primary">
                                        <i class="fas fa-edit"></i>
                                    </div>
                                    <div class="flex-grow-1 ms-3">
                                        <small class="text-muted">2 hours ago</small>
                                        <p class="mb-0">Updated profile information</p>
                                    </div>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="d-flex">
                                    <div class="flex-shrink-0 text-info">
                                        <i class="fas fa-club"></i>
                                    </div>
                                    <div class="flex-grow-1 ms-3">
                                        <small class="text-muted">Yesterday</small>
                                        <p class="mb-0">Created new club "Chess Masters"</p>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Categories Section -->
    <div class="container mt-5" id="categories">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="section-title">Categories Management</h2>
            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addCategoryModal">
                <i class="fas fa-plus me-1"></i> Add Category
            </button>
        </div>
        
        <div class="card">
            <div class="card-header">
                <i class="fas fa-list me-2"></i> Categories List
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Category Name</th>
                                <th>Background</th>
                                <th>Clubs Count</th>
                                <th>Created At</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>Sports Clubs</td>
                                <td><span class="badge bg-primary">Blue</span></td>
                                <td>24</td>
                                <td>2023-10-15</td>
                                <td class="action-buttons">
                                    <button class="btn btn-sm btn-outline-primary">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                    <button class="btn btn-sm btn-outline-success">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <button class="btn btn-sm btn-outline-danger">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>Art & Culture</td>
                                <td><span class="badge bg-success">Green</span></td>
                                <td>18</td>
                                <td>2023-10-10</td>
                                <td class="action-buttons">
                                    <button class="btn btn-sm btn-outline-primary">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                    <button class="btn btn-sm btn-outline-success">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <button class="btn btn-sm btn-outline-danger">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>Academic Clubs</td>
                                <td><span class="badge bg-warning text-dark">Yellow</span></td>
                                <td>32</td>
                                <td>2023-10-05</td>
                                <td class="action-buttons">
                                    <button class="btn btn-sm btn-outline-primary">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                    <button class="btn btn-sm btn-outline-success">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <button class="btn btn-sm btn-outline-danger">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </td>
                            </tr>
                            <tr>
                                <td>4</td>
                                <td>Technology Clubs</td>
                                <td><span class="badge bg-info">Teal</span></td>
                                <td>21</td>
                                <td>2023-10-01</td>
                                <td class="action-buttons">
                                    <button class="btn btn-sm btn-outline-primary">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                    <button class="btn btn-sm btn-outline-success">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <button class="btn btn-sm btn-outline-danger">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                
                <!-- Pagination -->
                <nav>
                    <ul class="pagination justify-content-center">
                        <li class="page-item disabled"><a class="page-link" href="#">Previous</a></li>
                        <li class="page-item active"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item"><a class="page-link" href="#">Next</a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>

    <!-- Profile Section -->
    <div class="container mt-5" id="profile">
        <h2 class="section-title">Profile Management</h2>
        
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header text-center">
                        <i class="fas fa-user me-2"></i> Profile Information
                    </div>
                    <div class="card-body text-center">
                        <img src="https://ui-avatars.com/api/?name=John+Doe&background=3498db&color=fff" alt="Profile" class="profile-img">
                        <h4>John Doe</h4>
                        <p class="text-muted">Administrator</p>
                        
                        <ul class="list-group list-group-flush mt-4">
                            <li class="list-group-item d-flex justify-content-between">
                                <span>Email:</span>
                                <span>john.doe@example.com</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between">
                                <span>Phone:</span>
                                <span>+1 (555) 123-4567</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between">
                                <span>Joined:</span>
                                <span>Oct 10, 2023</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between">
                                <span>Last Update:</span>
                                <span>Today</span>
                            </li>
                        </ul>
                    </div>
                </div>
                
                <div class="card mt-4">
                    <div class="card-header text-center">
                        <i class="fas fa-key me-2"></i> Password Management
                    </div>
                    <div class="card-body">
                        <form>
                            <div class="mb-3">
                                <label class="form-label">Current Password</label>
                                <input type="password" class="form-control" placeholder="Enter current password">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">New Password</label>
                                <input type="password" class="form-control" placeholder="Enter new password">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Confirm New Password</label>
                                <input type="password" class="form-control" placeholder="Confirm new password">
                            </div>
                            <button type="submit" class="btn btn-success w-100">
                                <i class="fas fa-save me-1"></i> Update Password
                            </button>
                        </form>
                    </div>
                </div>
            </div>
            
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <i class="fas fa-edit me-2"></i> Edit Profile
                    </div>
                    <div class="card-body">
                        <form>
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label class="form-label">First Name</label>
                                    <input type="text" class="form-control" value="John">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Last Name</label>
                                    <input type="text" class="form-control" value="Doe">
                                </div>
                            </div>
                            
                            <div class="mb-3">
                                <label class="form-label">Email</label>
                                <input type="email" class="form-control" value="john.doe@example.com">
                            </div>
                            
                            <div class="mb-3">
                                <label class="form-label">Phone</label>
                                <input type="text" class="form-control" value="+1 (555) 123-4567">
                            </div>
                            
                            <div class="mb-3">
                                <label class="form-label">Profile Photo</label>
                                <input class="form-control" type="file">
                                <small class="text-muted">Upload a new profile photo (max 2MB)</small>
                            </div>
                            
                            <div class="mb-3">
                                <label class="form-label">Bio</label>
                                <textarea class="form-control" rows="3">System administrator with 5+ years of experience managing club platforms.</textarea>
                            </div>
                            
                            <div class="d-flex justify-content-end mt-4">
                                <button type="button" class="btn btn-outline-danger me-2">
                                    <i class="fas fa-trash me-1"></i> Delete Account
                                </button>
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-save me-1"></i> Update Profile
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
                
                <div class="card mt-4">
                    <div class="card-header">
                        <i class="fas fa-shield-alt me-2"></i> Security Settings
                    </div>
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <div>
                                <h5 class="mb-0">Two-Factor Authentication</h5>
                                <p class="text-muted mb-0">Add an extra layer of security to your account</p>
                            </div>
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="twoFactorSwitch">
                                <label class="form-check-label" for="twoFactorSwitch"></label>
                            </div>
                        </div>
                        
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <div>
                                <h5 class="mb-0">Login Notifications</h5>
                                <p class="text-muted mb-0">Get notified when someone logs into your account</p>
                            </div>
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="notificationSwitch" checked>
                                <label class="form-check-label" for="notificationSwitch"></label>
                            </div>
                        </div>
                        
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h5 class="mb-0">Active Sessions</h5>
                                <p class="text-muted mb-0">Manage your logged-in devices</p>
                            </div>
                            <button class="btn btn-sm btn-outline-secondary">
                                View Sessions
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="mt-5">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h5>Club Management System</h5>
                    <p>Comprehensive solution for managing clubs, categories, and user profiles.</p>
                </div>
                <div class="col-md-3">
                    <h5>Quick Links</h5>
                    <ul class="list-unstyled">
                        <li><a href="#" class="text-white">Dashboard</a></li>
                        <li><a href="#categories" class="text-white">Categories</a></li>
                        <li><a href="#profile" class="text-white">Profile</a></li>
                        <li><a href="#" class="text-white">Settings</a></li>
                    </ul>
                </div>
                <div class="col-md-3">
                    <h5>Legal</h5>
                    <ul class="list-unstyled">
                        <li><a href="#" class="text-white">Privacy Policy</a></li>
                        <li><a href="#" class="text-white">Terms of Service</a></li>
                        <li><a href="#" class="text-white">Cookie Policy</a></li>
                    </ul>
                </div>
            </div>
            <hr class="my-4 bg-light">
            <div class="text-center">
                <p class="mb-0">© 2023 Club Management System. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <!-- Add Category Modal -->
    <div class="modal fade" id="addCategoryModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"><i class="fas fa-plus me-2"></i> Add New Category</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="mb-3">
                            <label class="form-label">Category Name</label>
                            <input type="text" class="form-control" placeholder="Enter category name">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Background Color</label>
                            <select class="form-select">
                                <option selected>Select a color</option>
                                <option value="primary">Blue</option>
                                <option value="success">Green</option>
                                <option value="danger">Red</option>
                                <option value="warning">Yellow</option>
                                <option value="info">Teal</option>
                                <option value="dark">Dark</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Description</label>
                            <textarea class="form-control" rows="3" placeholder="Enter category description"></textarea>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary">Create Category</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Smooth scrolling for anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                document.querySelector(this.getAttribute('href')).scrollIntoView({
                    behavior: 'smooth'
                });
            });
        });
        
        // Simple notification simulation
        document.querySelectorAll('form').forEach(form => {
            form.addEventListener('submit', function(e) {
                e.preventDefault();
                alert('Form submitted successfully! (This is a demo)');
            });
        });
        
        // Action buttons simulation
        document.querySelectorAll('.action-buttons .btn').forEach(btn => {
            btn.addEventListener('click', function() {
                const action = this.querySelector('i').className;
                let message = '';
                
                if (action.includes('eye')) message = 'View action triggered';
                else if (action.includes('edit')) message = 'Edit action triggered';
                else if (action.includes('trash')) message = 'Delete action triggered';
                
                alert(message + ' (This is a demo)');
            });
        });
    </script>
</body>
</html>