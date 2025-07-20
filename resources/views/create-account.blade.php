@extends('layouts.app')

@section('content')
    <section class="flex items-center justify-center">
        <div class="flex items-start mt-8 justify-between w-full max-w-screen-xl">
            <div>
                <h1 class="text-3xl font-bold mb-4">Crie sua conta!</h1>
                <p class="text-zinc-500">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Deleniti impedit sapiente
                    culpa animi distinctio nobis exercitationem voluptates</p>
            </div>

            <form class="space-y-4 md:space-y-6 w-full max-w-md bg-zinc-900 p-6 rounded-lg" action="#">
                <div>
                    <input type="email" name="email" id="email"
                        class="bg-zinc-800 border border-zinc-600 text-zinc-200 text-sm rounded-lg focus:ring-zinc-600 focus:border-zinc-600 block w-full p-2.5"
                        placeholder="name@company.com" required>
                </div>

                <div>
                    <input type="email" name="email" id="email"
                        class="bg-zinc-800 border border-zinc-600 text-zinc-200 text-sm rounded-lg focus:ring-zinc-600 focus:border-zinc-600 block w-full p-2.5"
                        placeholder="name@company.com" required>
                </div>

                <div>
                    <input type="password" name="password" id="password" placeholder="••••••••"
                        class="bg-zinc-800 border border-zinc-600 text-zinc-200 text-sm rounded-lg focus:ring-zinc-600 focus:border-zinc-600 block w-full p-2.5"
                        required>
                </div>

                <button type="submit"
                    class="w-full text-gray-900 bg-gradient-to-r from-red-200 via-red-300 to-yellow-200 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-red-100 dark:focus:ring-red-400 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">Criar
                    uma conta</button>

                <p class="text-sm font-light text-zinc-400">
                    Já tem uma conta? <a href="#" class="font-medium text-zinc-500 hover:underline">Entrar aqui</a>
                </p>
            </form>
        </div>
    </section>
@endsection
