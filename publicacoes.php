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
  <main>
    <section id="publicacoes ">
        <div class="section-header">
            <h2> Publicações </h2>
        </div>
        <?php
            mysqli_select_db($mysqli, $bd) or die("Could not select database");

            $query = "SELECT * FROM article";
            $result = mysqli_query($mysqli, $query);
            $num_results = mysqli_num_rows($result);

            if($num_results > 0) {
                for($i=0; $i<$num_results; $i++) {
                    $row = mysqli_fetch_array($result);
        ?>
        <div class="publicacao">
            <h2><?php print_r(utf8_encode($row['Title']));?></h2>
            <p><?php print_r(utf8_encode($row['Authors']));?></p>
            <a href="#">Resumo</a><br>
            <div class="btn-conteiner">

              <input type="button" id="<?php print_r($row['idArticle']."1");?>" class = "publi-btn" onclick="testa('mla',new Article(
              '<?php print_r($row['idArticle']);?>',
              '<?php print_r(utf8_encode($row['Title']));?>',
              '<?php print_r(utf8_encode($row['Authors']));?>',
              '<?php print_r(utf8_encode($row['Journal']));?>',
              '<?php print_r($row['Year']);?>',
              '<?php print_r($row['Volume']);?>',
              '<?php print_r($row['Number']);?>',
              '<?php print_r($row['Pages']);?>',
              '<?php print_r($row['Month']);?>'
              ),<?php print_r($row['idArticle']."0");?>);" value="MLA">
              
              <input type="button" id="<?php print_r($row['idArticle']."2");?>" class = "publi-btn" onclick="testa('vancouver', new Article(
              '<?php print_r($row['idArticle']);?>',
              '<?php print_r(utf8_encode($row['Title']));?>',
              '<?php print_r(utf8_encode($row['Authors']));?>',
              '<?php print_r(utf8_encode($row['Journal']));?>',
              '<?php print_r($row['Year']);?>',
              '<?php print_r($row['Volume']);?>',
              '<?php print_r($row['Number']);?>',
              '<?php print_r($row['Pages']);?>',
              '<?php print_r($row['Month']);?>'
              ),<?php print_r($row['idArticle']."0");?>);" value= "Vancouver">
              
              <input type="button" id="<?php print_r($row['idArticle']."3");?>" class = "publi-btn" onclick="testa('apa', new Article(
              '<?php print_r($row['idArticle']);?>',
              '<?php print_r(utf8_encode($row['Title']));?>',
              '<?php print_r(utf8_encode($row['Authors']));?>',
              '<?php print_r(utf8_encode($row['Journal']));?>',
              '<?php print_r($row['Year']);?>',
              '<?php print_r($row['Volume']);?>',
              '<?php print_r($row['Number']);?>',
              '<?php print_r($row['Pages']);?>',
              '<?php print_r($row['Month']);?>'
              ), <?php print_r($row['idArticle']."0");?>);" value= "APA">
              
              <input type="button" id="<?php print_r($row['idArticle']."3");?>" class = "publi-btn" onclick="testa('abnt', new Article(
              '<?php print_r($row['idArticle']);?>',
              '<?php print_r(utf8_encode($row['Title']));?>',
              '<?php print_r(utf8_encode($row['Authors']));?>',
              '<?php print_r(utf8_encode($row['Journal']));?>',
              '<?php print_r($row['Year']);?>',
              '<?php print_r($row['Volume']);?>',
              '<?php print_r($row['Number']);?>',
              '<?php print_r($row['Pages']);?>',
              '<?php print_r($row['Month']);?>'
              ), <?php print_r($row['idArticle']."0");?>);" value= "abnt">
              
              <div id="<?php print_r($row['idArticle']."0");?>"></div>
            </div>
           
        </div>
        
        <?php
            }
        }
        
        // INPROCEEDINGS
        $query = "SELECT * FROM inproceedings";
        $result = mysqli_query($mysqli, $query);
        $num_results = mysqli_num_rows($result);

        if($num_results > 0) {
          for($i=0; $i<$num_results; $i++) {
            $row = mysqli_fetch_array($result);
          
        ?>
           <div class="publicacao">
            <h2><?php print_r(utf8_encode($row['Title']));?></h2>
            <p><?php print_r(utf8_encode($row['Authors']));?></p>
            <a href="#">Resumo</a><br>
            <div class="btn-conteiner">

              <input type="button" id="<?php print_r($row['idInproceedings']."1");?>" class = "publi-btn" onclick="testa('mla',new Inproceedings(
              '<?php print_r($row['idInproceedings']);?>',
              '<?php print_r(utf8_encode($row['Title']));?>',
              '<?php print_r(utf8_encode($row['Authors']));?>',
              '<?php print_r(utf8_encode($row['Booktitle']));?>',
              '<?php print_r($row['Year']);?>',
              '<?php print_r(utf8_encode($row['Editor']));?>',
              '<?php print_r($row['Volume']);?>',
              '<?php print_r($row['Number']);?>',
              '<?php print_r($row['Series']);?>',
              '<?php print_r($row['Pages']);?>',
              '<?php print_r(utf8_encode($row['Address']));?>',
              '<?php print_r($row['Month']);?>',
              '<?php print_r(utf8_encode($row['Organization']));?>',
              '<?php print_r(utf8_encode($row['Publisher']));?>',
              '<?php print_r($row['Note']);?>'  
              ),<?php print_r($row['idInproceedings']."00");?>);" value="MLA">
            
               <input type="button" id="<?php print_r($row['idInproceedings']."2");?>" class = "publi-btn" onclick="testa('vancouver',new Inproceedings(
              '<?php print_r($row['idInproceedings']);?>',
              '<?php print_r(utf8_encode($row['Title']));?>',
              '<?php print_r(utf8_encode($row['Authors']));?>',
              '<?php print_r(utf8_encode($row['Booktitle']));?>',
              '<?php print_r($row['Year']);?>',
              '<?php print_r(utf8_encode($row['Editor']));?>',
              '<?php print_r($row['Volume']);?>',
              '<?php print_r($row['Number']);?>',
              '<?php print_r($row['Series']);?>',
              '<?php print_r($row['Pages']);?>',
              '<?php print_r(utf8_encode($row['Address']));?>',
              '<?php print_r($row['Month']);?>',
              '<?php print_r(utf8_encode($row['Organization']));?>',
              '<?php print_r(utf8_encode($row['Publisher']));?>',
              '<?php print_r($row['Note']);?>'  
              ),<?php print_r($row['idInproceedings']."00");?>);" value="Vancouver">
              
              <input type="button" id="<?php print_r($row['idInproceedings']."2");?>" class = "publi-btn" onclick="testa('apa',new Inproceedings(
              '<?php print_r($row['idInproceedings']);?>',
              '<?php print_r(utf8_encode($row['Title']));?>',
              '<?php print_r(utf8_encode($row['Authors']));?>',
              '<?php print_r(utf8_encode($row['Booktitle']));?>',
              '<?php print_r($row['Year']);?>',
              '<?php print_r(utf8_encode($row['Editor']));?>',
              '<?php print_r($row['Volume']);?>',
              '<?php print_r($row['Number']);?>',
              '<?php print_r($row['Series']);?>',
              '<?php print_r($row['Pages']);?>',
              '<?php print_r(utf8_encode($row['Address']));?>',
              '<?php print_r($row['Month']);?>',
              '<?php print_r(utf8_encode($row['Organization']));?>',
              '<?php print_r(utf8_encode($row['Publisher']));?>',
              '<?php print_r($row['Note']);?>'  
              ),<?php print_r($row['idInproceedings']."00");?>);" value="APA">

              <input type="button" id="<?php print_r($row['idInproceedings']."2");?>" class = "publi-btn" onclick="testa('abnt',new Inproceedings(
              '<?php print_r($row['idInproceedings']);?>',
              '<?php print_r(utf8_encode($row['Title']));?>',
              '<?php print_r(utf8_encode($row['Authors']));?>',
              '<?php print_r(utf8_encode($row['Booktitle']));?>',
              '<?php print_r($row['Year']);?>',
              '<?php print_r(utf8_encode($row['Editor']));?>',
              '<?php print_r($row['Volume']);?>',
              '<?php print_r($row['Number']);?>',
              '<?php print_r($row['Series']);?>',
              '<?php print_r($row['Pages']);?>',
              '<?php print_r(utf8_encode($row['Address']));?>',
              '<?php print_r($row['Month']);?>',
              '<?php print_r(utf8_encode($row['Organization']));?>',
              '<?php print_r(utf8_encode($row['Publisher']));?>',
              '<?php print_r($row['Note']);?>'  
              ),<?php print_r($row['idInproceedings']."00");?>);" value="abnt">

              <div id="<?php print_r($row['idInproceedings']."00");?>"></div>
            </div>
        </div>
        <?php
          }
        }

        // BOOK
        $query = "SELECT * FROM book";
        $result = mysqli_query($mysqli, $query);
        $num_results = mysqli_num_rows($result);

        if($num_results > 0) {
          for($i=0; $i<$num_results; $i++) {
            $row = mysqli_fetch_array($result);
        ?>

           <div class="publicacao">
            <h2><?php print_r(utf8_encode($row['Title']));?></h2>
            <p><?php print_r(utf8_encode($row['Authors']));?></p>
            <a href="#">Resumo</a><br>
            <div class="btn-conteiner">

            <input type="button" id="<?php print_r($row['idBook']."1");?>" class = "publi-btn" onclick="testa('mla',new Book(
            '<?php print_r($row['idBook']);?>',
            '<?php print_r($row['Title']);?>',
            '<?php print_r($row['Authors']);?>',
            '<?php print_r($row['Publisher']);?>',
            '<?php print_r($row['Year']);?>',
            '<?php print_r($row['Volume']);?>',
            '<?php print_r($row['Number']);?>',
            '<?php print_r($row['Series']);?>',
            '<?php print_r($row['Edition']);?>', 
            '<?php print_r($row['Month']);?>',
            '<?php print_r($row['Note']);?>'
            ),<?php print_r($row['idBook']."01");?>);" value="MLA">

            <input type="button" id="<?php print_r($row['idBook']."1");?>" class = "publi-btn" onclick="testa('vancouver',new Book(
              '<?php print_r($row['idBook']);?>',
              '<?php print_r($row['Title']);?>',
              '<?php print_r($row['Authors']);?>',
              '<?php print_r($row['Publisher']);?>',
              '<?php print_r($row['Year']);?>',
              '<?php print_r($row['Volume']);?>',
              '<?php print_r($row['Number']);?>',
              '<?php print_r($row['Series']);?>',
              '<?php print_r($row['Edition']);?>', 
              '<?php print_r($row['Month']);?>',
              '<?php print_r($row['Note']);?>'
              ),<?php print_r($row['idBook']."01");?>);" value="Vancouver">

              <input type="button" id="<?php print_r($row['idBook']."1");?>" class = "publi-btn" onclick="testa('apa',new Book(
              '<?php print_r($row['idBook']);?>',
              '<?php print_r($row['Title']);?>',
              '<?php print_r($row['Authors']);?>',
              '<?php print_r($row['Publisher']);?>',
              '<?php print_r($row['Year']);?>',
              '<?php print_r($row['Volume']);?>',
              '<?php print_r($row['Number']);?>',
              '<?php print_r($row['Series']);?>',
              '<?php print_r($row['Edition']);?>', 
              '<?php print_r($row['Month']);?>',
              '<?php print_r($row['Note']);?>'
              ),<?php print_r($row['idBook']."01");?>);" value="APA">
            
              <input type="button" id="<?php print_r($row['idBook']."1");?>" class = "publi-btn" onclick="testa('abnt',new Book(
              '<?php print_r($row['idBook']);?>',
              '<?php print_r($row['Title']);?>',
              '<?php print_r($row['Authors']);?>',
              '<?php print_r($row['Publisher']);?>',
              '<?php print_r($row['Year']);?>',
              '<?php print_r($row['Volume']);?>',
              '<?php print_r($row['Number']);?>',
              '<?php print_r($row['Series']);?>',
              '<?php print_r($row['Edition']);?>', 
              '<?php print_r($row['Month']);?>',
              '<?php print_r($row['Note']);?>'
              ),<?php print_r($row['idBook']."01");?>);" value="abnt">

              <div id="<?php print_r($row['idBook']."01");?>"></div>
            </div>
          </div>
        <?php
          }
        }

        // phdthesis
        $query = "SELECT * FROM phdthesis";
        $result = mysqli_query($mysqli, $query);
        $num_results = mysqli_num_rows($result);

        if($num_results > 0) {
          for($i=0; $i<$num_results; $i++) {
            $row = mysqli_fetch_array($result);
        ?>
        
        <div class="publicacao">
            <h2><?php print_r(utf8_encode($row['Title']));?></h2>
            <p><?php print_r(utf8_encode($row['Authors']));?></p>
            <a href="#">Resumo</a><br>
            <div class="btn-conteiner">

            <input type="button" id="<?php print_r($row['idPhdthesis']."01");?>" class = "publi-btn" onclick="testa('mla',new Phdthesis(
             '<?php print_r($row['idPhdthesis']);?>',
              '<?php print_r($row['Title']);?>',
              '<?php print_r($row['Authors']);?>',
              '<?php print_r($row['School']);?>',
              '<?php print_r($row['Year']);?>',
              '<?php print_r($row['Type']);?>'
            ),<?php print_r($row['idPhdthesis']."03");?>);" value="MLA">

              <input type="button" id="<?php print_r($row['idPhdthesis']."01");?>" class = "publi-btn" onclick="testa('vancouver',new Phdthesis(
             '<?php print_r($row['idPhdthesis']);?>',
              '<?php print_r($row['Title']);?>',
              '<?php print_r($row['Authors']);?>',
              '<?php print_r($row['School']);?>',
              '<?php print_r($row['Year']);?>',
              '<?php print_r($row['Type']);?>'
            ),<?php print_r($row['idPhdthesis']."03");?>);" value="Vancouver">

              <input type="button" id="<?php print_r($row['idPhdthesis']."01");?>" class = "publi-btn" onclick="testa('apa',new Phdthesis(
             '<?php print_r($row['idPhdthesis']);?>',
              '<?php print_r($row['Title']);?>',
              '<?php print_r($row['Authors']);?>',
              '<?php print_r($row['School']);?>',
              '<?php print_r($row['Year']);?>',
              '<?php print_r($row['Type']);?>'
            ),<?php print_r($row['idPhdthesis']."03");?>);" value="APA">

            <input type="button" id="<?php print_r($row['idPhdthesis']."01");?>" class = "publi-btn" onclick="testa('abnt',new Phdthesis(
             '<?php print_r($row['idPhdthesis']);?>',
              '<?php print_r($row['Title']);?>',
              '<?php print_r($row['Authors']);?>',
              '<?php print_r($row['School']);?>',
              '<?php print_r($row['Year']);?>',
              '<?php print_r($row['Type']);?>'
            ),<?php print_r($row['idPhdthesis']."03");?>);" value="abnt">
              <div id="<?php print_r($row['idPhdthesis']."03");?>"></div>
            </div>
          </div>
        <?php
          }
        }
         $mysqli->close();
        ?>


    </section>
  </main>
  
  <footer>
    <div class="container">
      <div class="logos">
        <a href="./index.html"><img src="./assets/images/Logo principal brancoc.png" alt="Logo Dexters"></a>
        <div class="divider"></div>
        <div class="logos-secundarias">
          <a href="https://portalpadrao.ufma.br/site" target="_blank"><img src="./assets/images/UFMA.png" alt="Logo UFMA" class="ufma-logo"></a>
          <a href="https://sigaa.ufma.br/sigaa/public/departamento/portal.jsf?lc=pt_BR&id=998" target="_blank"><img src="./assets/images/deINF.png" alt="deINF Logo" style="height: 50px; width: 125px;"></a>
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
        <li><img src="./assets/svg/twitter icon.svg" alt="""><a href="/">@Dexters</a></li>
      </ul>
    </div>
    <div class="contato">
      <img src="./assets/svg/comment icon.svg" alt=""><a href="./contato.html">Fale Conosco</a>
    </div>
  </footer>
  <script src="./scripts/script.js"></script>
  <script src="./scripts/cite.js"></script>
  <script src="./scripts/bibtex.js"></script>
</body>
</html>