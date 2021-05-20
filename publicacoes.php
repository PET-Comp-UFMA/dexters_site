<?php
    require_once('conexao.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title> Publicações | DEXTERS </title>

  <link rel="icon" href="./assets/images/Logo Secundária 2 brancoc.png">

  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

  <link rel="stylesheet" href="./styles/styles.css">
  <link rel="stylesheet" href="./styles/publicacoes.css">
</head>

<body>

  <header>
    <div class="logos">
      <a href="./index.html"><img src="./assets/images/Logo Secundária 1c.png" alt="Logo Dexters" class="dexters-logo"></a>
      <div class="divider"></div>
      <a href="https://portalpadrao.ufma.br/site" target="_blank"><img src="./assets/images/UFMA.png" alt="Logo UFMA" class="ufma-logo"></a>
    </div>
    <nav id="nav-bar" class="overlay">
      <img src="./assets/svg/close-24px.svg" alt="" class="close-btn" onclick="closeMenu()">
      <div class="overlay-content">
        <ul>
          <li>
            <button>
              <a href="./index.html">Início</a>
            </button>
          </li>
          <li>
            <div class="dropdown">
              <button onclick="DropdownSobre()" class="dropbtn">
                Conheça o Dexters
                <span class="material-icons">
                  arrow_drop_down
                </span>
              </button>
              <div id="dropdown-sobre" class="dropdown-content-sobre">
                <a href="./sobre.html">Sobre</a>
                <a href="./integrantes.html">Integrantes</a>
              </div>
            </div>
          </li>
          <li>
            <button><a href="./publicacoes.php">Publicações</a></button>
          </li>
          <li>
            <button><a href="./projetos.html">Projetos</a></button>
          </li>
          <li>
            <button><a href="./noticias.html">Notícias</a></button>
          </li>
          <!-- <li>
            <div class="dropdown">
              <button onclick="DropdownProdutos()" class="dropbtn">
                Produtos
                <span class="material-icons">
                  arrow_drop_down
                </span>
              </button>
              <div id="dropdown-produtos" class="dropdown-content-produtos">
                <a href="./eventos.html">Eventos</a>
                <a href="./produtos-podcomp.html">PodCast</a>
              </div>
            </div>
          </li> -->
        </ul>
      </div>
    </nav>
    <img src="./assets/svg/menu-24px.svg" alt="" class="open-btn" onclick="openMenu()">
  </header>

<script>

function format(data, formatValue) {

    // ARTICLE
    // An article from a journal or magazine.
    // Required fields: author, title, journal, year.
    // Optional fields: volume, number, pages, month, note.
    if (data.entryType == "article") {
        data.authors = ((data.authors) ? data.authors : "<strong style='color:red;'>Author is required!</strong>");
        data.title = ((data.title) ? data.title : "<strong style='color:red;'>Title is required!</strong>");
        data.year = ((data.year) ? data.year : "<strong style='color:red;'>Year is required!</strong>");

        if (formatValue == 'mla') {
            return data.authors +
                ". \"" + data.title + "\". " +
                data.journal +
                ((data.volume) ? " " + data.volume : "") +
                ". " +
                ((data.number) ? " " + data.number : "") + 
                "(" + data.year + ")" +
                ((data.pages) ? ": " + data.pages : "") +
                ".";
        }
        else if (formatValue == 'apa') {
            return data.authors +
                " (" + data.year + "). " + 
                data.title + 
                 ". " + data.journal + 
                ((data.volume) ? "," + data.volume : "") +
                
                ((data.number) ? "(" + data.number + ")" : "") + 
                ((data.pages) ? ", " + data.pages : "") +
                ".";
        }
        else if (formatValue == 'vancouver') {
            return data.authors +
                ". \"" + data.title + "\". " +
                data.journal + " " +
                data.year +
                ((data.volume) ? "; " + data.volume : "") +
                ((data.number) ? "(" + data.number + ")" : "") +
                ((data.pages) ? ":" + data.pages : "") + 
                ".";
        }
    }
}



function testa(citation, id, titulo, autores, revista, ano, volume, edicao, paginas){

    var article = new Object();
    article.entryType = "article"
    article.authors = autores;  
    article.title = titulo;
    article.journal = revista;
    article.year = ano;
    article.volume = volume;
    article.number = edicao;
    article.pages = paginas;
    
    var result = format(article,citation);
    document.getElementById(id).value = result;

    function copy(){
      document.getElementById(id).select();
      document.execCommand('copy');
    }

    document.getElementById(id+"0").addEventListener("click",copy());
    document.getElementById(id+"1").addEventListener("click",copy());
    document.getElementById(id+"2").addEventListener("click",copy());

    alert("Sua citação foi copiada para a área de transferência!");
    
}
</script>
  <main>
    <section id="publicacoes ">
        <div class="section-header">
            <h2> Publicações </h2>
        </div>
        <?php
            mysqli_select_db($mysqli, $bd) or die("Could not select database");

            $query = "SELECT * FROM citacao";
            $result = mysqli_query($mysqli, $query);
            $num_results = mysqli_num_rows($result);

            if($num_results > 0) {
                for($i=0; $i<$num_results; $i++) {
                    $row = mysqli_fetch_array($result);
        ?>
        <div class="publicacao">
            <h2><?php print_r($row['titulo']);?></h2>
            <p><?php print_r($row['autores']);?></p>
            <a href="<?php print_r($row['link']);?>">Resumo</a><br>
            <div class="btn-conteiner">

              <input type="button" id="<?php print_r($row['codigo']."0");?>" class = "publi-btn" onclick="testa('apa',<?php print_r($row['codigo']);?>,
                                                  '<?php print_r($row['titulo']);?>',
                                                  '<?php print_r($row['autores']);?>',
                                                  '<?php print_r($row['revista']);?>',
                                                  '<?php print_r($row['ano']);?>',
                                                  '<?php print_r($row['volume']);?>',
                                                  '<?php print_r($row['edicao']);?>',
                                                  '<?php print_r($row['paginas']);?>'
                                                  );" value="APA">
              <input type="button" id="<?php print_r($row['codigo']."1");?>" class = "publi-btn" onclick="testa('mla',<?php print_r($row['codigo']);?>,
                                                   '<?php print_r($row['titulo']);?>',
                                                  '<?php print_r($row['autores']);?>',
                                                  '<?php print_r($row['revista']);?>',
                                                  '<?php print_r($row['ano']);?>',
                                                  '<?php print_r($row['volume']);?>',
                                                  '<?php print_r($row['edicao']);?>',
                                                  '<?php print_r($row['paginas']);?>'
                                                  );" value="MLA">
              <input type="button" id="<?php print_r($row['codigo']."2");?>" class = "publi-btn" onclick="testa('vancouver',<?php print_r($row['codigo']);?>,
                                                  '<?php print_r($row['titulo']);?>',
                                                  '<?php print_r($row['autores']);?>',
                                                  '<?php print_r($row['revista']);?>',
                                                  '<?php print_r($row['ano']);?>',
                                                  '<?php print_r($row['volume']);?>',
                                                  '<?php print_r($row['edicao']);?>',
                                                  '<?php print_r($row['paginas']);?>'
                                                  );" value= "Vancouver">

              <input class="citacao" id="<?php print_r($row['codigo']);?>" value="">
              
            </div>
           
        </div>
        <?php
            }
        }
        ?>
    </section>
  </main>
  
  <footer>
    <div class="container">
      <div class="logos">
        <img src="./assets/images/Logo principal brancoc.png" alt="Logo Dexters">
        <div class="divider"></div>
        <div class="logos-secundarias">
          <img src="./assets/images/UFMA.png" alt="UFMA Logo">
          <img src="./assets/images/deINF.png" alt="deINF Logo">
        </div>
      </div>
    </div>
    <div class="infos">
      <ul>
        <li><img src="./assets/svg/map icon.svg" alt=""><p>Av. dos Portugueses, 1966 - Vila Bacanga, São Luís - MA, 65080-805, CCET</p></li>
        <li><img src="./assets/svg/email icon.svg" alt=""><p>dexters.ufma@gmail.com</p></li>
      </ul>
    </div>
    <div class="sociais">
      <ul>
        <li><img src="./assets/svg/instagram icon.svg" alt=""><a href="/">@Dexters</a></li>
        <li><img src="./assets/svg/twitter icon.svg" alt=""><a href="/">@Dexters</a></li>
      </ul>
    </div>
    <div class="contato">
      <img src="./assets/svg/comment icon.svg" alt=""><a href="./contato.html">Fale Conosco</a>
    </div>
  </footer>
  <script src="./scripts/script.js"></script>

</body>
</html>