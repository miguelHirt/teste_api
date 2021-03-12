<html>

<meta charset="UTF-8">
<title>Teste API Filmes</title>

<body>
    <div>
        <form method="get" action="#">
            <input type=text name="filtrar1" placeholder="Nome do Filme">
            <button type="submit" name="filtrar2">Filtrar</button>
        </form>
        <form method="get" action="#">

            <select name="filtrar3">
                <option value="">-</option>
                <option value="28">Ação</option>
                <option value="12">Aventura</option>
                <option value="16">Animação</option>
                <option value="35">Comédia</option>
                <option value="80">Crime</option>
                <option value="99">Documentário</option>
                <option value="18">Drama</option>
                <option value="10751">Família</option>
                <option value="14">Fantasia</option>
                <option value="36">História</option>
                <option value="27">Terror</option>
                <option value="10402">Música</option>
                <option value="9648">Mistério</option>
                <option value="10749">Romance</option>
                <option value="878">Ficção científica</option>
                <option value="10770">Cinema TV</option>
                <option value="53">Thriller</option>
                <option value="10752">Guerra</option>
                <option value="37">Faroeste</option>
            </select>
            <button type="submit" name="filtrar4">Filtrar</button>
        </form>

        <form method="get" action="#">
            <input type=submit name="todos" id="todos" value="Buscar todos os Filmes">

            <input type=submit name="lanca" id="lanca" value="Buscar Por Lançamentos">

            <input type=submit name="top" id="top" value="Buscar Top Filmes">
        </form>
        <?php

        $urapi = 'https://api.themoviedb.org/3';
        $tipo = '';
        $key = ''; //Removido KEY para tornar o artigo PUBLICO
        $lingua = 'pt-BR';

        if (isset($_GET["filtrar1"])) {

            $procurar_filme = $_GET["filtrar1"];
            $tipo = "/search/movie?api_key=$key&language=$lingua&query=$procurar_filme&$lingua&page=1&include_adult=false";

        } else if (isset($_GET['filtrar3'])) {

            $genero = $_GET["filtrar3"];
            $tipo = "/discover/movie?api_key=$key&with_genres=$genero";

        } else if (isset($_GET['todos'])) {

            $tipo = "/discover/movie?api_key=$key";

        } else if (isset($_GET['lanca'])) {

            $tipo = "/movie/now_playing?api_key=$key&language=$lingua";

        } else if (isset($_GET['top'])) {

            $tipo = "/movie/popular?api_key=$key&language=$lingua";
            
        }
        
        $url = $urapi . $tipo;
        echo '<br>';

        $ch = curl_init($url);

        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        curl_setopt($ch, CURLOPT_URL, $url);

        $result = curl_exec($ch);
        curl_close($ch);
        $a = json_decode($result);

        echo '<pre>';
        echo print_r($a);
        echo '</pre>';
        ?>
    </div>
</body>

</html>
