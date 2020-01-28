  const fileName = document.querySelector('#file-selector .file-name');
  const fileInput = document.querySelector('#file-selector input[type=file]');

    fileInput.onchange = () => {
      if (fileInput.files.length > 0) {
        fileName.textContent = fileInput.files[0].name;
        $('#imagefield').hide();
        $('#imagelabel').show();
        $('#deletebutton').show();
      }
    }

  $('#deletebutton').on('click', function(){
    if (fileInput.files.length > 0) {
      fileName.textContent = "選択されていません";
      $('input[type=file]').val('');
      $('#imagefield').show();
      $('#imagelabel').hide();
      $('#deletebutton').hide();
    }
  });

  $('#add_member').on('click', function() {
    // memberID = `member${count}`;
    if(count < 10 && $(`#member${count}`).val() != ""){
      count++;
      $('#memberinput').append('<div class="field is-horizontal">'
                              + '<div class="field-label is-normal"></div>'
                              + '<div class="field-body">'
                              + '<div class="field">'
                              + '<div class="control has-icons-left has-icons-right">'
                              + `<input class="input column is-half" type="text" id="member${count}" name="member[]" maxlength="30" placeholder="代表者以外のメンバーの名前を入力してください">`
                              + '<span class="icon is-small is-left">'
                              + '<i class="fas fa-user"></i>'
                              + '</span>'
                              + '</div>'
                              + '</div>'
                              + '</div>'
                              + '</div>');
    }
  });

  $("#title").on("blur", function(){
    if($(this).val() != ""){
      $("#title").removeClass().addClass("input column is-half");
    }
  });

  $("#catch_copy").on("blur", function(){
    if($(this).val() != ""){
      $("#catch_copy").removeClass().addClass("input column is-half");
    }
  });

  $("#detail").on("blur", function(){
    if($(this).val() != ""){
      $("#detail").removeClass().addClass("textarea");
    }
  });


  $("#period").on("blur", function(){
    if($(this).val() != ""){
      $("#period").removeClass().addClass("input");
    }
  });

  $("#represent").on("blur", function(){
    if($(this).val() != ""){
      $("#represent").removeClass().addClass("input column is-half");
    }
  });

  $("#team").on("blur", function(){
    if($(this).val() != ""){
      $("#team").removeClass().addClass("input column is-half");
    }
  });

  $(document).on("blur", "#othergenre", function(){
    if($(this).val() != ""){
      $("#othergenre").removeClass().addClass("input column is-half");
    }
  });

  $("#genre").on("change", function(){
    if($(this).val() == "その他"){
      $("#genrefield").append('<div class="field is-horizontal" id="otherform">'
                              + '<div class="field-label is-normal"></div>'
                              + '<div class="field-body">'
                              + '<div class="field">'
                              + '<div class="control">'
                              + '<input class="input column is-half" type="text" id="othergenre" maxlength="30" placeholder="ジャンル名を入力してください">'
                              + '</div>'
                              + '</div>'
                              + '</div>'
                              + '</div>');
    }
    if($(this).val() != "その他"){
      $("#otherform").remove();
    }
  });

  $('#registration_form').on("submit", function() {
    var submitflg = true;

    $("#attention").remove();

    if($("#title").val() == ""){
      $("#title").removeClass().addClass("input column is-half is-danger");
      submitflg = false;
    }

    if($("#catch_copy").val() == ""){
      $("#catch_copy").removeClass().addClass("input column is-half is-danger");
      submitflg = false;
    }

    if($("#detail").val() == ""){
      $("#detail").removeClass().addClass("textarea is-danger");
      submitflg = false;
    }

    if($("#period").val() == ""){
      $("#period").removeClass().addClass("input is-danger");
      submitflg = false;
    }

    if($("#represent").val() == ""){
      $("#represent").removeClass().addClass("input column is-half is-danger");
      submitflg = false;
    }

    if($("#team").val() == ""){
      $("#team").removeClass().addClass("input column is-half is-danger");
      submitflg = false;
    }

    if(!$("#genre").val()){
      $("#ganreselect").removeClass().addClass("select is-danger");
      submitflg = false;
    }

    if($("#othergenre").val() == ""){
      $("#othergenre").removeClass().addClass("input column is-half is-danger");
      submitflg = false;
    }

    if(submitflg){
      if($("#genre").val() == "その他"){
        $("#other").val($("#othergenre").val());
      }
    }else{
      $("#attention-field").append('<p class="help is-danger">未入力の項目があります</p>');
    }

    return submitflg;
  });
