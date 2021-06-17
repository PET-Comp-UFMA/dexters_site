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

function Inproceedings(Idinproceedings, Title, Authors, Booktitle, Year, Editor, Volume, Number, Series, Pages, Address, Month, Organization, Publisher, Note) {
  this.entryType = 'inproceedings';
  this.idinproceedings = Idinproceedings;
  this.title = Title;
  this.authors = Authors;
  this.booktitle = Booktitle;
  this.year = Year;
  this.editor = Editor;
  this.volume = Volume;
  this.number = Number;
  this.series = Series;
  this.pages = Pages;
  this.address = Address;
  this.month = Month;
  this.organization = Organization;
  this.publisher = Publisher;
  this.note = Note;
}

function Book(idBook, Title, Authors, Publisher, Year, Volume, Number, Series, Edition, Month, Note){
  this.entryType = 'book';  
  this.title = Title;
  this.authors = Authors;
  this.publisher = Publisher;
  this.year = Year;
  this.volume = Volume;
  this.number = Number;
  this.series = Series;
  this.edition = Edition;
  this.month = Month;
  this.note = Note;
}

function Phdthesis(idPhdthesis, Title, Authors, School, Year, Type){
  this.entryType = 'Phdthesis';
  this.idPhdthesis = idPhdthesis;
  this.title = Title;
  this.authors = Authors;
  this.school = School;
  this.year = Year;
  this.type = Type;
}