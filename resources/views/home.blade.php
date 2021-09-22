<x-app>
    <x-_flash></x-_flash>

    <section>
        <div
            class="h-screen w-full bg-emerald-500">
            <div
                style="clip-path: ellipse(100% 70% at 50% 30%);"
                class="h-screen w-full overflow-hidden bg-gradient-to-br from-blue-600 to-blue-500">
                <div class="mx-auto w-full border-8 border-emerald-500"></div>
                <div
                    class="z-10">
                    <h1
                        style="
                        filter: drop-shadow(0px 2px 1rem #fff);"
                        class="font-display text-blue-100 text-xl mx-20 font-bold my-10 z-10">
                        acerca de mi
                    </h1>
                    <entrance>
                        <div class="w-1/3 mx-auto flex items-center shadow-xl py-10 z-20 bg-gray-200 rounded-lg">
                            <div class="object-cover items-center flex justify-center w-2/5">
                                <div>
                                    <img
                                        src="imgs/default_profile_picture.jpeg"
                                        alt="Profile Picture"
                                        class="rounded-full shadow my-6 mx-2"
                                        loading="lazy"
                                    >

                                    <h2 class="ml-10 text-emerald-500 font-display font-bold">Josefina Barrera</h2>
                                    <p class="ml-10 text-gray-600 font-display">Astrologa</p>
                                    <p class="ml-10 text-gray-600 font-display">Actriz holística</p>
                                </div>
                            </div>

                            <div class="mr-10 w-3/5">
                                <p class="text-gray-900 text-xl font-body">Lorem ipsum dolor sit amet, consectetur
                                    adipisicing
                                    elit.
                                    Asperiores autem culpa, cum cumque deleniti
                                    ducimus earum itaque labore neque nesciunt nobis porro quia quis, rem repellat unde ut.
                                    Et,
                                    magni.</p>

                            </div>
                        </div>
                    </entrance>
                </div>
            </div>
        </div>

        <acerca></acerca>

        <div class="mx-auto w-full border-8 border-emerald-500"></div>
    </section>
    <section>
        <div class="bg-emerald-500">
            {{--        brillo abajo?   --}}
            <h2
                class="font-display text-blue-500 text-xl mx-20 font-bold py-10 z-20">gente agradecida</h2>

            <div>
                <div class="flex w-1/3 mx-auto py-5">
                    <img
                        src="{{ asset('imgs/default_profile_picture.jpeg') }}"
                        alt="Profile Picture"
                        class="rounded-full shadow my-6 mx-2"
                        loading="lazy"
                    >
                    <p
                        class="text-blue-500 py-6">
                        <svg width="45" height="36" class="">
                            <g
                                class="fill-current">
                                <path
                                    d="M13.415.001C6.07 5.185.887 13.681.887 23.041c0 7.632 4.608 12.096 9.936 12.096 5.04 0 8.784-4.032 8.784-8.784 0-4.752-3.312-8.208-7.632-8.208-.864 0-2.016.144-2.304.288.72-4.896 5.328-10.656 9.936-13.536L13.415.001zm24.768 0c-7.2 5.184-12.384 13.68-12.384 23.04 0 7.632 4.608 12.096 9.936 12.096 4.896 0 8.784-4.032 8.784-8.784 0-4.752-3.456-8.208-7.776-8.208-.864 0-1.872.144-2.16.288.72-4.896 5.184-10.656 9.792-13.536L38.183.001z"></path>
                            </g>
                        </svg>
                    </p>
                    <p class="text-blue-500 font-body text-xl py-6 pl-8">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consequuntur debitis delectus dignissimos
                        dolor error labore nesciunt nobis officiis, porro quaerat ratione, sit unde. Architecto consequuntur
                        expedita labore nostrum, officiis vel?
                    </p>

                    <img class="w-10 h-10" src="{{asset ('imgs/tauro.png')}}" alt="Taurinx">

                </div>

                <div class="flex w-1/3 mx-auto py-5">

                    <p
                        class="text-blue-500">
                        <svg width="45" height="36" class="">
                            <g
                                class="fill-current">
                                <path
                                    d="M13.415.001C6.07 5.185.887 13.681.887 23.041c0 7.632 4.608 12.096 9.936 12.096 5.04 0 8.784-4.032 8.784-8.784 0-4.752-3.312-8.208-7.632-8.208-.864 0-2.016.144-2.304.288.72-4.896 5.328-10.656 9.936-13.536L13.415.001zm24.768 0c-7.2 5.184-12.384 13.68-12.384 23.04 0 7.632 4.608 12.096 9.936 12.096 4.896 0 8.784-4.032 8.784-8.784 0-4.752-3.456-8.208-7.776-8.208-.864 0-1.872.144-2.16.288.72-4.896 5.184-10.656 9.792-13.536L38.183.001z"></path>
                            </g>
                        </svg>
                    </p>

                    <p class="text-blue-500 font-body text-xl">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consequuntur debitis delectus dignissimos
                        dolor error labore nesciunt nobis officiis, porro quaerat ratione, sit unde. Architecto consequuntur
                        expedita labore nostrum, officiis vel?
                    </p>

                    <img
                        src="{{ asset('imgs/default_profile_picture.jpeg') }}"
                        alt="Profile Picture"
                        class="rounded-full shadow my-6 mx-2"
                        loading="lazy"
                    >

                    <p>

                    </p>
                </div>
            </div>
        </div>
    </section>
</x-app>
