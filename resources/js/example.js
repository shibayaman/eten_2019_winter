$(() => {
  $('#input').on('focus', (e) => {
    $(e.target).select();
  });

  $('#submit').on('click', () => {
    $('#message').html($('#input').val());
  });
});