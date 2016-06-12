var SIGN_UP = 'sign-up';
var FIND_PEOPLE = 'find-people';
var FIND_CLUB = 'find-club';

var selfService = {
  handle: function( userChoice, zipCode ) {
    switch(userChoice) {
      case SIGN_UP:
        selfService._signUp(zipCode);
      break;
    }
  },

  _signUp: function( zipCode ) {
    location.href = 'novo-voluntario/' + zipCode;
    return true;
  }
};