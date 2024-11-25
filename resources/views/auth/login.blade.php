<x-app-layout title="Login">
    <main id="{{ $main }}">

        <header>
            <h1>Please log in</h1>
        </header>

        <section class="content">

            <form action="/login" method="POST">
                @csrf
                {{-- Username --}}
                <input type="username" id="username" name='username' placeholder="Enter your username" autofocus
                    autocomplete='username'>

                {{-- Password --}}
                <div class="row">
                    <input type="password" id="password" name='password' placeholder='Enter your password'>
                    <input type="text" id="password_text" name='password' class="hidden"
                        placeholder='Enter your password'>
                    <i class="nf nf-fa-eye clickable"></i>
                </div>

                {{-- Remember Me --}}
                <div class="row">
                    <input id="remember_me" type="checkbox" name="remember_me" />
                    <label for="remember_me">Remember me</label>
                </div>

                {{-- Submit --}}
                <div class="buttons">
                    <input type="submit" value="Login">
                    <span class="row">
                        or <a href="{{ route('register') }}">Register</a>
                    </span>
                </div>

                @if ($errors->any())
                    @foreach ($errors->all() as $error)
                        <div class="text-red-500 text-sm mt-1">{{ $error }}</div>
                    @endforeach
                @endif
            </form>

        </section>
    </main>

    @push('scripts')
        <script type='module'>
            $(() => {
                $("i.nf.nf-fa-eye").on('click', function(e) {
                    $(this).toggleClass('active');

                    if ($("#password").hasClass("hidden")) {
                        $("#password").val($("#password_text").val());
                    } else {
                        $("#password_text").val($("#password").val());
                    }

                    $("#password").toggleClass("hidden");
                    $("#password_text").toggleClass("hidden");
                });

                $("form").on('submit', function(e) {
                    if ($("#password").hasClass("hidden")) {
                        $("#password").val($("#password_text").val());
                    } else {
                        $("#password_text").val($("#password").val());
                    }
                });
            });
        </script>
    @endpush
</x-app-layout>
