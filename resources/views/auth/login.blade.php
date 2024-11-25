<x-app-layout title="Login">
    <main id="{{ $main }}">

        <form class="max-w-sm mx-auto mt-8" action="/login" method="POST">
            @csrf
            {{-- Username --}}
            <div class="mb-5">
                <label for="username" class="block mb-2 text-sm font-medium">Username</label>
                <input type="username" id="username" name='username'
                    class="border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
            </div>

            {{-- Password --}}
            <div class="mb-5">
                <label for="password" class="block mb-2 text-sm font-medium mr-2">Password</label>
                <div class="mb-5 flex items-center">
                    <input type="password" id="password" name='password'
                        class="border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 mr-2">
                    <input type="text" id="password_text" name='password'
                        class="hidden border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 mr-2">
                    <i class="nf nf-fa-eye clickable"></i>
                </div>
            </div>

            {{-- Remember Me --}}
            <div class="flex items-start mb-5">
                <div class="flex items-center h-5">
                    <input id="remember_me" type="checkbox" value=""
                        class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-blue-300"
                        name="remember_me" />
                </div>
                <label for="remember_me" class="ms-2 text-sm font-medium">Remember me</label>
            </div>

            {{-- Submit --}}
            <button type="submit"
                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">Submit</button>

            @if ($errors->any())
                @foreach ($errors->all() as $error)
                    <div class="text-red-500 text-sm mt-1">{{ $error }}</div>
                @endforeach
            @endif
        </form>
    </main>

    @push('scripts')
        <script type='module'>
            $(() => {
                $("i.nf.nf-fa-eye").on('click', function(e) {
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
