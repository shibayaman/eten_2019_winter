const fileInput = document.querySelector('#file-selector input[type=file]');
  fileInput.onchange = () => {
    if (fileInput.files.length > 0) {
      const fileName = document.querySelector('#file-selector .file-name');
      fileName.textContent = fileInput.files[0].name;
    }
  }

  var count = 1;

  $('#add_member').on('click', function() {
    if(count < 10){
      $('#memberinput').append('<div class="field is-horizontal">'
                              + '<div class="field-label is-normal"></div>'
                              + '<div class="field-body">'
                              + '<div class="field">'
                              + '<div class="control has-icons-left has-icons-right">'
                              + '<input class="input column is-one-third" type="text" name="member[]" placeholder="代表者以外のメンバーの名前を入力してください">'
                              + '<span class="icon is-small is-left">'
                              + '<i class="fas fa-user"></i>'
                              + '</span>'
                              + '</div>'
                              + '</div>'
                              + '</div>'
                              + '</div>');
      count++;
    }
  });

  $("#title").on("blur", function(){
    if($(this).val() != ""){
      $("#title").removeClass().addClass("input column is-two-thirds");
    }
  });

  $("#catch_copy").on("blur", function(){
    if($(this).val() != ""){
      $("#catch_copy").removeClass().addClass("input column is-two-thirds");
    }
  });

  $("#detail").on("blur", function(){
    if($(this).val() != ""){
      $("#detail").removeClass().addClass("textarea");
    }
  });

  $("#image").on("change", function(){
    if($(this).val() != ""){
      $("#file-name").css("border-color", "hsl(0, 0%, 86%)");
    }
  });

  $("#period").on("blur", function(){
    if($(this).val() != ""){
      $("#period").removeClass().addClass("input");
    }
  });

  $("#represent").on("blur", function(){
    if($(this).val() != ""){
      $("#represent").removeClass().addClass("input column is-one-thirds");
    }
  });

  $("#team").on("blur", function(){
    if($(this).val() != ""){
      $("#team").removeClass().addClass("input column is-one-third");
    }
  });

  $("#genre").on("change", function(){
    if($(this).val() == "その他"){
      $("#genrefield").append('<div class="field is-horizontal" id="other">'
                              + '<div class="field-label is-normal"></div>'
                              + '<div class="field-body">'
                              + '<div class="field">'
                              + '<div class="control">'
                              + '<input class="input column is-one-third" type="text" name="genre" placeholder="ジャンル名を入力してください">'
                              + '</div>'
                              + '<p class="help">空の場合はジャンルは「その他」になります</p>'
                              + '</div>'
                              + '</div>'
                              + '</div>');
    }
    if($(this).val() != "その他"){
      $("#other").remove();
    }

  });



  $('form').on("submit", function() {
    var submitflg = true;

    $("#attention").remove();

    if($("#title").val() == ""){
      $("#title").removeClass().addClass("input column is-two-thirds is-danger");
      submitflg = false;
    }

    if($("#catch_copy").val() == ""){
      $("#catch_copy").removeClass().addClass("input column is-two-thirds is-danger");
      submitflg = false;
    }

    if($("#detail").val() == ""){
      $("#detail").removeClass().addClass("textarea is-danger");
      submitflg = false;
    }

    if($("#image").val() == ""){
      $("#file-name").css("border-color", "hsl(348, 86%, 61%)");
      submitflg = false;
    }
    if($("#period").val() == ""){
      $("#period").removeClass().addClass("input is-danger");
      submitflg = false;
    }

    if($("#represent").val() == ""){
      $("#represent").removeClass().addClass("input column is-one-third is-danger");
      submitflg = false;
    }

    if($("#team").val() == ""){
      $("#team").removeClass().addClass("input column is-one-third is-danger");
      submitflg = false;
    }

    if(!submitflg){
      $("#attention-field").append('<div class="container" id="attention">'
                                  + '<div class="box content column is-5 is-offset-one-quarter">'
                                  + '<label class="label column is-offset-3" style="color:hsl(348, 86%, 61%);font-weight:bold;">必須項目が入力されていません</label>'
                                  + '</div>'
                                  + '</div>');
    }

    return submitflg;
  });
