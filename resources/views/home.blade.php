<x-app>
    <div class="z-10 absolute w-full h-full" id="particles-js"></div>

    <section
        class="w-full h-screen bg-main-option-2 bg-center bg-no-repeat bg-cover bg-gray-900">
        <nav class="flex justify-between py-10 text-center justify-center ">
            <div class="w-full items-center ">
                <a class="hover:no-underline" href="/"><h1 class="font-body text-emerald-500 text-3xl tracking-wider">plutonia</h1></a>
            </div>
            <div class="w-full">
                <ul class="flex justify-evenly">
                    <a href="#" class="font-body text-gray-100 text-lg border-b-4 border-emerald-500 px-2 py-2 -my-2 cursor-pointer">Inicio</a>
                    <a href="#" class="font-body text-gray-100 text-lg cursor-pointer z-20">Contacto</a>
                    <a href="#" class="font-body text-gray-100 text-lg cursor-pointer z-20">Servicios</a>
                    <a href="/articulos" class="font-body text-gray-100 text-lg cursor-pointer z-20">Artículos</a>
                </ul>
            </div>
            <div class="w-full">
                <ul class="flex">
                    <li class="text-gray-100 text-lg px-1 cursor-pointer z-20">(svg)IG</li>
                    <li class="text-gray-100 text-lg px-3 cursor-pointer z-20">(svg)FB</li>
                    <li class="text-gray-100 text-lg px-3 cursor-pointer z-20">(svg)TL</li>
                    <li class="text-gray-100 text-lg px-3 cursor-pointer z-20">(svg)Wpp</li>
                    <li class="text-gray-100 text-lg px-3 cursor-pointer z-20">(svg)Mail</li>
                </ul>
            </div>
        </nav>

        <div class="py-20 mx-auto flex-col w-1/3 content-center text-center items-center justify-center">
            <entrance><h1 class="text-gray-50 text-7xl font-body">Lorem ipsum dolor sit amet</h1></entrance>
            <div class="mx-auto my-10 w-24 border-t-4 border-emerald-500">

            </div>
            <p class="text-gray-300 text-lg font-display">
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nisi, nulla omnis! Fuga nihil nisi odit
                pariatur
                quis. At cumque, cupiditate enim, expedita facilis magni, maiores nam quasi quia quod sunt.
            </p>
            <div class="flex justify-evenly mt-6 items-center">
                <button
                    class="text-center w-1/3 z-20 font-display flex justify-center font-semibold tracking-wide py-3 cursor-pointer transition ease-in-out duration-100 bg-emerald-500 text-emerald-900 rounded-full">
                    Contactar
                    <span class="flex h-2 w-2">
                        <span
                            class="animate-ping absolute inline-flex h-2 w-2 rounded-full bg-yellow-300 opacity-75"></span>
                        <span class="relative inline-flex rounded-full h-2 w-2 bg-yellow-400"></span>
                </span>
                </button>
                <button
                    class="font-display flex justify-center items-center font-semibold tracking-wide border-2 border-gray-50 text-gray-50 py-3 cursor-pointer w-1/3">
                    Leer más
                    <span>
                    <svg viewBox="0 0 20 20" class="ml-2 w-4 h-4">
						<g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
							<g class="fill-current" id="icon-shape">
								<path d="M13,10 L13,2 L7,2 L7,10 L2,10 L10,18 L18,10 L13,10 Z"
                                      id="Combined-Shape"></path>
							</g>
						</g>
						</svg>
                </span>
                </button>
            </div>
        </div>
    </section>

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
