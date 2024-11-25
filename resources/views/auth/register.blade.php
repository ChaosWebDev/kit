<x-app-layout title="Register">
    <main id="{{ $main }}">
        <header>
            <h1>Registration</h1>
        </header>

        <section class="content">
            <form action="/register" method="post">
                @csrf

                <label for="username">Username</label>
                <input type="text" name="username" id="username" autofocus autocomplete='username'
                    value='{{ old('username') }}'>
                @error('username')
                    <div class="error col-2">{{ $message }}</div>
                @enderror

                <label for="password">Password</label>
                <input type="password" name="password" id="password">

                <label for="password_confirmation">Confirm Password</label>
                <input type="password" name="password_confirmation" id="password_confirmation">

                <label for="name">Your Full Name</label>
                <input type="text" name="name" id="name" value="{{ old('name') }}">
                @error('name')
                    <div class="error col-2">{{ $message }}</div>
                @enderror

                <label for="email">E-Mail</label>
                <input type="email" name="email" id="email" value='{{ old('email') }}'>
                @error('email')
                    <div class="error col-2">{{ $message }}</div>
                @enderror

                <div class="buttons col-2">
                    <input type="submit" value="Register">
                    <span class="row">
                        or <a href="{{ route('login') }}">Login</a>
                    </span>
                </div>
            </form>
        </section>
    </main>
</x-app-layout>
