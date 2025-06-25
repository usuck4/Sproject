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
                    <li><a href="{{ route('dashboard') }}" class="text-white">Dashboard</a></li>
                    <li><a href="{{ route('categories.index') }}" class="text-white">Categories</a></li>
                    <li><a href="{{ route('profile.show') }}" class="text-white">Profile</a></li>
                </ul>
            </div>
            <div class="col-md-3">
                <h5>Legal</h5>
                <ul class="list-unstyled">
                    <li><a href="#" class="text-white">Privacy Policy</a></li>
                    <li><a href="#" class="text-white">Terms of Service</a></li>
                </ul>
            </div>
        </div>
        <hr class="my-4 bg-light">
        <div class="text-center">
            <p class="mb-0">© {{ date('Y') }} Club Management System. All rights reserved.</p>
        </div>
    </div>
</footer>