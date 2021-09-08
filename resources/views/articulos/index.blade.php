<x-app>

    <div class="max-w-lg mx-auto">
        @foreach($articulos as $articulo)
            @if($articulo->pinned)
                <div class="rounded-lg bg-white my-3 py-6 px-10">

                    <p class="uppercase text-blue-500">Pinned</p>

                    <h2 class="text-blue-500 text-2xl"><a
                            href="/articulos/{{$articulo->tituloGuionado}}">{{$articulo->titulo}}</a></h2>
                    <p class="text-blue-500 text-lg">{{$articulo->descripcion}}</p>
                    <div class="pt-3 flex justify-between">
                        <p>(SVG)MG 786</p>
                        <p>(SVG)Commentarios 3</p>
                    </div>
                </div>
            @endif
        @endforeach

        @foreach($articulos as $articulo)
            @if(! $articulo->pinned)
                <div class="rounded-lg bg-white py-6 px-10">

                    <h2 class="text-blue-500 text-2xl"><a
                            href="/articulos/{{$articulo->tituloGuionado}}">{{$articulo->titulo}}</a></h2>
                    <p class="text-blue-500 text-lg">{{$articulo->descripcion}}</p>
                    <div class="pt-3 flex justify-between">
                        <p>(SVG)MG 786</p>
                        <p>(SVG)Commentarios 3</p>
                    </div>
                </div>
            @endif
        @endforeach

    </div>
</x-app>
