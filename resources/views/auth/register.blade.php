<x-guest-layout>
    <x-auth-card>
        <main class="mt-0 transition-all duration-200 ease-soft-in-out">
            <section class="min-h-screen mb-32">
                <div class="relative flex items-start pt-12 pb-56 m-4 overflow-hidden bg-center bg-cover min-h-50-screen rounded-xl" style="background-image: url('../images/curved14.jpg')">
                    <span class="absolute top-0 left-0 w-full h-full bg-center bg-cover bg-gradient-to-tl from-gray-900 to-slate-800 opacity-60"></span>
                    <div class="container z-10">
                        <div class="flex flex-wrap justify-center -mx-3">
                            <div class="w-full max-w-full px-3 mx-auto mt-0 text-center lg:flex-0 shrink-0 lg:w-5/12">
                                <h1 class="mt-12 mb-2 text-white">Bem Vindo!</h1>
                                <p class="text-white">Cadastre-se para usar o sistema.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container" >
                    <div class="flex flex-wrap -mx-3 -mt-48 md:-mt-56 lg:-mt-48">
                        <div class="w-full max-w-full px-3 mx-auto mt-0 md:flex-0 shrink-0 md:w-7/12 lg:w-5/12 xl:w-7/12" >
                            <div class="relative z-0 flex flex-col min-w-0 break-words bg-white border-0 shadow-soft-xl rounded-2xl bg-clip-border">
                                <div class="p-6 mb-0 text-center bg-white border-b-0 rounded-t-2xl">
                                    <h5>Insira os dados:</h5>
                                </div>
                                <div class="flex flex-wrap px-3 -mx-3 sm:px-6 xl:px-12">
                                    <!-- Validation Errors -->
                                    <x-auth-validation-errors class="mb-4" :errors="$errors" />
                                </div>
                            

                                <div class="flex-auto p-6">
                                    <form method="POST" action="/cadastrar" >
                                        @csrf
                                        <div class="mb-4">
                                            <input autofocus id="name" type="text" name="name" :value="old('name')" required class="text-sm focus:shadow-soft-primary-outline leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding py-2 px-3 font-normal text-gray-700 transition-all focus:border-fuchsia-300 focus:bg-white focus:text-gray-700 focus:outline-none focus:transition-shadow" placeholder="Nome" aria-label="Nome" aria-describedby="email-addon" />
                                        </div>
                                        <div class="mb-4">
                                            <input id="email" type="email" name="email" :value="old('email')" required class="text-sm focus:shadow-soft-primary-outline leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding py-2 px-3 font-normal text-gray-700 transition-all focus:border-fuchsia-300 focus:bg-white focus:text-gray-700 focus:outline-none focus:transition-shadow" placeholder="Email" aria-label="Email" aria-describedby="email-addon" />
                                        </div>
                                        <div class="mb-4">
                                            <input id="password" type="password" name="password" required autocomplete="new-password" class="text-sm focus:shadow-soft-primary-outline leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding py-2 px-3 font-normal text-gray-700 transition-all focus:border-fuchsia-300 focus:bg-white focus:text-gray-700 focus:outline-none focus:transition-shadow" placeholder="Senha" aria-label="Senha" aria-describedby="password-addon" />
                                        </div>
                                        <div class="mb-4">
                                            <input id="password_confirmation"  type="password" name="password_confirmation" required class="text-sm focus:shadow-soft-primary-outline leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding py-2 px-3 font-normal text-gray-700 transition-all focus:border-fuchsia-300 focus:bg-white focus:text-gray-700 focus:outline-none focus:transition-shadow" placeholder="Confirmação de Senha" aria-label="Confirmação de Senha" aria-describedby="password-addon" />
                                        </div>
                                        <div class="text-center">
                                            <x-button class="inline-block w-full px-6 py-3 mt-6 mb-2 font-bold text-center text-white uppercase align-middle transition-all bg-transparent border-0 rounded-lg cursor-pointer active:opacity-85 hover:scale-102 hover:shadow-soft-xs leading-pro text-xs ease-soft-in tracking-tight-soft shadow-soft-md bg-150 bg-x-25 bg-gradient-to-tl from-gray-900 to-slate-800 hover:border-slate-700 hover:bg-slate-700 hover:text-white">{{ __('Register') }}</x-button>
                                        </div>
                                        <p class="mt-4 mb-0 leading-normal text-sm">Já tem uma conta? <a href="/" class="font-bold text-slate-700">Faça o login</a></p>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </main>
    </x-auth-card>
</x-guest-layout>
