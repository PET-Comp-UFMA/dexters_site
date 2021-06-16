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
function howpublished2readable(howpublished){
    var howpublishedStr = '';
    if (howpublished && howpublished.startsWith("\\url{") && howpublished.endsWith("}")) {
        var uri = howpublished.split("\\url{")[1].split("}")[0];
        howpublishedStr = '<a href="' + uri + '" target="_blank">' + uri + '</a>';
      return howpublishedStr;
  }
  return howpublished;
}

function Author2Mla(author, first) {
  if(first){
    var stringSplit = author.split(', ');
    var firstname = stringSplit[0];
    var lastname = stringSplit[1].split(' ');
    var string = firstname + ', ';
  }else{
    var stringSplit = author.split(', ');
    var firstname = stringSplit[1].split(' ');
    var lastname = stringSplit[0].split(' ');
    var string = '';
    for(var i=0;i<firstname.length;i++){
      if(firstname[i].length == 1){
        string += firstname[i] + ". ";
      }else if(!(i == firstname.length -1)){
        string += firstname[i] + " ";
      }else{
        string += firstname[i];
      }
    }
  }
    for(var i=0;i<lastname.length;i++){
    if(lastname[i].length == 1){
      if(i == lastname.length -1){
        string += lastname[i] + ".";  
      }else{
        string += lastname[i] + ". ";
      }
    }else if(!(i == lastname.length - 1)){
      string += lastname[i] + " ";
    }else{
      string += lastname[i];
    }
  }
  return string;
}

function mlaAuthors(quant, authors){
  if(quant == 1){
    return Author2Mla(authors,true);
  }else if(quant < 4){
    var StringSplit = authors.split(' and ');
    var FirstAuthor = Author2Mla(StringSplit[0], true);
    var string = FirstAuthor;
    for(var i = 1;i < StringSplit.length;i++){
      if(i == StringSplit.length-1){
        string += ", and ";
      }else{
        string += ", "
      }
      string += Author2Mla(StringSplit[i], false);
    } 
  }else {
    var StringSplit = authors.split(' and ');
    var FirstAuthor = Author2Mla(StringSplit[0], true);
    var string = FirstAuthor + ',' ;
    string += ' et al';
  }
  return string + '.';
}


function Author2Abnt(author,last){
  var NomeSplit = author.split(', ');
  var lastname = NomeSplit[1].split(' ');
  var string  = NomeSplit[0].toUpperCase() + ', ';
  for(var i=0;i<lastname.length;i++){
    if(lastname[i].length == 1){
      if(i == lastname.length -1 ){
        string += lastname[i] + ".";  
      }else{
        string += lastname[i] + ". ";
      }
    }else if(!(i == lastname.length - 1)){
      string += lastname[i] + " ";
    }else{
      string += lastname[i];
    }
  }
  return string;
}

function Author2abnt(quant,authors){
  if(quant == 1){
    return Author2Abnt(author,false) + '. ';
  }else if(quant == 2 || quant == 3){
      var stringSplit = authors.split(' and ');
      var string = '';
        for(var i=0;i<stringSplit.length;i++){
          if(i!=0){
            string += '; ';
          }
          
          if(i == stringSplit.length-1){
            string += Author2Abnt(stringSplit[i],true);
          }else{
            string += Author2Abnt(stringSplit[i],false);
          }
        }
        return string + ". ";
  }
  else{
        var stringSplit = authors.split(' and ');
        return Author2Abnt(stringSplit[0],false) + ' et al. ';
  }
}
function author2apa(author,last){
  var stringSplit = author.split(', ');
    var FirstName = stringSplit[0];
    var LastName = stringSplit[1].split(' ');
    if(LastName.length == 1){
      LastName = stringSplit[1].split('-');
    }
    var string = FirstName + ', ';
    for(var i=0;i < (LastName.length);i++){
      var nome = LastName[i];
      string += nome[0];
      if(i == LastName.length - 1 && !last){
        string += '.';
      }else{
        string += '. ';
      }
    }
    return string;
}

function apaAuthors(quant, authors){
  if(quant == 1){
    return author2apa(authors);
  }
  else if(quant == 2){
    var stringSplit = authors.split(' and ');
    var string = '';
    var last = false;
    for(var i=0;i<stringSplit.length;i++){
      if(i != 0){
        string += ', ';   
      }
      if(i == stringSplit.length-1){
        string += '& ';
        last = true;
      }
      string += author2apa(stringSplit[i],last);
    }
    return string;
  }
}

function format(data, formatValue) {

    //EntryType @article
    //Required Fields: author, title, journal, year.
    //Optional Fields: volume, number, pages, month, note.
    if (data.entryType == "article") {
        data.authors = ((data.authors) ? data.authors : "<strong style='color:red;'>Author is required!</strong>");
        data.title = ((data.title) ? data.title : "<strong style='color:red;'>Title is required!</strong>");
        data.year = ((data.year) ? data.year : "<strong style='color:red;'>Year is required!</strong>");

        if (formatValue == 'mla') {
          if((data.authors.match(/,/g) || []).length == 1){
            data.authors = mlaAuthors(1,data.authors);
          }else if((data.authors.match(/,/g) || []).length < 4){
            data.authors = mlaAuthors(2, data.authors);
          }else{
            data.authors = mlaAuthors(5, data.authors);
          }

            return data.authors +
                " \"" + data.title + ".\" " +
                "<em>" + data.journal + "<\/em>" +
                ((data.volume) ? " " + data.volume : "") +
                ". " +
                ((data.number) ? " " + data.number+" " : "") + 
                "(" + data.year + ")" +
                ((data.pages) ? ": " + data.pages : "") +
                ".";
        }

        else if (formatValue == 'apa') {
          if((data.authors.match(/,/g) || []).length == 1){
            data.authors = mlaAuthors(1,data.authors);
          }else if((data.authors.match(/,/g) || []).length < 4){
            data.authors = mlaAuthors(2, data.authors);
          }else{
            data.authors = mlaAuthors(5, data.authors);
          }

            return data.authors +
                " (" + data.year + "). " + 
                data.title + 
                "<em>" + ". " + data.journal + "<\/em>" +
                ((data.volume) ? ", <em>" + data.volume : "") +
                "<\/em>" +
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
        else if (formatValue == 'abnt'){
          if((data.authors.match(/,/g) || []).length == 1){
            data.authors = Author2abnt(1, data.authors);   
            }
            else if((data.authors.match(/,/g) || []).length == 2){
              data.authors = Author2abnt(2,data.authors);
            }
            else if((data.authors.match(/,/g) || []).length == 3){
              data.authors = Author2abnt(3,data.authors);
            }
            else if((data.authors.match(/,/g) || []).length >3){
              data.authors = Author2abnt(4,data.authors);
          }
           return data.authors +   
                  data.title + ". " +
                  "<b>"+ data.journal+"</b>"+
                  (data.volume == ''?'': ", v. " + data.volume) +
                  (data.number == ''?'': ", n. " + data.number) +
                  (data.pages == ''?'': ", p. " + data.pages + ", ") +
                  data.year + '.'; 
        }   
  }else if(data.entryType == 'book'){
    // EntryType @book
    // Required fields: author or editor, title, publisher, year.
      // Optional fields: volume or number, series, address, edition, month, note.
    data.authors = ((data.authors) ? data.authors : "Authors are required!");
        data.title = ((data.title) ? data.title : "<strong style='color:red;'>Title is required!</strong>");
        data.publisher = ((data.publisher) ? data.publisher : "<strong style='color:red;'>Publisher is required!</strong>");
        data.year = ((data.year) ? data.year : "<strong style='color:red;'>Year is required!</strong>");
        if (data.authors == "Authors are required!") { 
            data.authors = ((data.editor) ? data.editor : "<strong style='color:red;'>Author or Editor is required!</strong>");
        }

        if (formatValue == 'mla') {
          if((data.authors.match(/,/g) || []).length == 1){
            data.authors = mlaAuthors(1,data.authors);
          }else if((data.authors.match(/,/g) || []).length < 4){
            data.authors = mlaAuthors(2, data.authors);
          }else{
            data.authors = mlaAuthors(5, data.authors);
          }

            return data.authors + 
                " <em>" + data.title + "<\/em>." + 
                ((data.volume) ? " Vol. " + data.volume : "") +  
                ". " + 
                data.publisher + ", " + 
                data.year + ".";
        }
        else if (formatValue == 'apa') {
          if((data.authors.match(/,/g) || []).length == 1){
            data.authors = apaAuthors(1,data.authors);
          }else{
            data.authors = apaAuthors(2,data.authors);
          }
            return data.authors + 
                " (" + data.year + "). <em>" + 
                data.title + "<\/em>" +
                ((data.volume) ? " (Vol. " + data.volume + "). " : ". ") +  
                data.publisher + ".";
        }
        else if (formatValue == 'vancouver') {
            return data.authors + ". " + 
                data.title + ". " + 
                data.publisher + "; " + 
                data.year + ".";
        }
        // Faltando fazer
        else if(formatValue == 'abnt'){
          if((data.authors.match(/,/g) || []).length == 1){
            data.authors = Author2abnt(1, data.authors);
          }else if((data.authors.match(/,/g) || []).length == 2){
            data.authors = Author2abnt(2,data.authors);
          }else if((data.authors.match(/,/g) || []).length == 3){
            data.authors = Author2abnt(3,data.authors);
          }else{
            data.authors = Author2abnt(4, data.authors);
          }
          return data.authors + 
            '<b>'+data.title+'</b>. '+ 
                data.publisher +', '+
                data.year+'.';
        }

  }else if(data.entryType == 'inproceedings'){
    //EntryType @inproceedings
    // Required fields: author, title, booktitle, year.
      // Optional fields: editor, volume or number, series, pages, address, month, organization, publisher, note.
    data.authors = ((data.authors) ? data.authors : "Authors are required!");
        data.title = ((data.title) ? data.title : "<strong style='color:red;'>Title is required!</strong>");
        data.booktitle = ((data.booktitle) ? data.booktitle : "<strong style='color:red;'>Book title is required!</strong>");
        data.year = ((data.year) ? data.year : "<strong style='color:red;'>Year is required!</strong>");
        
        if (formatValue == 'mla') {
          if((data.authors.match(/,/g) || []).length == 1){
            data.authors = mlaAuthors(1,data.authors);
          }else if((data.authors.match(/,/g) || []).length < 4){
            data.authors = mlaAuthors(2, data.authors);
          }else{
            data.authors = mlaAuthors(5, data.authors);
          }

            return data.authors +
                " \"" + data.title + ".\" " + 
                "<em>" + data.booktitle + "<\/em>. " + 
                ((data.organization) ? data.organization + ", " : "") +
                ((data.volume) ? "Vol. " + data.volume +". " : "") +
                data.year + 
                ".";
        }
        else if (formatValue == 'apa') {
          if((data.authors.match(/,/g) || []).length == 1){
            data.authors = apaAuthors(1,data.authors);
          }else{
            data.authors = apaAuthors(2,data.authors);
          }
            return data.authors + 
                " (" + data.year + "). " + 
                data.title +  
                ". In <em>" + data.booktitle + "<\/em>" + " (" +
                ((data.volume) ? "Vol. " + data.volume+', ' : "") + 
                ((data.pages) ? "pp. " + data.pages : "") + ")" + 
                "." +
                ((data.organization) ? " " + data.organization + "." : "");
        }
        else if (formatValue == 'vancouver') {
            return data.authors + 
                data.title + 
                ". In " + data.booktitle + " " +
                data.year + " " + 
                ((data.pages) ? " (pp. " + data.pages + ")" : "") + 
                "." +
                ((data.organization) ? " " + data.organization + ".": "");
        // Faltando Fazer
        }else if(formatValue == 'abnt'){

          if((data.authors.match(/,/g) || []).length == 1){
            data.authors = Author2abnt(1, data.authors);
          }else if((data.authors.match(/,/g) || []).length == 2){
            data.authors = Author2abnt(2,data.authors);
          }else if((data.authors.match(/,/g) || []).length == 3){
            data.authors = Author2abnt(3,data.authors);
          }else{
            data.authors = Author2abnt(4, data.authors);
          }
          return data.authors
            + " " + data.title + '. ' + 
            'In: <b>' + data.booktitle + '</b>. '+
            ((data.organization) ? data.organization+', ':'') +
            data.year + '. ' +
            (data.pages ? 'p. ' + data.pages + '.' : ''); 
        }
  }

  else if(data.entryType == 'misc'){
    if (formatValue == 'mla') {
      if((data.authors.match(/,/g) || []).length == 1){
            data.authors = mlaAuthors(1,data.authors);
          }else if((data.authors.match(/,/g) || []).length < 4){
            data.authors = mlaAuthors(2, data.authors);
          }else{
            data.authors = mlaAuthors(5, data.authors);
          }

            return ((data.authors) ? data.authors + ". ": "") + 
                ((data.title) ? "\"" + data.title + ".\" ": "") +  
                ((data.howpublished) ? howpublished2readable(data.howpublished) + ". ": "") +
                ((data.year) ? " (" + data.year + "). ": "");
        }
        else if (formatValue == 'apa') {
          if((data.authors.match(/,/g) || []).length == 1){
            data.authors = apaAuthors(1,data.authors);
          }else{
            data.authors = apaAuthors(2,data.authors);
          }
            return ((data.authors) ? data.authors + ". ": "") + 
                ((data.year) ? " (" + data.year + "). ": "") +
                ((data.title) ? data.title + ". ": "") +  
                ((data.howpublished) ? howpublished2readable(data.howpublished) + ". ": "");
        }
        else if (formatValue == 'vancouver') {
            return ((data.authors) ? data.authors + ". ": "") + 
                ((data.title) ? data.title + ". ": "") +  
                ((data.howpublished) ? howpublished2readable(data.howpublished) + ". ": "");
        }else if(formatValue == 'abnt'){

          if((data.authors.match(/,/g) || []).length <= 1){
            data.authors = Author2abnt(1, data.authors);
          }else if((data.authors.match(/,/g) || []).length == 2){
            data.authors = Author2abnt(2,data.authors);
          }else if((data.authors.match(/,/g) || []).length == 3){
            data.authors = Author2abnt(3,data.authors);
          }else{
            data.authors = Author2abnt(4, data.authors);
          }

          return ((data.authors)?data.authors:'') +
            ((data.title)?data.title+'. ':'') +
            ((data.booktitle)?'In: <b>' + data.booktitle + '</b>. ':'') +
            ((data.year)?data.year+'. ':'') +
            ((data.pages)?'p. '+data.pages+'.':'')+
            ((data.howpublished) ? howpublished2readable(data.howpublished) + ". ": "");

        }
  }

  else if (data.entryType = 'phdthesis'){
    // EntryType @phdthesis
    // Required fields: author, title, school, year.
      // Optional fields: type, address, month, note.
    data.authors = ((data.authors) ? data.authors : "Authors are required!");
        data.title = ((data.title) ? data.title : "<strong style='color:red;'>Title is required!</strong>");
        data.school = ((data.school) ? data.school : "<strong style='color:red;'>School is required!</strong>");
        data.year = ((data.year) ? data.year : "<strong style='color:red;'>Year is required!</strong>");
        
        if (formatValue == 'mla') {
          if((data.authors.match(/,/g) || []).length == 1){
            data.authors = mlaAuthors(1,data.authors);
          }else if((data.authors.match(/,/g) || []).length < 4){
            data.authors = mlaAuthors(2, data.authors);
          }else{
            data.authors = mlaAuthors(5, data.authors);
          }

            return data.authors + 
                ". <em>" + data.title + "<\/em>" +
                ". Diss." + data.school + 
                ", " + data.year + ".";
        }
        else if (formatValue == 'apa') {
          if((data.authors.match(/,/g) || []).length == 1){
            data.authors = apaAuthors(1,data.authors);
          }else{
            data.authors = apaAuthors(2,data.authors);
          }
            return data.authors + 
                " (" + data.year + "). " + 
                "<em>" + data.title + "<\/em>." +
                " (Doctoral dissertation, " + data.school + ").";
        }
        else if (formatValue == 'vancouver') {
            return data.authors + 
                ". <em>" + data.title + "<\/em>" + 
                " (Doctoral dissertation, " + data.school + ").";
        }
        else if (formatValue == 'abnt'){
          if((data.authors.match(/,/g) || []).length <= 1){
            data.authors = Author2abnt(1, data.authors);
          }else if((data.authors.match(/,/g) || []).length == 2){
            data.authors = Author2abnt(2,data.authors);
          }else if((data.authors.match(/,/g) || []).length == 3){
            data.authors = Author2abnt(3,data.authors);
          }else{
            data.authors = Author2abnt(4, data.authors);
          }
          return data.authors +
            '<b>' + data.title + '</b>. ' +
            data.year + '. ' +
            'Tese de Doutorado. ' +
            data.school +'.';

        }  
  }
}

function testa(citation, article, id){

    var result = format(article,citation);
    document.getElementById(id).innerHTML = result;
}

function Article(idArticle, Title, Authors, Journal, Year, Volume, Number, Pages, Month){
  this.entryType = 'article';
  this.idArticle = idArticle;
  this.title = Title;
  this.authors = Authors;
  this.journal = Journal;
  this.year = Year;
  this.volume = Volume;
  this.number = Number;
  this.pages = Pages;
  this.month = Month;
}

</script>
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

</body>
</html>