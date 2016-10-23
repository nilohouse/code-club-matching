var SIGN_UP = 'sign-up';
var FIND_PEOPLE = 'find-people';
var FIND_CLUB = 'find-club';

var selfService = {
  handle: function( userChoice, zipCode ) {
    switch(userChoice) {
      case SIGN_UP:
        selfService._signUp(zipCode);
      break;

      case FIND_PEOPLE:
        selfService._findPeople(zipCode);
      break;

      case FIND_CLUB:
        selfService._findClub(zipCode);
      break;
    }
  },

  _signUp: function( zipCode ) {
    location.href = 'novo-voluntario/' + zipCode;
    return true;
  },

  _findPeople: function( zipCode ) {
    location.href = 'listar-voluntarios-proximos/' + zipCode;
    return true;
  },

  _findClub: function( zipCode ) {
    location.href = 'listar-clubes-proximos/' + zipCode;
    return true;
  }
};