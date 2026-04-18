<x-guest-layout>
    <div class="card login-card p-4">
        <div class="text-center mb-4">
            <h3 class="fw-bold text-primary">STAFF PRO</h3>
            <p class="text-muted small">Please sign in to continue</p>
        </div>

        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="mb-3">
                <label class="form-label small fw-bold">Email Address</label>
                <input type="email" name="email" class="form-control" value="admin@staff.com" required autofocus>
                @error('email') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <div class="mb-4">
                <label class="form-label small fw-bold">Password</label>
                <input type="password" name="password" class="form-control" value="password123" required>
            </div>

            <button type="submit" class="btn btn-primary w-100 rounded-pill py-2 fw-bold">Login</button>
        </form>
    </div>
</x-guest-layout>
