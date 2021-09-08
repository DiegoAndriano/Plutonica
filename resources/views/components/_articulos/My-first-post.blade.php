---
titulo: My first post
tituloGuiones: my-first-post
descripcion: Lorem ipsum dolor sit amet, consectetur adipisicing elit. Corporis eos ex explicabo fugit laboriosam nihil officia quia quos. Aperiam beatae culpa deleniti ex ipsam labore laudantium minima mollitia odio sunt?
pinned: false
---

<x-app>

    <h1>My first post</h1>

    <p>
        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum dolorum natus possimus ratione temporibus.
        At blanditiis, consequuntur delectus ea ipsa ipsam itaque molestias mollitia quisquam sint, sunt ut vel velit.
    </p>

    <example-component></example-component>

    <p>
        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum dolorum natus possimus ratione temporibus.
        At blanditiis, consequuntur delectus ea ipsa ipsam itaque molestias mollitia quisquam sint, sunt ut vel velit.
    </p>

    <p>
        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum dolorum natus possimus ratione temporibus.
        At blanditiis, consequuntur delectus ea ipsa ipsam itaque molestias mollitia quisquam sint, sunt ut vel velit.
    </p>


    @if($comentarios)
        @foreach($comentarios as $comentario)
            {{$comentario->invitado->nombre}}
            {{$comentario->invitado->email}}
            {{$comentario->comentario}}
        @endforeach
    @endif

    @if($megustas)
        @foreach($megustas as $megusta)
            Me Gusta
        @endforeach
    @endif
</x-app>
