{{--@dd($name, $functions)--}}
<h1>Teste</h1>
<p>
    Olá, {{ $name }} <br>
    Você é:
</p>
<ul>
    @foreach($functions as $item)
        <li>
            {{ $item }}
        </li>
    @endforeach
</ul>
