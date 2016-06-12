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