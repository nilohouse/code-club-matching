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
var cepUtils = {
  isValid: function(rawInput) {
    if (!rawInput || rawInput.length <=0) {
      return false;
    }

    var cep = cepUtils._sanitize(rawInput);
    var pattern = /^[0-9]{8}$/;

    return pattern.test(cep);
  },

  _sanitize: function(rawInput) {
    var output = rawInput.replace(/^s+|s+$/g, '');

    return output.replace('-', '');
  }
};
//# sourceMappingURL=code-club-br.js.map
