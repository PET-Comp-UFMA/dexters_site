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
      }else if((i != firstname.length -1)){
        string += firstname[i] + " ";
      }else{
        string += firstname[i];
      }
    }
    string += " ";
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
    return Author2Abnt(authors,false) + '. ';
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
    if(author == 'others'){
      return '';
    }
    var stringSplit = author.split(', ');
    var FirstName = stringSplit[0];
    var LastName = stringSplit[1].split(' ');
    if(LastName.length == 1){
      LastName = stringSplit[1].split('-');
    }
    var string = FirstName + ', ';
    for(var i=0;i < (LastName.length);i++){
      var nome = LastName[i];
      string += nome[0].toUpperCase();
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
    var sliptlength = stringSplit.length - 1;
    if(stringSplit[sliptlength] == 'others'){
      sliptlength -= 1;
    }
    var string = '';
    var last = false;
    for(var i=0;i<=sliptlength;i++){
      if(i != 0){
        string += ', ';   
      }
      if(i == sliptlength){
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
            data.authors = apaAuthors(1,data.authors);
          }else{
            data.authors = apaAuthors(2,data.authors);
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