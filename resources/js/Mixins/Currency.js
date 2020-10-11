export default {
  filters: {
    currencyFormat: function (value) {
      if (typeof value !== "number") {
          return value;
      }
      var formatter = new Intl.NumberFormat('en-US', {
          style: 'currency',
          currency: 'INR',
          minimumFractionDigits: 2
      });
      return formatter.format(value);
    }
  }
};
